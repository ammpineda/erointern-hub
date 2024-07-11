<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAR Submission</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/client/dar-form.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e71518412.js" crossorigin="anonymous"></script>
</head>
<body>
@include('navbar')
@if ($errors->any())
    <div class="error-container">
        <h4>There is an issue</h4>
        <p>{{ $errors->first() }}</p>
    </div>
@endif

@if (session('error'))
    <div class="error-container">
        <h4>There is an issue</h4>
        <p>{{ session('error') }}</p>
    </div>
@endif

<h1 id="report-title">Daily Accomplishment Report</h1>

<form action="{{ route('create-dar') }}" method="post" enctype="multipart/form-data">
    @csrf <!-- CSRF Token for Laravel -->


    <div class="clock-container">
        <div id="clock" class="clock"></div>
    </div>
    <div class="main-container">
        <div class="project-title">
            <input type="text" id="title" name="title" required>
        </div>
        <div class="data-placeholder">
            <div class="data-cell clockin">
                <input type="time" id="clock-in" name="clock_in_at" required>

                </div>
            <div class="data-cell clockout">
                <input type="time" id="clock-out" name="clock_out_at" required>
            </div>
        </div>

        <div id="status" class="status"></div>
    </div>
    <hr class="section-divider">

    <p class="form-instructions">
        Please submit the link to Clock-In & Clock-Out images and attachment for the Daily Activity Report.
    </p>
    <br>
            <div class="form-group">
                <label for="clockin-image-upload">Clock In Image:</label>
                <input type="text" id="clockin-image-upload" name="clock_in_image">
            </div>
            <div class="form-group">
                <label for="clockout-image-upload">Clock Out Image:</label>
                <input type="text" id="clockout-image-upload" name="clock_out_image">
            </div>
            <div class="form-group">
                <label for="attachment_file">Daily Accomplishment Report:</label>
                <input type="text" id="attachment_file" name="attachment_file">
            </div>
            <label for="description">Description:</label>
            <textarea id="description" rows="4" cols="50" placeholder="Enter description here..." name="description"></textarea><br><br>
            <div class="form-buttons">
            <a href="dashboard" class="button">Go Back</a>
                <button type="submit" class="submit-button">Submit</button>
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
    </div>
</body>
</html>
