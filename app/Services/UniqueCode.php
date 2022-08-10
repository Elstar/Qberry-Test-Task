<?php

namespace App\Services;

use App\Models\Booking;
use Str;

class UniqueCode
{
    public static function getFreeCode(): string
    {
        $free = false;
        while(! $free) {
            $code = Str::random(12);
            $booking = Booking::where('code', $code)->first();
            if (empty($booking) || ! $booking->exists()) {
                $free = true;
            }
        }
        return $code;
    }
}
