<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoSetting extends GlobalModel
{
    use HasFactory;
    public $table = 'seo_settings';
    public $primaryKey = 'id';
}
