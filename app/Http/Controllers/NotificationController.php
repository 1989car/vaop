<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markallread()
    {
        // TODO: Better Error Handling
        auth()->user()->unreadNotifications->markAsRead();
    }
}
