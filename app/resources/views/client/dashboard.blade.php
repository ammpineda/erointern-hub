<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | My Dashboard</title>

    <!-- Custom CSS Link -->
    <link href="{{ asset('css/client/dashboard.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    @include('navbar')
    <!-- Section for displaying rendered hours -->
    <a href="dar" class="button">Clock In</a>
    <div class="sections-container">
    <section id="rendered-hours">
        <h2>Rendered Hours</h2>
        <p>100 out of 200 minimum hours.</p>
    </section>

    <!-- Section for displaying Erovoutika schedule -->
    <section id="schedule">
        <h2>Erovoutika Schedule</h2>
        <p>Office hours: 9:00 AM - 6:00 PM</p>
        <p>Break time: 12:00 PM - 1:00 PM</p>
    </section>

    <!-- Section for displaying list of announcements in a table -->
    <section id="announcements">
        <h2>Announcements</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Announcement</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2024-06-03</td>
                    <td>Announcement content goes here.</td>
                </tr>
                <!-- More rows as needed -->
            </tbody>
        </table>
        <a href="intern/announcements" class="button">all announcements</a>
    </section>
    <!-- Section for displaying all the daily accomplishment report forms in a table -->
    <section id="daily-reports">
        <h2>Daily Accomplishment Reports</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Clock-In</th>
                    <th>Clock-Out</th>
                    <th>Rendered Hours</th>
                    <th>Description</th>
                    <th><a href="#">+ Export List</a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2024-06-03</td>
                    <td>Sample Title</td>
                    <td>9:00 AM</td>
                    <td>1:00 PM</td>
                    <td>4</td>
                    <td>Sample description goes here.</td>
                    <td><a href="#">view</a></td>
                </tr>
                <tr>
                    <td>2024-06-03</td>
                    <td>Sample Title</td>
                    <td>9:00 AM</td>
                    <td>1:00 PM</td>
                    <td>4</td>
                    <td>Sample description goes here.</td>
                    <td><a href="#">view</a></td>
                </tr>
                <tr>
                    <td>2024-06-03</td>
                    <td>Sample Title</td>
                    <td>9:00 AM</td>
                    <td>1:00 PM</td>
                    <td>4</td>
                    <td>Sample description goes here.</td>
                    <td><a href="#">view</a></td>
                </tr>
                <tr>
                    <td>2024-06-03</td>
                    <td>Sample Title</td>
                    <td>9:00 AM</td>
                    <td>1:00 PM</td>
                    <td>4</td>
                    <td>Sample description goes here.</td>
                    <td><a href="#">view</a></td>
                </tr>
                <!-- More rows as needed -->
            </tbody>
        </table>
        <a href="{{ route('ShowUserDars', ['id' => $userId]) }}" class="button">all DARs</a>
                </section>
    </div>
</body>
</html>
