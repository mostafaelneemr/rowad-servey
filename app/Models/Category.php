<?php

namespace App\Models;


use App\Enums\DefaultStatus;

class Category extends GlobalModel
{
    public $table = 'categories';
    public $primaryKey = 'id';

    public $fillable = ['id','title_en','title_ar','status','slug'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function products_active()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->where('status', DefaultStatus::Active->value);
    }
}
