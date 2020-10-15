<?php


namespace App\Http\Repositories;


use App\Models\Trip;

class TripRepository
{
    protected $tripModel;

    public function __construct(Trip $tripModel)
    {
        $this->tripModel = $tripModel;
    }
}
