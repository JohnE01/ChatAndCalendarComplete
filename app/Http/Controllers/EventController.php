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
use App\Models\Budget; 
use Illuminate\Support\Facades\Http; // Add this line to import the Http facade

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
        $budgets = Budget::all(); // Retrieve all budgets

        return view('events.create', compact('availableRooms','items' ,'tasks','budgets'));
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'room_id' => 'required|exists:g51_rooms,id',
            'item_ids' => 'array',
            'task_ids' => 'array',
            'budget_id' => 'nullable|exists:budgets,id',
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
        if ($request->has('item_ids')) {
            $event->items()->attach($request->input('item_ids', []));
        }
    
        // Attach selected tasks to the event
        if ($request->has('task_ids')) {
            $event->tasks()->attach($request->input('task_ids', []));
        }
    
        // Retrieve the selected budget ID from the request
        $budgetId = $request->input('budget_id');
    
        // Check if a budget ID was selected
        if ($budgetId) {
            // Fetch the budget details from the database
            $budget = Budget::findOrFail($budgetId);
    
            // Assign the budget name and amount to the event
            $event->budget_name = $budget->budget_name;
            $event->budget_amount = $budget->budget_amount;
        }
    
        // Save the event
        $event->save();
    
        return redirect()->route('events.index')->with('success', 'Events created successfully.');
    }    

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    public function getEvents(Request $request)
    {
        // Retrieve events from the database
        $events = Event::all();

        // Transform events data into the format expected by FullCalendar
        $formattedEvents = $events->map(function ($event) {
            return [
                'title' => $event->title,
                'start' => $event->start_time,
                'end' => $event->end_time
            ];
        });

        // Return events data as JSON response
        return response()->json($formattedEvents);
    }
}
