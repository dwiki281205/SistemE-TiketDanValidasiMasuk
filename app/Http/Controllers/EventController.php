<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EticketEvent;
use Illuminate\Support\Facades\Storage;

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
    $posterPath = null;

    if ($request->hasFile('poster')) {
        $posterPath = $request->file('poster')->store('posters', 'public');
    }

    EticketEvent::create([
        'title' => $request->title,
        'venue' => $request->venue,
        'event_date' => $request->event_date,
        'total_seats' => $request->total_seats,
        'vip_price' => $request->vip_price,
        'regular_price' => $request->regular_price,
        'poster' => $posterPath,
    ]);

    return redirect('/events');
}

public function edit($id)
{
    $event = EticketEvent::findOrFail($id);

    return view('events.edit', compact('event'));
}

public function update(Request $request, $id)
{
    $event = EticketEvent::findOrFail($id);

    $posterPath = $event->poster;

    if ($request->hasFile('poster')) {

        if ($event->poster) {
            Storage::disk('public')->delete($event->poster);
        }

        $posterPath = $request->file('poster')->store('posters', 'public');
    }

   $event->update([
    'title' => $request->title,
    'venue' => $request->venue,
    'event_date' => $request->event_date,
    'total_seats' => $request->total_seats,

    'price' => $request->regular_price,

    'vip_price' => $request->vip_price,
    'regular_price' => $request->regular_price,
]);

    return redirect('/events');
}

public function destroy($id)
{
    $event = EticketEvent::findOrFail($id);
    $event->delete();

    return redirect('/events');
}
}
