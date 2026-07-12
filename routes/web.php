<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $events = \App\Models\EticketEvent::latest()->take(3)->get();
    return view('welcome', compact('events'));
});

// Beli Tiket (Public)
Route::get('/events/{id}/buy', [TicketController::class, 'create']);
Route::post('/tickets', [TicketController::class, 'store']);
Route::get('/tickets/{id}', [TicketController::class, 'show']);

/*
|--------------------------------------------------------------------------
| Customer Portal (Authenticated Users)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // View Events list
    Route::get('/events', [EventController::class, 'index'])->name('events.index');

    // Profile Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Request Refund (User Action)
    Route::post('/refund/{id}', [TicketController::class, 'requestRefund'])->name('refund.request'); 

    // User's Refund History
    Route::get('/my-refunds', [TicketController::class, 'myRefunds'])->name('my-refunds');

    // Tickets Purchased History (Admin sees all, Customer sees their own)
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');

});

/*
|--------------------------------------------------------------------------
| Admin Portal (Authenticated Admins Only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Event Management (CRUD - excluding general index)
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    // Refund Management
    Route::get('/refunds', [TicketController::class, 'refunds'])->name('refunds.index');
    Route::post('/refunds/{id}/approve', [TicketController::class, 'approveRefund']);
    Route::post('/refunds/{id}/reject', [TicketController::class, 'rejectRefund']);

    // Validasi / Check-in Tiket
    Route::get('/check-ticket', [TicketController::class, 'checkForm'])->name('tickets.checkForm');
    Route::post('/check-ticket', [TicketController::class, 'check'])->name('tickets.check');

});

require __DIR__.'/auth.php';