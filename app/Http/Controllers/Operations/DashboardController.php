<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with([
            'timetable',
            'timetable.citypair',
            'timetable.citypair.origin',
            'timetable.citypair.destination',
        ])->where('user_id','=',auth()->user()->id)
            ->orderBy('planned_departure','ASC')
            ->get();
        
        return view('operations.index', [
            'nextFlight' => $reservations[0],
            'upcomingFlights' => $reservations,
        ]);
    }
}
