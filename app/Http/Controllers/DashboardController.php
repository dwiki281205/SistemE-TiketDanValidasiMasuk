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
        
        $refundPending = Ticket::where('refund_status', 'pending')->count();
        $refundApproved = Ticket::where('refund_status', 'approved')->count();
        $refundRejected = Ticket::where('refund_status', 'rejected')->count();

        return view('dashboard.index', compact(
            'totalEvents',
            'totalTickets',
            'usedTickets',
            'unusedTickets',
            'refundPending',
            'refundApproved',
            'refundRejected'
        ));
    }
}