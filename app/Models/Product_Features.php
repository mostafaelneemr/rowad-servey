<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Features extends GlobalModel
{
    use HasFactory;
    public $table = 'product_features';
    public $primaryKey = 'id';

    public $fillable = ['product_id','icon','title_en','title_ar','feature_en','feature_ar','sort'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
