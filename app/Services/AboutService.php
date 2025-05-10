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
            __('Title'),
            __('Text'),
            __('Status'),
            __('Action'),
        ]);

        $this->jsColumns([
            'id' => 'about.id',
            'title' => 'about.title_'.lang(),
            'text' => 'about.text_'.lang(),
            'status' => 'slider.status',
            'action' => '',
        ]);

        // $this->breadcrumb('');
        $this->filterIgnoreColumns(['action']);
        $this->addButton('system.about.create','Add About');
        return $this->retunData;
    }

    public function loadDataTableData()
    {
        return Datatables::eloquent($this->aboutRepository->getDataTableQuery())
            ->addColumn('id', '{{$id}}')

            ->addColumn('title', function ($data) {
                return $data->{ 'title_'.lang() };
            })
            ->addColumn('text', function ($data) {
                return $data->{ 'text_'.lang() };
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
        $this->pageTitle('Create About');
        $this->breadcrumb('Home');
        $this->breadcrumb('Abouts', 'system.about.index');
        $this->otherData([
            'languages' => $this->languageRepository->getWhere(['status' => StatusEnum::Enable->value]),
        ]);
        return $this->retunData;
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'title_ar' => $request['input']['lang'][2]['title'] ?? '',
                'title_en' => $request['input']['lang'][1]['title'] ?? '',
                'text_ar' => $request['input']['lang'][2]['text'] ?? '',
                'text_en' => $request['input']['lang'][1]['text'] ?? '',
                'status' => $request->status,
                'order' => $request->order,
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

    public function update($request,$id)
    {
        try {
            DB::beginTransaction();
            $about = $this->aboutRepository->find($id);

            if (!$about) {
                throw new \Exception("No slider found for ID: " . $id);
            }

            // Handle main image upload
            $data = [
                'title_ar' => $request['input']['lang'][2]['title'] ?? '',
                'title_en' => $request['input']['lang'][1]['title'] ?? '',
                'text_ar' => $request['input']['lang'][2]['text'] ?? '',
                'text_en' => $request['input']['lang'][1]['text'] ?? '',
                'status' => $request->status,
                'order' => $request->order,
            ];

            $about = $this->aboutRepository->update($data, $id);
            DB::commit();
            return $about;
        } catch (\Exception $e) {
            DB::rollback();
            errorLog($e->getMessage());
            return false;
        }
    }


}
