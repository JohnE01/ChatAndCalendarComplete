<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Template</title>
    <style>
        /* Styles for dropdown content */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        /* Styles for dropdown button */
        .dropdown-btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* Change color of dropdown button on hover */
        .dropdown-btn:hover, .dropdown-btn:focus {
            background-color: #3e8e41;
        }

        /* Styles for reaction buttons */
        .reaction-btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 24px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<h2>Portfolio Template</h2>

<!-- Dropdown for Personal Information -->
<div class="dropdown">
    <button class="dropdown-btn">Personal Information</button>
    <div class="dropdown-content">
        <p>Name: John Doe</p>
        <p>Email: john@example.com</p>
        <p>Location: New York, USA</p>
    </div>
</div>

<!-- Dropdown for Education -->
<div class="dropdown">
    <button class="dropdown-btn">Education</button>
    <div class="dropdown-content">
        <p>Degree: Bachelor of Science in Computer Science</p>
        <p>University: Example University</p>
        <p>Graduation Year: 2020</p>
    </div>
</div>

<!-- Dropdown for Work Experience -->
<div class="dropdown">
    <button class="dropdown-btn">Work Experience</button>
    <div class="dropdown-content">
        <p>Position: Software Engineer</p>
        <p>Company: ABC Tech</p>
        <p>Duration: 2018 - Present</p>
    </div>
</div>

<!-- Reaction buttons form -->
<form method="post" action="{{ route('portfolio.react') }}">
    @csrf
    <button type="submit" class="reaction-btn" name="type" value="good">&#x1F44D;</button>
    <button type="submit" class="reaction-btn" name="type" value="bad">&#x1F44E;</button>
</form>

<!-- Reaction counters -->
<div>
    <p>Good Reactions: {{ $goodCount }}</p>
    <p>Bad Reactions: {{ $badCount }}</p>
</div>

<script>
    // Function to increment reaction count
    function incrementReaction(elementId) {
        let countElement = document.getElementById(elementId);
        let count = parseInt(countElement.innerText);
        countElement.innerText = count + 1;
    }
</script>

</body>
</html>
