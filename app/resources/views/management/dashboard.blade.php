<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | My Admin Dashboard</title>

    <!-- Custom CSS Link -->
    <link href="{{ asset('css/management/dashboard.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    @include('navbar')
<br>
    <section style="background-color: red">
Welcome to the admin page <a href="/admin/manage-interns">manage interns here</a>
<a href="/admin/manage-admins">manage admins here</a>

<a href="/admin/manage-announcements">manage announcements here</a>

    </section>
    <br>
    <br>
    <!-- Section for displaying Erovoutika schedule -->
    <section id="schedule">
        <h2>Erovoutika Schedule</h2>
        <p>Office hours: 9:00 AM - 6:00 PM</p>
        <p>Break time: 12:00 PM - 1:00 PM</p>
    </section>
<br>
<br>
    <!-- Section for displaying list of announcements in a table -->
    <section id="announcements">
        <h2>Announcements</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Announcement</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($latestAnnouncements as $announcement)
                <tr>
                    <td>{{ $announcement->created_at->format('Y-m-d') }}</td>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $announcement->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/announcements" class="button">all announcements</a>
    </section>
    <br>
    <br>
    <!-- Section for displaying all the daily accomplishment report forms in a table -->
    <section id="daily-reports">
        <h2>Daily Accomplishment Reports of interns</h2>
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Clock-In</th>
                    <th>Clock-Out</th>
                    <th>Rendered Hours</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dailyAccomplishments as $dailyAccomplishment)
                <tr>
                    <td>{{ $dailyAccomplishment->user->first_name }} {{ $dailyAccomplishment->user->middle_name }} {{ $dailyAccomplishment->user->last_name }}</td>
                    <td>{{ $dailyAccomplishment->created_at->format('Y-m-d') }}</td>
                    <td>{{ $dailyAccomplishment->title }}</td>
                    <td>{{ $dailyAccomplishment->clock_in_at }}</td>
                    <td>{{ $dailyAccomplishment->clock_out_at }}</td>
                    <td>{{ $dailyAccomplishment->rendered_hours }}</td>
                    <td>{{ $dailyAccomplishment->description }}</td>
                    <td><a href="#">view</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

</body>
</html>
