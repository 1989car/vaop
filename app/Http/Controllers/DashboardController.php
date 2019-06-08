<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    
    public function operations()
    {
        $reservations = Reservation::with([
            'timetable',
            'timetable.citypair',
            'timetable.citypair.origin',
            'timetable.citypair.destination',
        ])->where('user_id','=',auth()->user()->id)
            ->orderBy('planned_departure','ASC')
            ->get();
        
        return view('dashboard.operations', [
            'nextFlight' => $reservations[0],
            'upcomingFlights' => $reservations,
        ]);
    }
}
