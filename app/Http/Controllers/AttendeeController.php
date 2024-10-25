<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;
use App\Models\Event;

class AttendeeController extends Controller
{

    public function index()
    {
        $attendees= Attendee::with('event')->get();
        return view('attendee.index',compact('attendees'));
    }

    public function create()
    {
        $events = Event::all();
        return view('attendee.create', compact('events'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:attendees,email',
            'event_id' => 'required|exists:events,id',
        ]);

        Attendee::create($request->all());
        return redirect()->route('attendees.index')->with('success', 'Attendee created successfully.');
    }

    public function edit(Attendee $attendee)
    {
        $events = Event::all();
        return view('attendee.edit', compact('attendee', 'events'));
    }

    public function update(Request $request, Attendee $attendee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:attendees,email,' . $attendee->id,
            'event_id' => 'required|exists:events,id',
        ]);

        $attendee->update($request->all());
        return redirect()->route('attendees.index')->with('success', 'Attendee updated successfully.');
    }

    public function destroy(Attendee $attendee)
    {
        $attendee->delete();
        return redirect()->route('attendees.index')->with('success', 'Attendee deleted successfully.');
    }
}
