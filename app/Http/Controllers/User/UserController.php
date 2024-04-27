<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function bookingsList(Request $request)
    {
        if (Auth::user() == null) {
            echo 'you need to log in';
            return;
        }
        $userId = Auth::user()->id;
        $bookings = Reservation::select('reservations.*', 'cities.name as city')
            ->join('cities', 'Reservations.city_id', '=', 'cities.id')
            ->where("Reservations.user_id", $userId)
            ->paginate(4);

        return view("user.bookings", compact("bookings"));
    }
    public function test(Request $request)
    {

        $pass = Hash::make(1234);
        return $pass;
    }
}
