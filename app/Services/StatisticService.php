<?php

namespace App\Services;


use App\Enums\StatusEnum;
use App\Repositories\Language\LanguageRepository;
use App\Repositories\Statistic\StatisticRepository;
use Datatables;
use Illuminate\Support\Facades\DB;


class StatisticService extends BaseService
{
    protected $statisticRepository,$languageRepository;

    public function __construct(StatisticRepository $statisticRepository,LanguageRepository $languageRepository)
    {
        parent::__construct();
        $this->statisticRepository = $statisticRepository;
        $this->languageRepository = $languageRepository;
    }

    public function loadViewData(): array
    {
        $this->pageTitle(__('Statistics'));
        $this->tableColumns([
            __('ID'),
            __('Title'),
            __('Number'),
            __('Sort'),
            __('Action'),
        ]);

        $this->jsColumns([
            'id' => 'id',
            'title' => 'title_'.lang(),
            'number' => 'number',
            'order' => 'order',
            'action' => '',
        ]);

        $this->filterIgnoreColumns(['action']);
        $this->addButton('system.statistic.create','Add Statistic');
        return $this->retunData;
    }

    public function loadDataTableData()
    {
        return Datatables::eloquent($this->statisticRepository->getDataTableQuery())
            ->addColumn('id', '{{$id}}')
            ->addColumn('title', function ($data) {
                return $data->{ 'title_'.lang() };
            })
            ->addColumn('number', function($data) {
                return $data->number;
            })
            ->addColumn('action', function($data) {
                $this->actionButtons(datatable_menu_edit(route('system.statistic.edit', $data->id), 'system.statistic.edit'));
                return $this->actionButtonsRender($this->statisticRepository->modelPath(), $data->id);
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create(): array
    {
        $this->pageTitle('Create Statistic');
        $this->breadcrumb('Home');
        $this->breadcrumb('Statistic', 'system.statistic.index');
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
                'title_en' => $request['input']['lang'][1]['title'] ?? '',
                'title_ar' => $request['input']['lang'][2]['title'] ?? '',
                'number' => $request->number ?? '',
                'order' => $request->order ?? '',
                'status' => $request->status,
            ];

            $store = $this->statisticRepository->store($data);
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
        $this->pageTitle('Update Statistic');
        $this->breadcrumb('Statistics', 'system.statistic.index');

        $this->otherData([
                'result' => $this->statisticRepository->find($id),
                'languages' => $this->languageRepository->getWhere(['status' => StatusEnum::Enable->value])
            ]);
        return $this->retunData;
    }

    public function update($id,$request)
    {
        try {
            DB::beginTransaction();
            $statistic = $this->statisticRepository->find($id);

            if (!$statistic) {
                throw new \Exception("No statistic found for ID: " . $id);
            }

            $data = [
                'title_en' => $request['input']['lang'][1]['title'] ?? '',
                'title_ar' => $request['input']['lang'][2]['title'] ?? '',
                'number' => $request->number ?? '',
                'order' => $request->order ?? '',
                'status' => $request->status,
            ];

            $statistic = $this->statisticRepository->update($data,$id);
            DB::commit();
            return $statistic;
        } catch (\Exception $e) {
            DB::rollback();
            errorLog($e->getMessage());
            return false;
        }
    }

}
