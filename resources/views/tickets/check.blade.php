@extends('layouts.app')

@section('content')

<h2>Cek Tiket</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="/check-ticket">
    @csrf
    <div class="mb-3">
        <input type="text" name="ticket_code" class="form-control" placeholder="Masukkan kode tiket">
    </div>
    <button class="btn btn-primary">Cek</button>
</form>

@endsection