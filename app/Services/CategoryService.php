<?php

namespace App\Services;


use App\Enums\StatusEnum;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Language\LanguageRepository;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Enums\SliderTypeEnum;
use Datatables;


class CategoryService extends BaseService
{
    protected $categoryRepository,$languageRepository;

    public function __construct(CategoryRepository $categoryRepository, LanguageRepository $languageRepository)
    {
        parent::__construct();
        $this->categoryRepository = $categoryRepository;
        $this->languageRepository = $languageRepository;
    }

    public function loadViewData(): array
    {
        $this->pageTitle(__('Categories'));
        $this->tableColumns([
            __('ID'),
            __('Title'),
            __('Status'),
            __('Action'),
        ]);

        $this->jsColumns([
            'id' => 'categories.id',
            'title' => 'categories.title_'.lang(),
            'status' => 'categories.status',
            'action' => '',
        ]);

        $this->filterIgnoreColumns(['action']);
        $this->addButton('system.category.create','Add Category');
        return $this->retunData;
    }

    public function loadDataTableData()
    {
        return Datatables::eloquent($this->categoryRepository->getDataTableQuery())
            ->addColumn('id', '{{$id}}')
            ->addColumn('title', function ($data) {
                return $data->{ 'title_'.lang() };
            })
            ->addColumn('status', function($data) {
                return status_icon($data->status);
            })
            ->addColumn('action', function($data) {
                $this->actionButtons(datatable_menu_edit(route('system.category.edit', $data->id), 'system.category.edit'));
                return $this->actionButtonsRender($this->categoryRepository->modelPath(), $data->id);
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create(): array
    {
        $this->pageTitle('Create Category');
        $this->breadcrumb('Home');
        $this->breadcrumb('Categories', 'system.category.index');
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
                'title_ar'      => $request['input']['lang'][2]['title'] ?? '',
                'title_en'      => $request['input']['lang'][1]['title'] ?? '',
                'status'        => $request['status'] ?? 'active',
            ];
            $store = $this->categoryRepository->store($data);
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

        $this->pageTitle('Update Category');
        $this->breadcrumb('Categories', 'system.category.index');

        $this->otherData([
                'result' => $this->categoryRepository->find($id),
                'languages' => $this->languageRepository->getWhere(['status' => StatusEnum::Enable->value])
            ]);
        return $this->retunData;
    }

    public function update($id, $request)
    {
        try {
            DB::beginTransaction();
            $category = $this->categoryRepository->find($id);

            if (!$category) {
                throw new \Exception("No slider found for ID: " . $id);
            }

            $data = [
                'title_ar'      => $request['input']['lang'][2]['title'] ?? '',
                'title_en'      => $request['input']['lang'][1]['title'] ?? '',
                'status'        => $request['status'] ?? 'active',
            ];

            $category = $this->categoryRepository->update($data,$id);

            DB::commit();
            return $category;
        } catch (\Exception $e) {
            DB::rollback();
            errorLog($e->getMessage());
            return false;
        }
    }


}
