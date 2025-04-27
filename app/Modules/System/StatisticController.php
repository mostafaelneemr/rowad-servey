<?php

namespace App\Modules\System;

use App\Services\StatisticService;
use App\Services\TestimonialService;
use Illuminate\Http\Request;

class StatisticController extends SystemController
{

    protected $statisticService;

    public function __construct(StatisticService $statisticService)
    {
        parent::__construct();
        $this->statisticService = $statisticService;
    }

    public function index(Request $request)
    {
        if ($request->isDataTable) {
            return $this->statisticService->loadDataTableData();
        }
        return $this->view('statistic.index', $this->statisticService->loadViewData());
    }

    public function create()
    {
        return $this->view('statistic.create', $this->statisticService->create());
    }


    public function store(Request $request)
    {
        $user = $this->statisticService->store($request);
        if ($user) {
            flash_msg('success',__('Data Added successfully'));
            return $this->success( __( 'Data added successfully' ),
                [ 'url' => route( 'system.statistic.index' )] );
        } else {
            return $this->fail(__( 'Sorry, we could not add the data' ) );
        }
    }

    public function edit($id)
    {
        return $this->view('statistic.create', $this->statisticService->edit($id));
    }

    public function update(Request $request, $id)
    {
        $update = $this->statisticService->update($id, $request);
        if ($update) {
            flash_msg('success',__( 'Data Updated successfully' ));
            return $this->success( __( 'Data Updated successfully' ),
                ['url'=> route('system.statistic.index') ]);
        } else {
            return $this->fail(__( 'Sorry, we could not Update the data' ) );
        }

    }

}
