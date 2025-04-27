<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table = 'products';
    public $primaryKey = 'id';

    public $fillable = ['id','image','title_ar','title_en','status','sort','desc_ar','desc_en','image_desc_en','image_desc_ar','category_id','type','slug',
        'slider_image','pdf_file'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
