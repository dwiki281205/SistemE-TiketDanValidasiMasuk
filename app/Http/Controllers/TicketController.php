<?php

namespace App\Http\Controllers;

use App\Models\EticketEvent;
use App\Models\Ticket;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function create($id)
{
    $event = EticketEvent::findOrFail($id);

    return view('tickets.create', compact('event'));
}

public function store(Request $request)
{
    $lastTicket = Ticket::latest()->first();
    $number = $lastTicket ? $lastTicket->id + 1 : 1;

    $ticketCode = 'TKT-' . date('Ymd') . '-' . str_pad($number, 4, '0', STR_PAD_LEFT);

    $qr = QrCode::size(200)->generate($ticketCode);

    $ticket = Ticket::create([
        'event_id' => $request->event_id,
        'buyer_name' => $request->buyer_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'ticket_code' => $ticketCode,
        'qr_code_data' => $qr
    ]);

    return redirect('/tickets/' . $ticket->id);
}

public function show($id)
{
    $ticket = Ticket::with('event')->findOrFail($id);

    return view('tickets.show', compact('ticket'));
}
}
