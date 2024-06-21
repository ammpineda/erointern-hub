<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAR Submission</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/client/dar-form.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e71518412.js" crossorigin="anonymous"></script>
    <script>
        function updateClock() {
            const now = new Date();
            let hours = now.getHours();
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const year = now.getFullYear();
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            const timeString = `${hours}:${minutes} ${ampm}`;
            const dateString = `${month}-${day}-${year}`;
            document.getElementById('clock').textContent = timeString;
            return { timeString, dateString };
        }

        function handleButtonClick(buttonType) {
            const { timeString, dateString } = updateClock();
            if (buttonType === 'clockin') {
                document.getElementById('status').textContent = `Clocked in at ${timeString} on ${dateString}`;
            } else if (buttonType === 'clockout') {
                const statusText = document.getElementById('status').textContent;
                document.getElementById('status').textContent = `${statusText} | Clocked out at ${timeString} on ${dateString}`;
            }
            document.querySelector(`.data-cell.${buttonType}`).textContent = timeString;
        }

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

<form action="{{ route('create-dar') }}" method="post" enctype="multipart/form-data">
    @csrf <!-- CSRF Token for Laravel -->
        setInterval(updateClock, 1000);
    </script>
</head>

<body onload="updateClock()">
@include('navbar')
    <div class="clock-container">
        <div id="clock" class="clock"></div>
    </div>
    <div class="main-container">
        <div class="project-title">
            <input type="text" placeholder="Project Title">
        </div>
        <div class="data-placeholder">
            <div class="data-cell clockin"></div>
            <div class="data-cell clockout"></div>
        </div>
        <div class="button-container">
            <button class="action-button clockin" onclick="handleButtonClick('clockin')">Clock In</button>
            <button class="action-button clockout" onclick="handleButtonClick('clockout')">Clock Out</button>
        </div>
        <div id="status" class="status"></div>
    </div>
    <hr class="section-divider">
    
    <div class="form-container">
        <form>
            <div class="form-group">
                <label for="clockin-image-upload">Clock In Image:</label>
                <label for="clockin-image-upload" class="custom-file-upload">Upload file</label>
                <input type="file" id="clockin-image-upload" accept="image/*">
            </div>
            <div class="form-group">
                <label for="clockout-image-upload">Clock Out Image:</label>
                <label for="clockout-image-upload" class="custom-file-upload">Upload file</label>
                <input type="file" id="clockout-image-upload" accept="image/*">
            </div>
            <div class="form-group">
                <label for="pdf-upload">Daily Accomplishment Report:</label>
                <label for="pdf-upload" class="custom-file-upload">Upload file</label>
                <input type="file" id="pdf-upload" accept="application/pdf">
            </div>
            <label for="description">Description:</label>
            <textarea id="description" rows="4" cols="50" placeholder="Enter description here..."></textarea><br><br>
            <div class="form-buttons">
                <button type="button" class="cancel-button">Cancel</button>
                <button type="submit" class="submit-button">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
