<?php

namespace App\Services;


use App\Enums\StatusEnum;
use App\Repositories\ChooseItem\OurServiceRepository;
use App\Repositories\Language\LanguageRepository;
use Illuminate\Support\Facades\DB;
use Datatables;


class OurServiceService extends BaseService
{
    protected $chooseItemRepository,$languageRepository;

    public function __construct(OurServiceRepository $chooseItemRepository, LanguageRepository $languageRepository)
    {
        parent::__construct();
        $this->chooseItemRepository = $chooseItemRepository;
        $this->languageRepository = $languageRepository;
    }

    public function loadViewData(): array
    {
        $this->pageTitle(__('Our Services'));
        $this->tableColumns([
            __('ID'),
            __('Title'),
            __('Text'),
            __('Status'),
            __('Action'),
        ]);

        $this->jsColumns([
            'id' => 'our_service.id',
            'title' => 'our_service.title_'.lang(),
            'text' => 'our_service.text_'.lang(),
            'status' => 'our_service.status',
            'action' => '',
        ]);

        $this->filterIgnoreColumns(['action']);
        $this->addButton('system.our-service.create','Add Service');
        return $this->retunData;
    }

    public function loadDataTableData()
    {
        return Datatables::eloquent($this->chooseItemRepository->getDataTableQuery())
            ->addColumn('id', '{{$id}}')
            ->addColumn('title', function ($data) {
                return $data->{ 'title_'.lang() };
            })
            ->addColumn('text', function ($data) {
                return $data->{'text_'.lang()} ?? '';
            })
            ->addColumn('status', function($data) {
                return status_icon($data->status);
            })
            ->addColumn('action', function($data) {
                $this->actionButtons(datatable_menu_edit(route('system.our-service.edit', $data->id), 'system.our-service.edit'));
                return $this->actionButtonsRender($this->chooseItemRepository->modelPath(), $data->id);
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create(): array
    {
        $this->pageTitle('Create Service');
        $this->breadcrumb('Home');
        $this->breadcrumb('Service', 'system.our-service.index');
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
                'icon' => $request->icon,
            ];

            $store = $this->chooseItemRepository->store($data);
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
        $this->pageTitle('Update Service');
        $this->breadcrumb('Services', 'system.our-service.index');

        $this->otherData([
                'result' => $this->chooseItemRepository->find($id),
                'languages' => $this->languageRepository->getWhere(['status' => StatusEnum::Enable->value])
            ]);
        return $this->retunData;
    }

    public function update($request,$id)
    {
        try {
            DB::beginTransaction();
            $update = $this->chooseItemRepository->find($id);

            if (!$update) {
                throw new \Exception("No statistic found for ID: " . $id);
            }

            $data = [
                'title_ar' => $request['input']['lang'][2]['title'] ?? '',
                'title_en' => $request['input']['lang'][1]['title'] ?? '',
                'text_ar' => $request['input']['lang'][2]['text'] ?? '',
                'text_en' => $request['input']['lang'][1]['text'] ?? '',
                'status' => $request->status,
                'order' => $request->order,
                'icon' => $request->icon,
            ];

            $update = $this->chooseItemRepository->update($data,$id);
            DB::commit();
            return $update;
        } catch (\Exception $e) {
            DB::rollback();
            errorLog($e->getMessage());
            return false;
        }
    }

}
