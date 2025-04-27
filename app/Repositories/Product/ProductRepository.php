<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    protected $modeler = Product::class;

    public function getDataTableQuery()
    {
        return $this->modeler->select(['id','image','title_en','title_ar','status','category_id']);
    }
}
