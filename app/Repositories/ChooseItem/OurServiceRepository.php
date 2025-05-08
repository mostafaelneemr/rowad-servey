<?php

namespace App\Repositories\ChooseItem;

use App\Models\OurService;
use App\Repositories\BaseRepository;

class OurServiceRepository extends BaseRepository
{
    protected $modeler = OurService::class;

    public function getDataTableQuery()
    {
        return $this->modeler->select(['id','icon','title_en','title_ar','text_en','text_ar','status','order']);
    }
}
