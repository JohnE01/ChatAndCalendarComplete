@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
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
            <div class="container mt-5">
                <h1 style="color: #005cbf;">Events</h1>
                <a href="{{ route('events.create') }}" class="btn btn-primary">Add Event</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th style="background-color: #005cbf; color: #fff;">Title</th>
                            <th style="background-color: #005cbf; color: #fff;">Start Time</th>
                            <th style="background-color: #005cbf; color: #fff;">End Time</th>
                            <th style="background-color: #005cbf; color: #fff;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->start_time }}</td>
                            <td>{{ $event->end_time }}</td>
                            <td>
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Include FullCalendar CSS and JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

<!-- Include Toastr for displaying messages -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Initialize FullCalendar with dayRender callback -->
<script>
    $(document).ready(function () {
        var SITEURL = "{{ url('/') }}";

        $('#calendar').fullCalendar({
            editable: true,
            events: SITEURL + "/fullcalendar", // Update with your events endpoint
            displayEventTime: true,
            eventRender: function (event, element, view) {
                var title = event.title ? event.title : '';
            },
            dayRender: function (date, cell) {
                var events = $('#calendar').fullCalendar('clientEvents');
                var eventTitles = events
                    .filter(event => moment(date).isSame(event.start, 'day'))
                    .map(event => event.title);

                if (eventTitles.length > 0) {
                    var html = '<div class="fc-content">';
                    eventTitles.forEach(title => {
                        html += '<span class="fc-title">' + title + '</span><br>';
                    });
                    html += '</div>';
                    cell.append(html);
                }

                // Add click event to the cell to redirect to the 'events.create' route
                cell.on('click', function () {
                    window.location.href = SITEURL + '/events/create?date=' + moment(date).format("YYYY-MM-DD");
                });
            }
        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    });
</script>
@endsection
