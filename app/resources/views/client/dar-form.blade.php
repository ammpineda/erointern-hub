<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Accomplishment Report</title>

    <!-- Custom CSS Link (Ensure this path is correct) -->
    <link href="{{ asset('css/client/navbar.css') }}" rel="stylesheet">
</head>
<body>

@include('navbar') <!-- Include navbar if it's a Blade template -->

@if ($errors->any())
    <div class="error-container">
        <h4>dere issu a frikn problem</h4>
        <p>{{ $errors->first() }}</p>
    </div>
@endif

@if (session('error'))
    <div class="error-container">
        <h4>dere issu a frikn problem</h4>
        <p>{{ session('error') }}</p>
    </div>
@endif

<h1 id="report-title">Daily Accomplishment Report</h1>

<form action="{{ route('submit.daily.report') }}" method="post" enctype="multipart/form-data">
    @csrf <!-- CSRF Token for Laravel -->

    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required>
    </div>
        <div>
            <label for="clock-in">Clock-In</label>
            <input type="time" id="clock-in" name="clock_in_at" required>
        </div>


        <div>
            <label for="clock-out">Clock-Out</label>
            <input type="time" id="clock-out" name="clock_out_at" required>
        </div>

    <p>Please submit Clock-Out images and attachments for the Daily Activity Report via the upload feature provided below.</p>
    <div>
        <label for="attachments">Clock-In Image</label>
        <input type="file" id="attachment_file" name="clock_in_image" multiple>
    </div>    <div>
        <label for="attachments">Clock-Out Image</label>
        <input type="file" id="attachment_file" name="clock_out_image" multiple>
    </div>
    <div>
        <label for="attachments">Attachments</label>
        <input type="file" id="attachment_file" name="attachment_file" multiple>
    </div>

    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Add a more detailed description..."></textarea>
    </div>

    <div>
        <button type="button" onclick="cancelForm()">Cancel</button>
        <button type="submit">Submit</button>
    </div>
</form>

<script>
    function cancelForm() {
        window.location.href = '/dashboard';
    }
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('report-title').textContent += ' (' + today + ')';
    });
</script>

</body>
</html>
