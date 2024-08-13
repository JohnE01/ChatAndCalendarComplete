@extends('layouts.master')

@section('title', 'Default')

@section('css')
<style>
         h3 {
            color: #6a0dad;
        }
        h1 {
            color: ;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1 class="display-4">Dashboard</h1>
            <div class="container-fluid calendar-basic">
                <div class="card">
                    <div class="card-body">
                        <div class="row" id="wrap">
                            <div class="col-xxl-3 box-col-12">
                                <!-- Sidebar -->
                            </div>
                            <div class="col-xxl-9 box-col-12">
                                <!-- Calendar -->
                                <div class="calendar-default" id="calendar-container">
                                    <h1 style="text-align: center; margin-top: 0;">Calendar Manager</h1>
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    
                    <hr class="my-4">
                    <h2>Upcoming Events</h2>
                    <div class="card mt-4">
                        <div class="card-body">
                            @foreach($events as $event)
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>{{ $event->title }}</h3>
                                        <p><strong>Start Time:</strong> {{ $event->start_time }}</p>
                                        <p><strong>End Time:</strong> {{ $event->end_time }}</p>
                                        <p><strong>Selected Room:</strong> {{ $event->room->name }}</p>
                                        <p><strong>Selected Items:</strong></p>
                                        <ul>
                                            @foreach($event->items as $item)
                                                <li>{{ $item->name }}</li>
                                            @endforeach
                                        </ul>
                                        <p><strong>Associated Tasks:</strong></p>
                                        <ul>
                                            @foreach($event->tasks as $task)
                                                <li>{{ $task->name }}</li>
                                            @endforeach
                                        </ul>
                                        <!-- Display selected budget name and amount -->
                @if($event->budget_name && $event->budget_amount)
                    <p><strong>Selected Budget:</strong> {{ $event->budget_name }} - ${{ $event->budget_amount }}</p>
                @else
                    <p><strong>No Budget Assigned</strong></p>
                @endif
                                        @if($event->description)
                                            <p><strong>Description:</strong> {{ $event->description }}</p>
                                        @endif
                                        
                                    </div>
                                </div>
                                <hr> <!-- Add horizontal line between events -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
<!-- Include FullCalendar CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">

<!-- Include necessary JS libraries -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

<!-- Include Toastr for displaying messages -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Initialize FullCalendar with dayRender callback -->
<script>
    $(document).ready(function () {
        var SITEURL = "{{ url('/') }}";

        $('#calendar').fullCalendar({
            
            events: SITEURL + "/fullcalendar", // Update with your events endpoint
            displayEventTime: true,
            eventRender: function (event, element, view) {
                var title = event.title ? event.title : '';
            },
            
        });
    });
    
</script>
@endsection