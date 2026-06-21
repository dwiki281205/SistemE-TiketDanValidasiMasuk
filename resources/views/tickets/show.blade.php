@extends('layouts.app')

@section('content')

<div class="card text-center">
    <div class="card-body">
        <h3 class="text-success">🎉 Tiket Berhasil Dibeli</h3>

        <p><strong>{{ $ticket->buyer_name }}</strong></p>
        <p>{{ $ticket->email }}</p>
        <p class="text-muted">
    Dibeli:
    {{ $ticket->created_at->format('d M Y H:i') }}
</p>

        <hr>

        <h5>{{ $ticket->event->title }}</h5>
        <p>{{ $ticket->event->venue }}</p>
        @if($ticket->ticket_type == 'VIP')
    <span class="badge bg-warning text-dark fs-6">
        ⭐ VIP Ticket
    </span>
@else
    <span class="badge bg-primary fs-6">
        🎫 Regular Ticket
    </span>
@endif

<br><br>

@if($ticket->is_used)
    <span class="badge bg-danger">
        Sudah Digunakan
    </span>
@else
    <span class="badge bg-success">
        Belum Digunakan
    </span>
@endif

        <hr>

        <h4 class="text-primary">{{ $ticket->ticket_code }}</h4>

        <div class="mt-3">
            {!! $ticket->qr_code_data !!}
        </div>

        <br>

        <a href="/events" class="btn btn-dark">Kembali</a>
    </div>
</div>

@endsection