<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EticketEvent;

class EventController extends Controller
{

public function index()
{
    $events = EticketEvent::all();
    return view('events.index', compact('events'));
}

public function create()
{
    return view('events.create');
}

public function store(Request $request)
{
    EticketEvent::create([
        'title' => $request->title,
        'venue' => $request->venue,
        'event_date' => $request->event_date,
        'total_seats' => $request->total_seats,
        'price' => $request->price,
    ]);

    return redirect('/events');
}
}
