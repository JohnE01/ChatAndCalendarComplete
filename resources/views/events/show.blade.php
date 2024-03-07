@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/calendar.css') }}">
    <style>
        .container {
            margin-top: 50px;
            text-align: center;
            color: #000;
        }

        .col-md-12 {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            color: #000;
            margin: auto;
            width: 50%;
            margin-top: 50px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #000;
        }

        p, ul {
            margin-bottom: 10px;
            color: #000;
        }

        .btn-primary {
            background-color: purple;
            border-color: purple;
            color: #fff;
            margin-right: 10px;
        }

        .btn-danger {
            background-color: red;
            border-color: red;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $event->title }}</h1>
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
                @if($event->description)
                    <p><strong>Description:</strong> {{ $event->description }}</p>
                @endif
                <div class="d-flex justify-content-center">
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
