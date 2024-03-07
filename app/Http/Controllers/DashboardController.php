<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch events from database
        $events = Event::all(); // You can use any method to retrieve events

        // Pass events data to the view
        return view('dashboard.index', ['events' => $events]);
    }
    public function show(Event $event)
    {
        return view('dashboard.show', compact('event'));
    }

}
