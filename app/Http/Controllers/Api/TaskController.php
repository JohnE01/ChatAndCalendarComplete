<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }
        return response()->json($task);
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string',
        'description' => 'nullable|string', // Assuming 'description' is nullable
        'created_at' => 'nullable|date', // Assuming 'created_at' is nullable
        'updated_at' => 'nullable|date', // Assuming 'updated_at' is nullable
        // Add validation rules for other fields if needed
    ]);

    // Create a new task instance
    $task = new Task();
    $task->name = $request->input('name');
    $task->description = $request->input('description');
    $task->created_at = $request->input('created_at');
    $task->updated_at = $request->input('updated_at');
    // Assign values to other fields if needed
    
    // Save the task to the database
    $task->save();

    // Optionally, you can return a response indicating success
    return response()->json(['message' => 'Task created successfully'], 201);
}

public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string',
        'description' => 'nullable|string', // Assuming 'description' is nullable
        'created_at' => 'nullable|date', // Assuming 'created_at' is nullable
        'updated_at' => 'nullable|date', // Assuming 'updated_at' is nullable
        // Add validation rules for other fields if needed
    ]);

    // Find the task by ID
    $task = Task::find($id);
    if (!$task) {
        return response()->json(['error' => 'Task not found'], 404);
    }

    // Update the task with the new data
    $task->name = $request->input('name');
    $task->description = $request->input('description');
    $task->created_at = $request->input('created_at');
    $task->updated_at = $request->input('updated_at');
    // Assign values to other fields if needed
    
    // Save the updated task to the database
    $task->save();

    // Optionally, you can return a response indicating success
    return response()->json(['message' => 'Task updated successfully'], 200);
}

}
