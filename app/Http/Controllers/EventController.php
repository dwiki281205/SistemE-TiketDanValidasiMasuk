<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EticketEvent;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

public function index(Request $request)
{
    $query = EticketEvent::query();

    if ($request->filled('title')) {
        $query->where('title', 'like', '%' . $request->title . '%');
    }

    if ($request->filled('venue')) {
        $query->where('venue', 'like', '%' . $request->venue . '%');
    }

    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    $events = $query->get();
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
        'category' => $request->category,
        'venue' => $request->venue,
        'event_date' => $request->event_date,
        'event_time' => $request->event_time,
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
    'category' => $request->category,
    'venue' => $request->venue,
    'event_date' => $request->event_date,
    'event_time' => $request->event_time,
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
