<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_place',
        'end_place',
        'date',
        'time',
        'status_id',
        'person',
        'car_id'
    ];

    public static function firstOrCreate()
    {

    }

    public function bookings()
    {
        return $this->hasMany(Booking::class,'trip_id');
    }

    public function startPlace()
    {
        return $this->belongsTo(Address::class,'start_place');
    }

    public function endPlace()
    {
        return $this->belongsTo(Address::class,'end_place');
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
