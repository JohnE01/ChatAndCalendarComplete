@extends('layouts.master')

@section('title', 'Create Event')

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
            min-height: 100vh; /* Adjusted the height */
            padding: 20px; /* Added some padding for better spacing */
        }
        .form-group label {
            color: black;
            font-weight: bold;
        }
        .form-control {
            border-color: black;
            color: black;
            width: 100%;
        }
        .btn-primary {
            background-color: black;
            border-color: black;
            color: white;
        }
        .btn-primary:hover {
            background-color: darkgray;
            border-color: darkgray;
        }
        #title,
        #start_time,
        #end_time,
        #room_id,
        #task_ids,
        #item_ids,
        #description {
            width: 100%;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 style="color: black;">Create Event</h1>
            <form id="createEventForm" action="{{ route('events.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="datetime-local" name="end_time" id="end_time" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="room_id">Select Place</label>
                    <select name="room_id" id="room_id" class="form-control" required>
                        <option value="">None selected</option>
                        @foreach($availableRooms as $room)
                            @if($room->reserved)
                                <option value="{{ $room->id }}" disabled>{{ $room->name }} (Reserved)</option>
                            @else
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="task_ids">Select Tasks</label>
                    <select name="task_ids[]" id="task_ids" class="form-control" multiple required>
                        <option value="">None selected</option>
                        @foreach($tasks as $task)
                            <option value="{{ $task->id }}">{{ $task->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="item_ids">Select Needed Items</label>
                    <select name="item_ids[]" id="item_ids" class="form-control" multiple required>
                        <option value="">None selected</option>
                        @foreach($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="budget_id">Select Needed Budget</label>
                    <select name="budget_id" class="form-control">
                        <option value="">None selected</option>
                        @if($budgets->isNotEmpty())
                            @foreach($budgets as $budget)
                                <option value="{{ $budget->id }}">{{ $budget->budget_name }} - ${{ $budget->budget_amount }}</option>
                            @endforeach
                        @else
                            <option value="">No budgets available</option>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" id="submitBtn" class="btn btn-primary">Create Event</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#submitBtn').on('click', function () {
            if (confirm('Are you sure you want to create this event?')) {
                $('#createEventForm').submit();
            }
        });
    });
</script>
@endsection
