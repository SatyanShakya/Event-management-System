<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::with('category')->get();

        if ($request->wantsJson()) {
            return response()->json($events);
        }

        return view('event.index', compact('events'));
    }

    public function show($id)
    {
        $event = Event::with(['category', 'attendees'])->findOrFail($id);

        return response()->json($event);
    }

    public function create(){
        $categories = Category::all();
        return view('event.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Event::create($validate);
        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('event.edit', compact('event', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:50',
            'category_id' => 'required|exists:categories,id',
        ]);

        $event = Event::findOrFail($id);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }


    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }

}
