@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')

@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
  
@endsection

@section('content')
    <div>
        <h1>Dashboard</h1>
        <div>
            <h2>Upcoming Events</h2>
            <div class="container mt-5">
                <h1 style="color: #005cbf;">Events</h1>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th style="background-color: #005cbf; color: #fff;">Title</th>
                            <th style="background-color: #005cbf; color: #fff;">Start Time</th>
                            <th style="background-color: #005cbf; color: #fff;">End Time</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->start_time }}</td>
                            <td>{{ $event->end_time }}</td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
