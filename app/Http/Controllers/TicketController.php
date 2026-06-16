<?php

namespace App\Http\Controllers;

use App\Models\EticketEvent;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create($id)
{
    $event = EticketEvent::findOrFail($id);

    return view('tickets.create', compact('event'));
}

public function store(Request $request)
{
    Ticket::create([
        'event_id' => $request->event_id,
        'buyer_name' => $request->buyer_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'ticket_code' => uniqid('TKT-'), // sementara
    ]);

    return redirect('/events');
}
}
