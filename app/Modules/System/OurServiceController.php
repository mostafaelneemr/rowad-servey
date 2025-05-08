<?php

namespace App\Modules\System;

use App\Http\Requests\ItemFormRequest;
use App\Services\OurServiceService;
use Illuminate\Http\Request;

class OurServiceController extends SystemController
{

    protected $itemService;

    public function __construct(OurServiceService $itemService)
    {
        parent::__construct();
        $this->itemService = $itemService;
    }

    public function index(Request $request)
    {
        if ($request->isDataTable) {
            return $this->itemService->loadDataTableData();
        }
        return $this->view('choose_item.index', $this->itemService->loadViewData());
    }

    public function create()
    {
        return $this->view('choose_item.create', $this->itemService->create());
    }


    public function store(Request $request)
    {
        $store = $this->itemService->store($request);
        if ($store) {
            flash_msg('success',__('Data Added successfully'));
            return $this->success( __( 'Data added successfully' ),
                [ 'url' => route( 'system.our-service.index' )] );
        } else {
            return $this->fail(__( 'Sorry, we could not add the data' ) );
        }
    }

    public function edit($id)
    {
        return $this->view('choose_item.create', $this->itemService->edit($id));
    }

    public function update(Request $request, $id)
    {
        $update = $this->itemService->update($request, $id);
        if ($update) {
            flash_msg('success',__( 'Data Updated successfully' ));
            return $this->success( __( 'Data Updated successfully' ),
                ['url'=> route('system.our-service.index') ]);
        } else {
            return $this->fail(__( 'Sorry, we could not Update the data' ) );
        }

    }

}
