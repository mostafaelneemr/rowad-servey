<?php

namespace App\Services;


use App\Enums\StatusEnum;
use App\Models\Product;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Language\LanguageRepository;
use App\Repositories\Product\GalleryRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Datatables;
use Illuminate\Support\Str;


class ProductService extends BaseService
{
    protected $productRepository,$languageRepository,$categoryRepository,$galleryRepository;

    public function __construct(ProductRepository $productRepository, LanguageRepository $languageRepository,CategoryRepository $categoryRepository,
                                GalleryRepository $galleryRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
        $this->languageRepository = $languageRepository;
        $this->categoryRepository = $categoryRepository;
        $this->galleryRepository = $galleryRepository;
    }

    public function loadViewData(): array
    {
        $this->pageTitle(__('Products'));
        $this->tableColumns([
            __('ID'),
            __('Image'),
            __('Title'),
            __('Category'),
            __('Status'),
            __('Action'),
        ]);

        $this->jsColumns([
            'id' => 'products.id',
            'image' => 'products.image',
            'title' => 'products.title_'.lang(),
            'category' => 'category_id',
            'status' => 'products.status',
            'action' => '',
        ]);

        $this->filterIgnoreColumns(['action']);
        $this->addButton('system.product.create','Add Product');
        return $this->retunData;
    }

    public function loadDataTableData()
    {
        return Datatables::eloquent($this->productRepository->getDataTableQuery())
            ->addColumn('id', '{{$id}}')
            ->addColumn('image', function ($data) {
                return datatableImage($data->image);
            })
            ->addColumn('title', function ($data) {
                return $data->{ 'title_'.lang() };
            })

            ->addColumn('category', function ($data) {
                return $data->category->{'title_'.lang()} ?? '';
            })
            ->addColumn('status', function($data) {
                return status_icon($data->status);
            })
            ->addColumn('action', function($data) {
                $this->actionButtons(datatable_menu_edit(route('system.product.edit', $data->id), 'system.product.edit'));
                return $this->actionButtonsRender($this->productRepository->modelPath(), $data->id);
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create(): array
    {
        $this->pageTitle('Create Product');
        $this->breadcrumb('Home');
        $this->breadcrumb('Products', 'system.product.index');
        $this->otherData([
            'languages' => $this->languageRepository->getWhere(['status' => StatusEnum::Enable->value]),
            'categories' => $this->categoryRepository->getDataTableQuery()
        ]);
        return $this->retunData;
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();

            $save_image = null;
            $slider_image = null;
            $gallery_images = [];
            $pdf_file = null;

            if ($request->has('image')) {
                $save_image = $this->uploadedImage($request->file('image'), 'product');
            }

            if ($request->has('slider_image')) {
                $slider_image = $this->uploadedImage($request->file('slider_image'), 'product');
            }

            if ($request->hasFile('pdf_file')) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $pdf_file = $file->storeAs('uploads/pdfs',$filename, 'public');
            }

            $data = [
                'title_ar' => $request->input('input.lang.2.title', ''),
                'title_en' => $request->input('input.lang.1.title', ''),
                'image_desc_ar' => $request->input('input.lang.2.image_desc', ''),
                'image_desc_en' => $request->input('input.lang.1.image_desc', ''),
                'desc_ar' => $request->input('input.lang.2.desc', ''),
                'desc_en' => $request->input('input.lang.1.desc', ''),
                'status' => $request->input('status'),
                'sort' => $request->input('sort'),
                'category_id' => $request->input('category_id'),
                'image' => $save_image,
                'slider_image' => $slider_image,
                'slug' => str::slug($request->input('input.lang.1.title', '')),
                'pdf_file' => $pdf_file
            ];

            $store = $this->productRepository->store($data);

            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $galleryImage) {
                    $gallery_name_gen = hexdec(uniqid()) . '.' . $galleryImage->getClientOriginalExtension();
                    $galleryImage->move(public_path('upload/home/gallery/'), $gallery_name_gen);
                    $gallery_images[] = 'upload/home/gallery/' . $gallery_name_gen;
                }
            }
            foreach ($gallery_images as $gallery_image) {
                DB::table('product_images')->insert([
                    'product_id' => $store->id,
                    'image' => $gallery_image,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();
            return $store;

        } catch (\Exception $e) {
            DB::rollback();
            error_log($e->getMessage());
            return false;
        }
    }

    private function uploadedImage($image, $folder)
    {
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save("upload/home/{$folder}/" . $name_gen);
        $filePath = "upload/home/{$folder}/" . $name_gen;
        return $filePath;
    }

    public function edit($id): array
    {
        $this->pageTitle('Update Product');
        $this->breadcrumb('Products', 'system.product.index');

        $this->otherData([
            'result' => $this->productRepository->find($id),
            'languages' => $this->languageRepository->getWhere(['status' => StatusEnum::Enable->value]),
            'categories' => $this->categoryRepository->getDataTableQuery()

        ]);
        return $this->retunData;
    }

    public function update($request,$id)
    {
        try {

            DB::beginTransaction();
            $product = $this->productRepository->find($id);

            if (!$product) {
                throw new \Exception("No testimonial found for ID: " . $id);
            }
            $save_image = $product->image;
            $slider_image = $product->slider_image;
            $pdf_file = $product->pdf_file;
            $gallery_images = [];

            if ($request->file('image')) {
                if (file_exists($product->image)) {
                    @unlink($product->image);
                }
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->save('upload/home/product' . $name_gen);
                $save_image = 'upload/home/product' . $name_gen;
            }
            if ($request->file('slider_image')) {
                if (file_exists($product->slider_image)) {
                    @unlink($product->slider_image);
                }
                $image = $request->file('slider_image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->save('upload/home/product' . $name_gen);
                $slider_image = 'upload/home/product' . $name_gen;
            }

            if ($request->hasFile('pdf_file')) {
                if ($product->pdf_file && \Storage::disk('public')->exists($product->pdf_file)) {
                    \Storage::disk('public')->delete($product->pdf_file);
                }

                $file = $request->file('pdf_file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $pdf_file = $file->storeAs('uploads/pdfs', $filename, 'public');
            }


            $data = [
                'title_ar' => $request->input('input.lang.2.title', ''),
                'title_en' => $request->input('input.lang.1.title', ''),
                'image_desc_ar' => $request->input('input.lang.2.image_desc', ''),
                'image_desc_en' => $request->input('input.lang.1.image_desc', ''),
                'desc_ar' => $request->input('input.lang.2.desc', ''),
                'desc_en' => $request->input('input.lang.1.desc', ''),
                'status' => $request->input('status'),
                'sort' => $request->input('sort'),
                'category_id' => $request->input('category_id'),
                'image' => $save_image,
                'slider_image' => $slider_image,
                'slug' => str::slug($request->input('input.lang.1.title', '')),
                'pdf_file' => $pdf_file
            ];

            $product = $this->productRepository->update($data, $id);

            if ($request->has('deleted_gallery_images')) {
                foreach ($request->input('deleted_gallery_images') as $imageId) {
                    $galleryImage = $this->galleryRepository->find($imageId);
                    if ($galleryImage) {
                        if (file_exists(public_path($galleryImage->image))) {
                            @unlink(public_path($galleryImage->image));
                        }
                        $this->galleryRepository->delete($imageId);
                    }
                }
            }

            // إضافة الصور الجديدة (لو فيه)
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $galleryImage) {
                    $gallery_name_gen = hexdec(uniqid()) . '.' . $galleryImage->getClientOriginalExtension();
                    Image::make($galleryImage)->save(public_path('upload/home/product/' . $gallery_name_gen));
                    $path = 'upload/home/product/' . $gallery_name_gen;

                    $this->galleryRepository->store([
                        'product_id' => $id,
                        'image' => $path,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            DB::commit();
            return $product;
        } catch (\Exception $e) {
            DB::rollback();
            errorLog($e->getMessage());
            return false;
        }
    }


}
