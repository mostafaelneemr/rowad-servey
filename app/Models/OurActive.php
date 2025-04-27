<?php

namespace App\Models;

use App\Models\admin\Fontawsome;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurActive extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $guarded = [];

    public function fontawsome()
    {
        return $this->belongsTo(Fontawsome::class, 'fontawsome_id', 'id');
    }
}
