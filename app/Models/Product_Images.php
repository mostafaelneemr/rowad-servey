<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Images extends GlobalModel
{
    use HasFactory;
    public $table = 'product_images';
    public $primaryKey = 'id';

    public $fillable = ['product_id','sort','image'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
