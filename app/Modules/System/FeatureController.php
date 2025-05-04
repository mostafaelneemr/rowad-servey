<?php

namespace App\Modules\System;

use App\Services\FeatureService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class FeatureController extends SystemController
{

    protected $featureService;

    public function __construct(FeatureService $featureService)
    {
        parent::__construct();
        $this->featureService = $featureService;
    }

    public function index(Request $request)
    {
        if ($request->isDataTable) {
            return $this->featureService->loadDataTableData();
        }
        return $this->view('product.feature.index', $this->featureService->loadViewData());
    }

    public function create()
    {
        return $this->view('product.feature.create', $this->featureService->create());
    }

    public function store(Request $request)
    {
        $store = $this->featureService->store($request);
        if ($store) {
            flash_msg('success',__('Data Added successfully'));
            return $this->success( __( 'Data added successfully' ),
                [ 'url' => route( 'system.feature.index' )] );
        } else {
            return $this->fail(__( 'Sorry, we could not add the data' ) );
        }
    }

    public function edit($id)
    {
        return $this->view('product.feature.create', $this->featureService->edit($id));
    }

    public function update(Request $request, $id)
    {
        $update = $this->featureService->update($id, $request);
        if ($update) {
            flash_msg('success',__( 'Data Updated successfully' ));
            return $this->success( __( 'Data Updated successfully' ),
                ['url'=> route('system.feature.index') ]);
        } else {
            return $this->fail(__( 'Sorry, we could not Update the data' ) );
        }

    }

}
