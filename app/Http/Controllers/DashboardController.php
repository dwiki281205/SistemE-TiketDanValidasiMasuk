<?php

namespace App\Http\Controllers;

use App\Models\EticketEvent;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = EticketEvent::count();
        $totalTickets = Ticket::count();
        $usedTickets = Ticket::where('is_used', 1)->count();
        $unusedTickets = Ticket::where('is_used', 0)->count();

        return view('dashboard.index', compact(
            'totalEvents',
            'totalTickets',
            'usedTickets',
            'unusedTickets'
        ));
    }
}