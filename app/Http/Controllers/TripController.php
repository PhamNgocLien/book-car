<?php

namespace App\Http\Controllers;

use App\Http\Services\BookingService;
use App\Http\Services\CarService;
use App\Models\Address;
use App\Models\Booking;
use App\Models\Status;
use App\Models\Car;
use App\Models\Trip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    protected $bookingService;
    protected $carService;

    public function __construct(BookingService $bookingService, CarService $carService)
    {
        $this->bookingService = $bookingService;
        $this->carService = $carService;
    }

    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function indexTrip()
    {
        $bookings = Booking::where('user_id', Auth::user()->id)->orderBy('status_id')->get();
        $addresses = Address::all();
        return view('trip.trip', compact('bookings', 'addresses'));
    }

    public function storeBooking(Request $request)
    {
        $this->bookingService->store($request);
        return redirect()->route('booking.store');
    }

    public function editBooking($id)
    {
        $addresses = Address::all();
        $booking_id = $id;
        $bookings = Booking::where('user_id', Auth::user()->id)->get();

        return view('trip.edit', compact('addresses', 'booking_id', 'bookings'));
    }

    public function updateBooking(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->person = $request->person_update;
        $booking->save();

        return redirect()->route('trip.index');
    }

    public function destroyBooking($id)
    {
        $booking = Booking::find($id);
        $booking->status_id = '5';
        $booking->save();

        return redirect()->route('trip.index');
    }

    public function indexAdmin()
    {
        $bookings = Booking::orderBy('status_id')->get();
        $addresses = Address::all();
        return view('admin.dashboard', compact('bookings', 'addresses'));
    }

    public function tripAdmin()
    {
        $trips = Trip::all();
        $cars = Car::all();
        $addresses = Address::all();
        return view('admin.list-trip', compact('trips', 'cars', 'addresses'));
    }

    public function arrangeCar()
    {
        $bookings = Booking::where('status_id','1')->orwhere('status_id','2')->orderBy('updated_at')->get();
        $cars = Car::all();
        $addresses = Address::all();
        return view('admin.arrange', compact('bookings', 'cars', 'addresses'));
    }

    public function storeCar(Request $request)
    {
        $data = explode(',', $request->car_booking);

        $car = Car::find($data[0]);
        $booking = Booking::find($data[1]);
        $tripID = $booking->trip_id;
        $trip = Trip::find($tripID);

        $car->person = $car->person + $booking->person;
        $car->save();

        $booking->car_id = $data[0];
        $booking->status_id = 2;
        $booking->save();

        $trip->car_id = $data[0];
        $trip->status_id = 2;
        $trip->save();

        return redirect()->route('admin.index');
    }

    public function tripStart(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->status_id = 3;
        $booking->save();

        $tripId = $booking->trip->id;
        $trip = Trip::find($tripId);
        $trip->status_id = 3;
        $trip->save();

        return redirect()->route('admin.index');
    }

    public function tripEnd(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->status_id = 4;
        $booking->save();

        $tripId = $booking->trip->id;
        $trip = Trip::find($tripId);
        $trip->status_id = 4;
        $trip->save();

        $carId = $trip->car_id;
        $car = Car::find($carId);
        if( $car->area_id = 1){
            $car->area_id = 2;
        } else {
            $car->area_id = 1;
        }


        return redirect()->route('admin.index');
    }
}
