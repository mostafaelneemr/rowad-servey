<?php

namespace App\Repositories\Statistic;

use App\Models\Statistic;
use App\Repositories\BaseRepository;

class StatisticRepository extends BaseRepository
{
    protected $modeler = Statistic::class;

    public function getDataTableQuery()
    {
        return $this->modeler->select(['id','title_en','title_ar','number','order','status']);
    }
}
