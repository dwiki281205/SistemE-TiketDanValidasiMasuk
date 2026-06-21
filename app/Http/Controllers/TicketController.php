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
        'ticket_type' => $request->ticket_type,
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

public function checkForm()
{
    return view('tickets.check');
}

public function check(Request $request)
{
    $ticket = Ticket::where('ticket_code', $request->ticket_code)->first();

    if (!$ticket) {
        return back()->with('error', 'Tiket tidak ditemukan');
    }

    if ($ticket->is_used) {
        return back()->with('error', 'Tiket sudah digunakan');
    }

    // 🔥 tandai sudah dipakai
    $ticket->update([
        'is_used' => 1,
        'used_at' => now()
    ]);

    return back()->with('success', 'Tiket valid! Silakan masuk');
}

public function index()
{
    $tickets = Ticket::with('event')
        ->latest()
        ->get();

    return view('tickets.index', compact('tickets'));
}
}
