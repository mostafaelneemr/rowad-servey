<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    public $table = 'about';
    public $primaryKey = 'id';

    public $fillable = ['product_id','icon','title_en','title_ar','feature_en','feature_ar','sort'];


}
