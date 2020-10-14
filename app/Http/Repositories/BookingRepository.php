<?php

namespace App\Http\Repositories;

use App\Models\Booking;

class BookingRepository
{
    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
}
