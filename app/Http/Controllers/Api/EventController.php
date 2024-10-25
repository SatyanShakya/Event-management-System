<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::with('category')->get();
        return response()->json($events);
    }


    public function show($id)
    {
        $event = Event::with(['category', 'attendees'])->findOrFail($id);
        return response()->json($event);
    }
}
