<?php

namespace App\Http\Controllers\User;

use App\Enums\AppointmentStatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = auth()->user();
        $listings = $user->listings()->orderBy('id', 'DESC')->limit(5)->get();
        $bookings = $user->bookings()->orderBy('id', 'DESC')->limit(5)->get();
        $appointments = $user->appointments()->orderBy('id', 'DESC')->limit(5)->get();
        $wishlist = $user->wishlists()->orderBy('id', 'DESC')->limit(5)->get();
        $cases = AppointmentStatusEnum::cases();
        return view('user.index', [
            'user' => $user,
            'bookings' => $bookings,
            'appointments' => $appointments,
            'wishlists' => $wishlist,
            'listings' => $listings,
            'cases' => $cases
        ]);
    }
}
