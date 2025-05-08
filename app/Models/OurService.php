<?php

namespace App\Models;


use App\Models\Scopes\StatusActive;

class OurService extends GlobalModel
{
    public $table = 'our_service';
    public $timestamps = false;
    public $primaryKey = 'id';

    public $fillable = ['id','icon','order','title_en','title_ar', 'text_en','text_ar','status'];


}
