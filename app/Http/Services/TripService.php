<?php


namespace App\Http\Services;


use App\Http\Repositories\TripRepository;
use App\Models\Booking;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TripService
{
    protected $tripRepo;

    public function __construct(TripRepository $tripRepo)
    {
        $this->tripRepo = $tripRepo;
    }

    public function getTrip(Request $request)
    {
        $dataTrip = Trip::where([
            ['start_place', $request->start_place],
            ['end_place', $request->end_place],
            ['date', Carbon::parse($request->date)->format('Y-m-d')],
            ['time', $request->time],
        ])->get();

        return $dataTrip;
    }

    public function getTripId(Request $request)
    {
        $tripId = Trip::where([
            ['start_place', '=', $request->start_place],
            ['end_place', '=', $request->end_place],
            ['date', '=', Carbon::parse($request->date)->format('Y/m/d')],
            ['time', '=', $request->time]
        ])->value('id');

        return $tripId;
    }

    public function getTripIdCheckPerson(Request $request)
    {
        $tripId = Trip::where([
            ['start_place', '=', $request->start_place],
            ['end_place', '=', $request->end_place],
            ['date', '=', Carbon::parse($request->date)->format('Y/m/d')],
            ['time', '=', $request->time],
            ['person', '<=', 9 - $request->person]
        ])->value('id');

        return $tripId;
    }

    public function createTrip(Request $request)
    {
        $trip = new Trip();
        $trip->start_place = $request->start_place;
        $trip->end_place = $request->end_place;
        $trip->date = Carbon::parse($request->date)->format('Y-m-d');
        $trip->time = $request->time;
        $trip->person = $request->person;
        $trip->save();
    }

    public function increatePerson(Request $request)
    {
        $tripId = $this->getTripIdCheckPerson($request);
        $trip = Trip::find($tripId);
        $trip->person = $trip->person + $request->person;

    }
}
