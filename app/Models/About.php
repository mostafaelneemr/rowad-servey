<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends GlobalModel
{
    use HasFactory;
    public $table = 'about';
    public $primaryKey = 'id';

    public $fillable = ['title_en','title_ar','text_en','text_ar','sort','status'];


}
