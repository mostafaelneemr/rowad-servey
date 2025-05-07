<?php

namespace App\Models;


class ChooseItem extends GlobalModel
{
    public $table = 'our_service';
    public $timestamps = false;
    public $primaryKey = 'id';

    public $fillable = ['id','icon','order','title_en','title_ar', 'text_en','text_ar','status'];

}
