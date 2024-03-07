<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <style>
        body {
            background-color: #f0f2f5; /* Light violet background */
            font-family: Arial, sans-serif; /* Use a common sans-serif font */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 400px;
            background-color: #fff; /* White background for the card */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Drop shadow effect */
            padding: 20px; /* Add padding for spacing inside the card */
        }

        .card-title {
            text-align: center; /* Center the title */
            margin-bottom: 20px; /* Add space below the title */
        }

        .form-label {
            font-weight: bold; /* Bold font for form labels */
        }

        .btn-primary {
            background-color: #6c5ce7; /* Light violet button color */
            color: #fff; /* White text color */
            border: none; /* Remove border */
            padding: 10px 20px; /* Add padding to the button */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Add pointer cursor on hover */
            transition: background-color 0.3s ease; /* Smooth transition for background color */
        }

        .btn-primary:hover {
            background-color: #5245b5; /* Darker violet color on hover */
        }

        .text-primary {
            color: #6c5ce7; /* Light violet text color */
        }

        .alert-danger {
            color: #721c24; /* Dark red color for alert text */
            background-color: #f8d7da; /* Light red background color for alerts */
            border-color: #f5c6cb; /* Red border color for alerts */
            padding: 15px; /* Add padding for spacing inside the alert */
            margin-bottom: 20px; /* Add space below the alert */
            border-radius: 5px; /* Rounded corners */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-title">
                <h3>Register</h3>
            </div>
            <div class="card-body">
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Email sudah digunakan</strong>
                    </div>
                @endif
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required
                            placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required
                            placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required
                            placeholder="Enter your password">
                    </div>
                    <div class="d-grid mb-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('login') }}" class="text-primary">Already have an account? Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
