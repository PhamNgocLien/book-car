<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function trips()
    {
        return $this->hasMany(Trip::class,'status_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class,'status_id');
    }
}
