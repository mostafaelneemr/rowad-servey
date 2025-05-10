<?php

namespace App\Repositories\About;

use App\Models\About;

use App\Repositories\BaseRepository;

class AboutRepository extends BaseRepository
{
    protected $modeler = About::class;

    public function getDataTableQuery()
    {
        return $this->modeler->select(['id','title_en','title_ar','text_ar','text_en','status']);
    }
}
