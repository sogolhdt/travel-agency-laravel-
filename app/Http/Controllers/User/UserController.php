<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
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
        $bookings = Reservation::select('reservations.*', 'cities.name as city')->join('cities', 'Reservations.city_id', '=', 'cities.id')
            ->where("Reservations.user_id", $userId)->paginate(10);
        // dd($bookings->links());
        return view("user.bookings", compact("bookings"));
    }
}
