<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public function startPlaces()
    {
        return $this->hasMany(Trip::class,'start_place');
    }

    public function endPlaces()
    {
        return $this->hasMany(Trip::class,'end_place');
    }
}
