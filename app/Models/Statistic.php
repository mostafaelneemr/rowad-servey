<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends GlobalModel
{
    protected $fillable = [
        'title_en',
        'title_ar',
        'number',
        'order',
        'status'
    ];
}
