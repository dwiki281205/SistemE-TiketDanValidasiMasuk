@extends('layouts.app')

@section('content')

<h2 class="mb-4">Dashboard Admin</h2>

<div class="row">

    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5>Total Event</h5>
                <h3>{{ $totalEvents }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5>Total Tiket</h5>
                <h3>{{ $totalTickets }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5>Tiket Digunakan</h5>
                <h3>{{ $usedTickets }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h5>Belum Digunakan</h5>
                <h3>{{ $unusedTickets }}</h3>
            </div>
        </div>
    </div>

</div>

@endsection