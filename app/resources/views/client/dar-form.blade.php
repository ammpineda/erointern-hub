<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Accomplishment Report</title>

    <!-- Custom CSS Link -->
    <link href="{{ asset('css/client/navbar.css') }}" rel="stylesheet">

</head>
<body>
    <h1 id="report-title">Daily Accomplishment Report</h1>

    <form>
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
        </div>

        <div>
            <label for="clock-in">Clock-In</label>
            <input type="time" id="clock-in" name="clock-in">
        </div>

        <div>
            <label for="clock-out">Clock-Out</label>
            <input type="time" id="clock-out" name="clock-out">
        </div>

        <p>Please submit Clock-Out images and attachments for the Daily Activity Report via the upload feature provided below.</p>

        <div>
            <label for="attachments">Attachments</label>
            <input type="file" id="attachments" name="attachments" multiple>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Add a more detailed description..."></textarea>
        </div>

        <div>
            <button type="button">Cancel</button>
            <button type="submit">Submit</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('report-title').textContent += ' (' + today + ')';
        });
    </script>
</body>
</html>
