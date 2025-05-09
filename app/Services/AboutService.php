<?php

namespace App\Services;


use App\Enums\StatusEnum;
use App\Repositories\About\AboutRepository;
use App\Repositories\Language\LanguageRepository;
use App\Repositories\Slider\SliderRepository;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Enums\SliderTypeEnum;
use Datatables;


class AboutService extends BaseService
{
    protected $aboutRepository,$languageRepository;

    public function __construct(AboutRepository $aboutRepository, LanguageRepository $languageRepository)
    {
        parent::__construct();
        $this->aboutRepository = $aboutRepository;
        $this->languageRepository = $languageRepository;
    }

    public function loadViewData(): array
    {
        $this->pageTitle(__('About Section'));
        $this->tableColumns([
            __('ID'),
            __('Image'),
            __('Title'),
            __('Sub Title'),
            __('Button Text'),
            __('Status'),
            __('Action'),
        ]);

        $this->jsColumns([
            'id' => 'slider.id',
            'image' => 'slider.image',
            'title' => 'slider.title_'.lang(),
            'sub_title' => 'slider.sub_title_'.lang(),
            'button' => 'slider.button_'.lang(),
            'status' => 'slider.status',
            'action' => '',
        ]);

        // $this->breadcrumb('');
        $this->filterIgnoreColumns(['action']);
        $this->addButton('system.slider.create','Add Slider');
        return $this->retunData;
    }

    public function loadDataTableData()
    {
        return Datatables::eloquent($this->sliderRepository->getDataTableQuery())
            ->addColumn('id', '{{$id}}')
            ->addColumn('image', function ($data) {
                return datatableImage($data->image);
            })
            ->addColumn('title', function ($data) {
                return $data->{ 'title_'.lang() };
            })
            ->addColumn('sub_title', function ($data) {
                return $data->{ 'sub_title_'.lang() };
            })
            ->addColumn('button', function ($data) {
                return $data->{'button_'.lang()} ?? '';
            })
            ->addColumn('status', function($data) {
                return status_icon($data->status);
            })
            ->addColumn('action', function($data) {
                $this->actionButtons(datatable_menu_edit(route('system.about.edit', $data->id), 'system.about.edit'));
                return $this->actionButtonsRender($this->aboutRepository->modelPath(), $data->id);
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create(): array
    {
        $this->pageTitle('Create Slider');
        $this->breadcrumb('Home');
        $this->breadcrumb('Sliders', 'system.slider.index');
        $this->otherData([
            'languages' => $this->languageRepository->getWhere(['status' => StatusEnum::Enable->value]),
        ]);
        return $this->retunData;
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();

            $save_image = null;
            $save_thumbnail = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->save('upload/home/' . $name_gen);
                $save_image = 'upload/home/' . $name_gen;
            }

            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumb_name_gen = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
                Image::make($thumbnail)->save('upload/home/thumbnails/' . $thumb_name_gen);
                $save_thumbnail = 'upload/home/thumbnails/' . $thumb_name_gen;
            }

            $data = [
                'title_ar'      => $request['input']['lang'][2]['title'] ?? '',
                'title_en'      => $request['input']['lang'][1]['title'] ?? '',
                'sub_title_ar'  => $request['input']['lang'][2]['sub_title'] ?? '',
                'sub_title_en'  => $request['input']['lang'][1]['sub_title'] ?? '',
                'button_ar'     => $request['input']['lang'][2]['button'] ?? '',
                'button_en'     => $request['input']['lang'][1]['button'] ?? '',
                'type'          => SliderTypeEnum::Home,
                'status'        => $request['status'] ?? 'active',
                'button_url'    => $request['button_url'] ?? '',
                'image'         => $save_image,
                'thumbnail'     => $save_thumbnail,
            ];

            $store = $this->aboutRepository->store($data);
            DB::commit();
            return $store;
        } catch (\Exception $e) {
            DB::rollback();
            errorLog($e->getMessage());
            return false;
        }
    }


    public function edit($id): array
    {
        $about = $this->aboutRepository->find($id);

        $this->pageTitle('Update Slider');
        $this->breadcrumb('Sliders', 'system.slider.index');

        $this->otherData([
                'result' => $about,
                'languages' => $this->languageRepository->getWhere(['status' => StatusEnum::Enable->value])
            ]);
        return $this->retunData;
    }

    public function update($id, $request)
    {
        try {
            DB::beginTransaction();
            $about = $this->aboutRepository->find($id);

            if (!$about) {
                throw new \Exception("No slider found for ID: " . $id);
            }

            // Handle main image upload
            if ($request->file('image')) {
                if (file_exists($about->image)) {
                    @unlink($about->image);
                }
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->save('upload/home/' . $name_gen);
                $filePath = 'upload/home/' . $name_gen;
                $about->image = $filePath;
            }

            // Handle thumbnail upload
            if ($request->file('thumbnail')) {
                if (file_exists($about->thumbnail)) {
                    @unlink($about->thumbnail);
                }
                $thumbnail = $request->file('thumbnail');
                $thumb_name_gen = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
                Image::make($thumbnail)->save('upload/home/thumbnails/' . $thumb_name_gen);
                $thumbFilePath = 'upload/home/thumbnails/' . $thumb_name_gen;
                $about->thumbnail = $thumbFilePath;
            }

            // Update other fields
            $about->title_ar = $request['input']['lang'][2]['title'] ?? '';
            $about->title_en = $request['input']['lang'][1]['title'] ?? '';
            $about->sub_title_ar = $request['input']['lang'][2]['sub_title'] ?? '';
            $about->sub_title_en = $request['input']['lang'][1]['sub_title'] ?? '';
            $about->button_ar = $request['input']['lang'][2]['button'] ?? '';
            $about->button_en = $request['input']['lang'][1]['button'] ?? '';
            $about->button_url = $request['button_url'] ?? ''; // <-- زرار الرابط
            $about->status = $request['status'];

            $about->save();

            DB::commit();
            return $about;
        } catch (\Exception $e) {
            DB::rollback();
            errorLog($e->getMessage());
            return false;
        }
    }


}
