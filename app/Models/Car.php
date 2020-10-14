<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'car',
        'area_id',
        'person',
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class,'car_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class,'car_id');
    }
}
