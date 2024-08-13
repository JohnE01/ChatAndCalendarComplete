@extends('layouts.master')

@section('title', 'Incident Responses')

@section('css')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        strong {
            color: #666;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h1>Incident Responses</h1>

        <ul>
            @foreach ($incidentResponses as $response)
                <li>
                    <strong>Title:</strong> {{ $response['title'] }}<br>
                    <strong>Owner:</strong> {{ $response['owner'] }}<br>
                    <strong>Description:</strong> {{ $response['description'] }}<br>
                    <strong>Importance:</strong> {{ $response['importance'] }}<br>
                    <strong>Progress:</strong> {{ $response['progress'] }}<br>
                    <strong>Status:</strong> {{ $response['status'] }}<br>
                    <strong>Created At:</strong> {{ $response['created_at'] }}<br>
                    <strong>Updated At:</strong> {{ $response['updated_at'] }}<br>
                    <hr>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
