<?php

namespace App\Http\Services;

use App\Http\Repositories\BookingRepository;
use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\TripService;

class BookingService
{
    protected $bookingRepo;
    protected $trip;

    public function __construct(BookingRepository $bookingRepo, TripService $trip)
    {
        $this->bookingRepo = $bookingRepo;
        $this->trip = $trip;
    }

    public function getBooking(Request $request)
    {
        $userId = Auth::user()->id;
        $tripId = $this->trip->getTripId($request);

        $dataBooking = Booking::where([
            ['user_id', '=', $userId],
            ['trip_id', '=', $tripId]
        ])->first();

        return $dataBooking;
    }

    public function createBooking(Request $request)
    {
        $userId = Auth::user()->id;
        $tripId = $this->trip->getTripId($request);
        $person = $request->person;

        $booking = new Booking();
        $booking->user_id = $userId;
        $booking->trip_id = $tripId;
        $booking->person = $person;
        $booking->save();
    }

    public function increatePerson(Request $request)
    {
        $userId = Auth::user()->id;
        $tripId = $this->trip->getTripIdCheckPerson($request);
        $person = $request->person;

        $booking = Booking::where([
            ['user_id', '=', $userId],
            ['trip_id', '=', $tripId]
        ])->increment('person', $person);

        $trip = Trip::where('id', '=', $tripId)->increment('person', $person);
    }

    public function store(Request $request)
    {
        $dataBooking = $this->getBooking($request);

        $dataTrips = $this->trip->getTrip($request);
        $person = $request->person;

        if (count($dataTrips) == 0) {
            $this->trip->createTrip($request);
            $this->createBooking($request);
        } else {
            $canArrange = false;
            for ($i = 0; $i < count($dataTrips); $i++) {
                if ($person < 9 - $dataTrips[$i]->person) {
                    $canArrange = true;
                }
            }
            if (!$canArrange) {
                $this->trip->createTrip($request);
                $this->createBooking($request);
            } else {
                if(!$dataBooking){
                    $this->createBooking($request);
                    $this->trip->increatePerson($request);
                } else{
                    if($person < 9 - $dataBooking->person){
                        $this->increatePerson($request);
                    } else {
                        $this->createBooking($request);
                    }
                }
                $this->trip->increatePerson($request);
            }
        }
    }
}
