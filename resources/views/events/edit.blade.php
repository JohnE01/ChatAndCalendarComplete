@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/calendar.css') }}">
    <style>
        body {
            background-color: white;
            color: black;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
        }
        .form-control {
            color: black;
            width: 70%; /* Changed width */
        }
        textarea.form-control {
            height: 80px; /* Changed height for textarea */
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 style="color: black;">Edit Event</h1>
            <form action="{{ route('events.update', $event->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
                </div>

                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ \Carbon\Carbon::parse($event->start_time)->format('Y-m-d\TH:i') }}" required>
                </div>

                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ \Carbon\Carbon::parse($event->end_time)->format('Y-m-d\TH:i') }}" required>
                </div>

                <div class="form-group">
                    <label for="room_id">Select Place</label>
                    <select name="room_id" id="room_id" class="form-control" required>
                        <!-- Loop through and display available rooms -->
                        @foreach($availableRooms as $room)
                            @if($room->id == $event->room_id)
                            <option value="{{ $room->id }}" selected>{{ $room->name }}</option>
                            @else
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="task_ids">Select Tasks</label>
                    <select name="task_ids[]" id="task_ids" class="form-control" multiple required>
                        @foreach($tasks as $task)
                            @if(in_array($task->id, $event->tasks->pluck('id')->toArray()))
                            <option value="{{ $task->id }}" selected>{{ $task->name }}</option>
                            @else
                            <option value="{{ $task->id }}">{{ $task->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="item_ids">Select Needed Items</label>
                    <select name="item_ids[]" id="item_ids" class="form-control" multiple required>
                        @foreach($availableItems as $item)
                            <option value="{{ $item->id }}" {{ in_array($item->id, $event->items->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
    <label for="budget_id">Select Needed Budget</label>
    <select name="budget_id" class="form-control">
        @foreach($budgets as $budget)
            <option value="{{ $budget->id }}">{{ $budget->budget_name }} - ${{ $budget->budget_amount }}</option>
        @endforeach
    </select>
</div>


                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5">{{ $event->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection
