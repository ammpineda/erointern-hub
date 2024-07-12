<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Accomplishment Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/client/dar-intern.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e71518412.js" crossorigin="anonymous"></script>
</head>
<body>
@include('navbar')

    <div class="content-container">
        <h1>Daily Accomplishment Reports</h1>
        <table class="dar-table">
            <thead>
                <tr>
                    <th>Date Submitted</th>
                    <th>DAR Title</th>
                    <th>Clock In Time</th>
                    <th>Clock Out Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row -->
                <tr>
                    <td>June 25, 2024</td>
                    <td>Project A Work</td>
                    <td>08:00 AM</td>
                    <td>05:00 PM</td>
                    <td><button class="action-button view-button">View</button></td>
                </tr>
                <!-- More rows as needed -->
            </tbody>
        </table>
    </div>
</body>
</html>
