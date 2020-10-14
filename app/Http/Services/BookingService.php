<?php

namespace App\Http\Services;

use App\Http\Repositories\BookingRepository;
use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingService
{
    protected $bookingRepo;

    public function __construct(BookingRepository $bookingRepo)
    {
        $this->bookingRepo = $bookingRepo;
    }

    public function store(Request $request)
    {
        $trip = Trip::updateOrCreate(
            [
                'start_place' => $request->start_place,
                'end_place' => $request->end_place,
                'date' => Carbon::parse($request->date)->format('Y-m-d'),
                'time' => $request->time,
            ]
        );

        $user_id = Auth::user()->id;
        $trip_id = Trip::where([
            ['start_place', '=', $request->start_place],
            ['end_place', '=', $request->end_place],
            ['date', '=', Carbon::parse($request->date)->format('Y/m/d')],
            ['time', '=', $request->time]
        ])->value('id');
        $person = $request->person;

        $data = Booking::where([
            ['user_id', '=', $user_id],
            ['trip_id', '=', $trip_id]
        ])->get();

        if (count($data) == 0) {
            $booking = new Booking();
            $booking->user_id = $user_id;
            $booking->trip_id = $trip_id;
            $booking->person = $person;
            $booking->save();
        } else {
            $booking = Booking::where([
                ['user_id', '=', $user_id],
                ['trip_id', '=', $trip_id]
            ])->increment('person', $person);
        }
    }
}
