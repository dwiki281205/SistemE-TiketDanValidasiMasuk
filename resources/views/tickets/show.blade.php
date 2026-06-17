@extends('layouts.app')

@section('content')

<div class="card text-center">
    <div class="card-body">
        <h3 class="text-success">🎉 Tiket Berhasil Dibeli</h3>

        <p><strong>{{ $ticket->buyer_name }}</strong></p>
        <p>{{ $ticket->email }}</p>

        <hr>

        <h5>{{ $ticket->event->title }}</h5>
        <p>{{ $ticket->event->venue }}</p>

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