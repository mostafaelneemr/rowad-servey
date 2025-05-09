<?php

namespace App\Modules\System;

use App\Services\AboutService;
use Illuminate\Http\Request;

class AboutController extends SystemController
{
    protected $aboutService;

    public function __construct(AboutService $aboutService)
    {
        parent::__construct();
        $this->aboutService = $aboutService;
    }

    public function index(Request $request)
    {
        if ($request->isDataTable) {
            return $this->aboutService->loadDataTableData();
        }
        return $this->view('product.index', $this->aboutService->loadViewData());
    }

    public function create()
    {
        return $this->view('product.create', $this->aboutService->create());
    }


    public function store(Request $request)
    {
        $user = $this->aboutService->store($request);
        if ($user) {
            flash_msg('success',__('Data Added successfully'));
            return $this->success( __( 'Data added successfully' ),
                [ 'url' => route( 'system.product.index' )] );
        } else {
            return $this->fail(__( 'Sorry, we could not add the data' ) );
        }
    }

    public function edit($id)
    {
        return $this->view('product.create', $this->aboutService->edit($id));
    }

    public function update(Request $request, $id)
    {
        $update = $this->aboutService->update($request,$id);
        if ($update) {
            flash_msg('success',__( 'Data Updated successfully' ));
            return $this->success( __( 'Data Updated successfully' ),
                ['url'=> route('system.product.index') ]);
        } else {
            return $this->fail(__( 'Sorry, we could not Update the data' ) );
        }

    }
}
