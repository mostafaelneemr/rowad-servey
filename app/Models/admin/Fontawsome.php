<?php

namespace App\Models\admin;

use App\Models\OurActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fontawsome extends Model
{
    use HasFactory;
    protected $table = "fontawsomes";

    protected $fillable = ['name'];

    public function OurActive()
    {
        return $this->hasMany(OurActive::class);
    }
}
