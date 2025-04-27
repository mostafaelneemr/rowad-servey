<?php

namespace App\Services;


use App\Enums\StatusEnum;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Language\LanguageRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Datatables;


class ProductService extends BaseService
{
    protected $productRepository,$languageRepository,$categoryRepository;

    public function __construct(ProductRepository $productRepository, LanguageRepository $languageRepository,CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
        $this->languageRepository = $languageRepository;
        $this->categoryRepository = $categoryRepository;
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
                $this->actionButtons(datatable_menu_edit(route('system.testimonial.edit', $data->id), 'system.testimonial.edit'));
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
//            'category' => array_column($this->categoryRepository->getDataTableQuery(),'name_'.lang(),'id'),
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
            $file = null;

            if ($request->has('image')) {
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/home/'), $name_gen);  // حفظ الصورة في المسار المناسب
                $save_image = 'upload/home/' . $name_gen;
            }

            if ($request->has('slider_image')) {
                $slider_image = $this->uploadedImage($request->file('slider_image'), 'slider_image');
            }

            if ($request->hasFile('pdf_file')) {
                $file = $this->uploadFile($request->file('pdf_file'), 'files');
            }

            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $galleryImage) {
                    $gallery_name_gen = hexdec(uniqid()) . '.' . $galleryImage->getClientOriginalExtension();
                    $galleryImage->move(public_path('upload/home/gallery/'), $gallery_name_gen);
                    $gallery_images[] = 'upload/home/gallery/' . $gallery_name_gen;
                }
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
                'pdf_file' => $file
            ];
            $store = $this->productRepository->store($data);

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
        $image->move(public_path("upload/home/{$folder}/"), $name_gen);
        return 'upload/home/' . $folder . '/' . $name_gen;
    }

    private function uploadFile($file, $folder)
    {
        $file_name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path("upload/home/{$folder}/"), $file_name_gen);
        return 'upload/home/' . $folder . '/' . $file_name_gen;
    }


    public function edit($id): array
    {
        $this->pageTitle('Update Product');
        $this->breadcrumb('Products', 'system.product.index');

        $this->otherData([
                'result' => $this->productRepository->find($id),
                'languages' => $this->languageRepository->getWhere(['status' => StatusEnum::Enable->value])
            ]);
        return $this->retunData;
    }

    public function update($id,$request)
    {
        try {

            DB::beginTransaction();
            $product = $this->productRepository->find($id);

            if (!$product) {
                throw new \Exception("No testimonial found for ID: " . $id);
            }

            if ($request->file('image')) {
                if (file_exists($product->image)) {
                    @unlink($product->image);
                }
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->save('upload/home/' . $name_gen);
                $filePath = 'upload/home/' . $name_gen;
                $product->image = $filePath;
            }

            $product->title_ar = $request['input']['lang'][2]['title'] ?? '';
            $product->title_en = $request['input']['lang'][1]['title'] ?? '';
            $product->name_ar = $request['input']['lang'][2]['name'] ?? '';
            $product->name_en = $request['input']['lang'][1]['name'] ?? '';
            $product->text_ar = $request['input']['lang'][2]['text'] ?? '';
            $product->text_en = $request['input']['lang'][1]['text'] ?? '';
            $product->status = $request['input']['status'];
            $product->save();
            DB::commit();
            return $product;
        } catch (\Exception $e) {
            DB::rollback();
            errorLog($e->getMessage());
            return false;
        }
    }

}
