<?php


namespace App\Http\Services;


use App\Http\Repositories\CarRepository;
use App\Models\Car;
use Illuminate\Http\Request;

class CarService
{
    protected $carRepo;

    public function __construct(CarRepository $carRepo)
    {
        $this->carRepo = $carRepo;
    }

    public function showCarByArea($areaId)
    {
            $cars = Car::where('area_id','=',$areaId)->get();
    }
}
