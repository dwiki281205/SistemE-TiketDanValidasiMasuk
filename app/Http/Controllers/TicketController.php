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

    $paymentProofPath = null;
    if ($request->hasFile('payment_proof')) {
        $paymentProofPath = $request->file('payment_proof')->store('payments', 'public');
    }

    $ticket = Ticket::create([
        'user_id' => auth()->check() ? auth()->id() : null,
        'event_id' => $request->event_id,
        'buyer_name' => $request->buyer_name,
        'ticket_type' => $request->ticket_type,
        'email' => $request->email,
        'phone' => $request->phone,
        'ticket_code' => $ticketCode,
        'qr_code_data' => $qr,
        'payment_method' => 'QRIS',
        'payment_status' => 'pending',
        'payment_proof' => $paymentProofPath
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

public function confirmPayment($id)
{
    $ticket = Ticket::findOrFail($id);
    
    $ticket->payment_status = 'paid';
    $ticket->save();

    return back()->with('success', 'Pembayaran tiket berhasil dikonfirmasi.');
}

public function payments()
{
    $tickets = Ticket::with('event')
        ->where('payment_status', 'pending')
        ->latest()
        ->get();

    return view('tickets.payments', compact('tickets'));
}

public function index()
{
    $query = Ticket::with('event');

    if (auth()->user()->role !== 'admin') {
        $query->where(function ($q) {
            $q->where('user_id', auth()->id())
              ->orWhere('email', auth()->user()->email);
        });
    }

    $tickets = $query->latest()->get();

    return view('tickets.index', compact('tickets'));
}

public function requestRefund($id)
{
    $ticket = Ticket::findOrFail($id);

    $ticket->refund_status = 'pending';

    $ticket->save();

    return back()->with(
        'success',
        'Permintaan refund berhasil dikirim'
    );
}

public function refunds()
{
    $tickets = Ticket::with('event')
        ->where('refund_status', '!=', 'none')
        ->latest()
        ->get();

    return view(
        'refunds.index',
        compact('tickets')
    );
}

public function approveRefund($id)
{
    $ticket = Ticket::findOrFail($id);

    $ticket->refund_status = 'approved';
    $ticket->payment_status = 'refunded';

    $ticket->save();

    return back()->with('success', 'Permintaan refund berhasil disetujui.');
}

public function rejectRefund($id)
{
    $ticket = Ticket::findOrFail($id);

    $ticket->refund_status = 'rejected';

    $ticket->save();

    return back()->with('success', 'Permintaan refund berhasil ditolak.');
}

public function myRefunds()
{
    $tickets = Ticket::with('event')
        ->where(function ($query) {
            $query->where('user_id', auth()->id())
                  ->orWhere('email', auth()->user()->email);
        })
        ->where('refund_status', '!=', 'none')
        ->latest()
        ->get();

    return view(
        'tickets.my_refunds',
        compact('tickets')
    );
}
}

