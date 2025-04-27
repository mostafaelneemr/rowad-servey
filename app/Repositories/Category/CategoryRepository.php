<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    protected $modeler = Category::class;

    public function getDataTableQuery()
    {
        return $this->modeler->select('id','title_en','title_ar','status','created_at');
    }
}
