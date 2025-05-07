<?php

namespace App\Services;


use App\Enums\StatusEnum;
use App\Repositories\ChooseItem\ChooseItemRepository;
use App\Repositories\Language\LanguageRepository;
use Illuminate\Support\Facades\DB;
use Datatables;


class ChooseItemService extends BaseService
{
    protected $chooseItemRepository,$languageRepository;

    public function __construct(ChooseItemRepository $chooseItemRepository,LanguageRepository $languageRepository)
    {
        parent::__construct();
        $this->chooseItemRepository = $chooseItemRepository;
        $this->languageRepository = $languageRepository;
    }

    public function loadViewData(): array
    {
        $this->pageTitle(__('Items'));
        $this->tableColumns([
            __('ID'),
            __('Title'),
            __('Text'),
            __('Status'),
            __('Action'),
        ]);

        $this->jsColumns([
            'id' => 'choose_item.id',
            'title' => 'choose_item.title_'.lang(),
            'text' => 'choose_item.text_'.lang(),
            'status' => 'choose_item.status',
            'action' => '',
        ]);

        $this->filterIgnoreColumns(['action']);
        $this->addButton('system.choose-item.create','Add Item');
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
                $this->actionButtons(datatable_menu_edit(route('system.choose-item.edit', $data->id), 'system.choose-item.edit'));
                return $this->actionButtonsRender($this->chooseItemRepository->modelPath(), $data->id);
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create(): array
    {
        $this->pageTitle('Create Item');
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
        $this->pageTitle('Update Item');
        $this->breadcrumb('Services', 'system.our-service.index');

        $this->otherData([
                'item' => $this->chooseItemRepository->find($id),
                'languages' => $this->languageRepository->getWhere(['status' => StatusEnum::Enable->value])
            ]);
        return $this->retunData;
    }

    public function update($id,$request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'title_ar' => $request['input']['lang'][2]['title'] ?? '',
                'title_en' => $request['input']['lang'][1]['title'] ?? '',
                'text_ar' => $request['input']['lang'][2]['sub_title'] ?? '',
                'text_en' => $request['input']['lang'][1]['sub_title'] ?? '',
                'status' => $request->status,
                'order' => $request->order,
                'icon' => $request->icon,
            ];

            $update = $this->chooseItemRepository->update($id,$data);
            DB::commit();
            return $update;
        } catch (\Exception $e) {
            DB::rollback();
            errorLog($e->getMessage());
            return false;
        }
    }

}
