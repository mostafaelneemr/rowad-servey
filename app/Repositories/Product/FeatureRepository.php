<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Models\Product_Features;
use App\Repositories\BaseRepository;

class FeatureRepository extends BaseRepository
{
    protected $modeler = Product_Features::class;

    public function getDataTableQuery()
    {
        return $this->modeler->select(['id','image','title_en','title_ar','status','category_id']);
    }
}
