<?php

namespace App\Models;


class Category extends GlobalModel
{
    public $table = 'categories';
    public $primaryKey = 'id';

    public $fillable = ['id','title_en','title_ar','status'];

}
