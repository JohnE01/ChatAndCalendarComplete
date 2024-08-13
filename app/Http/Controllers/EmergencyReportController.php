<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client; // Add this line to import the GuzzleHttp\Client class
class EmergencyReportController extends Controller
{
    public function index()
    {
        return view('emergencyreport.index');
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'owner' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'importance' => 'required|string',
        ]);

        // Prepare the data to be sent to the API
        $requestData = [
            'owner' => $request->input('owner'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'importance' => $request->input('importance'),
        ];

        // Send a POST request to the API using Guzzle HTTP client
        $client = new Client();
        try {
            $response = $client->post('https://emergency.rkiveadmin.com/public/api/incidentsresponse.store1', [
                'json' => $requestData,
            ]);

            // Check if the request was successful (status code 2xx)
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                // Report successfully sent
                return response()->json(['message' => 'Report sent successfully'], $response->getStatusCode());
            } else {
                // Handle other status codes if needed
                return response()->json(['error' => 'Failed to send report'], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            // Handle exceptions, such as connection errors
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function show()
    {
        // Fetch API data
        $client = new Client();
        $response = $client->get('https://emergency.rkiveadmin.com/public/api/incidentsresponse');
        $data = json_decode($response->getBody(), true);

        // Pass data to view
        return view('emergencyreport.show', ['incidentResponses' => $data['incidentresponses']]);
    }
}