<?php

namespace App\Modules\System;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends SystemController
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        if ($request->isDataTable) {
            return $this->categoryService->loadDataTableData();
        }
        return $this->view('category.index', $this->categoryService->loadViewData());
    }

    public function create()
    {
        return $this->view('category.create', $this->categoryService->create());
    }


    public function store(Request $request)
    {
        $user = $this->categoryService->store($request);
        if ($user) {
            flash_msg('success',__('Data Added successfully'));
            return $this->success( __( 'Data added successfully' ),
                [ 'url' => route( 'system.category.index' )] );
        } else {
            return $this->fail(__( 'Sorry, we could not add the data' ) );
        }
    }

    public function edit($id)
    {
        return $this->view('category.create', $this->categoryService->edit($id));
    }

    public function update(Request $request, $id)
    {
        $update = $this->categoryService->update($id, $request);
        if ($update) {
            flash_msg('success',__( 'Data Updated successfully' ));
            return $this->success( __( 'Data Updated successfully' ),
                ['url'=> route('system.category.index') ]);
        } else {
            return $this->fail(__( 'Sorry, we could not Update the data' ) );
        }

    }

}
