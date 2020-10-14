<?php


namespace App\Http\Repositories;


use App\Models\Car;

class CarRepository
{
    protected $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }
}
