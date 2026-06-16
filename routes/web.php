<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [EventController::class, 'index']);

Route::get('/events/create', [EventController::class, 'create']);

Route::post('/events', [EventController::class, 'store']);

Route::get('/events/{id}/edit', [EventController::class, 'edit']);

Route::put('/events/{id}', [EventController::class, 'update']);

Route::delete('/events/{id}', [EventController::class, 'destroy']);


Route::get('/events/{id}/buy', [TicketController::class, 'create']);
Route::post('/tickets', [TicketController::class, 'store']);
