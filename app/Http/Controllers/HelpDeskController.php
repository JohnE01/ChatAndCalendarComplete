<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HelpDeskController extends Controller
{
    public function index()
    {
        return view('helpdesk.index');
    }

    public function submitTicket(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'concern' => 'required|string',
        'priority' => 'required|string',
        // Add validation rules for other fields if needed
    ]);

    // Prepare the data to be sent to the API
    $formData = [
        'Name' => $request->input('name'),
        'Email' => $request->input('email'),
        'Company' => $request->input('company', ''), // Optional field
        'Department' => $request->input('department', ''), // Optional field
        'Concern' => $request->input('concern'),
        'Priority Level' => $request->input('priority'),
        // Add other form fields here
    ];

    // Send a POST request to the API endpoint to submit the ticket
    $response = Http::post('https://helpdesk.rkiveadmin.com/api/help-desk-data', $formData);

    // Check if the request was successful
    if ($response->successful()) {
        // Data was successfully submitted to the API
        return redirect()->back()->with('success', 'Ticket submitted successfully.');
    } else {
        // There was an error submitting the ticket
        return redirect()->back()->with('error', 'Failed to submit ticket. Please try again later.');
    }
}

}
