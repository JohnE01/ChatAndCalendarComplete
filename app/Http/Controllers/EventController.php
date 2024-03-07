<?php

// app/Http/Controllers/EventController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Room;
use App\Models\Item;
use App\Models\Task;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }
    public function eventuser()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }
    
    public function create()
    {
        $availableRooms = Room::all(); // Fetch all available rooms
        $items = Item::all(); // Fetch all items from the database
        $tasks = Task::all();

        return view('events.create', compact('availableRooms','items' ,'tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // Your validation rules...
        ]);
    
        // Retrieve the selected room
        $selectedRoom = Room::find($request->input('room_id'));
    
        // Validate and create the event
        $eventData = $request->except(['_token', 'item_ids', 'task_ids']);
        $event = Event::create($eventData);
    
        // Associate the selected room with the event
        if ($selectedRoom) {
            $event->room()->associate($selectedRoom);
            $event->save();
        }
    
        // Attach selected items to the event
        $event->items()->attach($request->input('item_ids', []));
    
        // Attach selected tasks to the event
        $event->tasks()->attach($request->input('task_ids', []));
    
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }
    

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $availableItems = Item::all(); // Replace with your actual logic
        $availableRooms = Room::all(); // Replace with your actual logic
        $tasks = Task::all(); // Replace with your actual logic
    
        return view('events.edit', compact('event', 'availableItems', 'availableRooms', 'tasks'));
    }
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'room_id' => 'nullable|exists:rooms,id',
            'item_ids' => 'array',
            'task_ids' => 'array',
            'description' => 'nullable|string',
            // Add other fields that you want to validate/update
        ]);
    
        // Retrieve the selected room
        $selectedRoom = Room::find($request->input('room_id'));
    
        // Update the event
        $event->update($request->except(['_token', '_method', 'room_id', 'item_ids', 'task_ids']));
    
        // Associate the selected room with the event
        if ($selectedRoom) {
            $event->room()->associate($selectedRoom);
            $event->save();
        } else {
            // If no room is selected, detach the existing room
            $event->room()->dissociate();
            $event->save();
        }
    
        // Sync selected items with the event
        $event->items()->sync($request->input('item_ids', []));
    
        // Sync selected tasks with the event
        $event->tasks()->sync($request->input('task_ids', []));
    
        return redirect()->route('events.show', $event->id)->with('success', 'Event updated successfully.');
    }
    

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    public function getEvents()
    {
        $events = Event::all();
        $formattedEvents = [];

        foreach ($events as $event) {
            $formattedEvents[] = [
                'title' => $event->title,
                'start' => $event->start_time,
                'end' => $event->end_time,
            ];
        }

        return response()->json($formattedEvents);
    }
}
