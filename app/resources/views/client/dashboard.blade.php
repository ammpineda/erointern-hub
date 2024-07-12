<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | My Dashboard</title>

    <!-- Custom CSS Link -->
    <!-- Custom CSS Link -->
    <link href="{{ asset('css/management/dashboard.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />

        <style>
            /* Additional styles for the announcements section */
            #announcements {
                padding: 20px;
                background-color: #f8f9fa;
                /* Light gray background */
                border: 1px solid #dee2e6;
                /* Gray border */
                border-radius: 8px;
                /* Rounded corners */
                margin-bottom: 20px;
                /* Add some space below */
            }

            .announcement {
                margin-bottom: 20px;
                padding: 15px;
                background-color: #ffffff;
                /* White background */
                border: 1px solid #ced4da;
                /* Light gray border */
                border-radius: 8px;
                /* Rounded corners */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                /* Soft shadow */
            }

            .announcement h3 {
                margin: 0;
                color: #007bff;
                /* Blue title color */
                font-size: 1.5rem;
                /* Larger title font size */
            }

            .announcement .date {
                font-size: 0.9rem;
                color: #6c757d;
                /* Gray date color */
                margin-bottom: 10px;
                /* Space below the date */
            }

            .announcement p {
                margin-bottom: 0;
                font-size: 1rem;
                color: #495057;
                /* Dark gray text */
            }

            .announcement a {
                color: #007bff;
                /* Blue link color */
                text-decoration: none;
                font-weight: bold;
            }

            .announcement a:hover {
                text-decoration: underline;
            }

            /* Section for displaying list of daily accomplishment reports */
            #daily-reports {
                padding: 20px;
                background-color: #f8f9fa;
                /* Light gray background */
                border: 1px solid #dee2e6;
                /* Gray border */
                border-radius: 8px;
                /* Rounded corners */
            }

            #daily-reports table {
                width: 100%;
                border-collapse: collapse;
                /* Remove default spacing between table cells */
                margin-top: 20px;
                /* Add space above the table */
            }

            #daily-reports th,
            #daily-reports td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #dee2e6;
                /* Light gray border bottom */
                color: black;
                /* Set font color to black */
            }

            #daily-reports th {
                background-color: #f8f9fa;
                /* Light gray background for header */
                font-weight: bold;
            }

            #daily-reports td {
                text-align: center;
                /* Center align the last column */
                background-color: whitesmoke;
            }

            #daily-reports a {
                color: #007bff;
                /* Blue link color */
                text-decoration: none;
                font-weight: bold;
            }

            /* View all button style */
            .view-all-btn,
            .manage-btn {
                display: inline-block;
                padding: 10px 20px;
                background-color: #007bff;
                /* Blue background */
                color: #ffffff;
                /* White text */
                text-decoration: none;
                border: none;
                border-radius: 4px;
                font-size: 14px;
                font-weight: bold;
                cursor: pointer;
                margin-top: 10px;
                /* Adjust spacing */
                margin-right: 10px;
                /* Adjust spacing */
            }

            .view-all-btn:hover,
            .manage-btn:hover {
                background-color: #0056b3;
                /* Darker blue on hover */
            }

            section {
                margin-left: 100px;
                margin-right:100px;
            }
        </style>
</head>

<body>

    @include('navbar')
    <br>
    <!-- Section for displaying rendered hours -->



    <!-- Section for displaying Erovoutika schedule -->


    <!-- Section for displaying list of announcements in a table -->
    <section id="announcements">
        <h2>Announcements</h2>
        @php $count = 0; @endphp
        @foreach ($latestAnnouncements as $announcement)
            @if ($count < 3)
                <div class="announcement">
                    <h3>{{ $announcement->title }}</h3>
                    <div class="date">{{ $announcement->created_at }}</div>
                    <p>{{ $announcement->description }}</p>
                </div>
                @php $count++; @endphp
            @else
            @break
        @endif
    @endforeach

    <!-- More rows as needed -->
    </tbody>
    </table>



        <a href="/announcements" class="button" style="background-color: #2828DCFF;">ALL ANNOUNCEMENTS</a>
</section>
<!-- Section for displaying all the daily accomplishment report forms in a table -->
<br>
<br>

<section id="daily-reports">
    <h2>Your Daily Accomplishment Reports</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Clock-In</th>
                <th>Clock-Out</th>
                <th>Rendered Hours</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dailyAccomplishments as $dailyAccomplishment)
                <tr>
                    <td style="color:black;">{{ $dailyAccomplishment->created_at->format('Y-m-d') }}</td>
                    <td style="color:black;">{{ $dailyAccomplishment->title }}</td>
                    <td style="color:black;">{{ $dailyAccomplishment->clock_in_at }}</td>
                    <td style="color:black;">{{ $dailyAccomplishment->clock_out_at }}</td>
                    <td style="color:black;">{{ $dailyAccomplishment->rendered_hours }}</td>
                    <td style="color:black;">{{ $dailyAccomplishment->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: center; padding: 5px; margin: 10px;">
        <a href="{{ route('ShowUserDars', ['id' => $userId]) }}" style="color:white; text-decoration:none;"
            class="manage-btn">VIEW DAILY REPORTS</a>&nbsp&nbsp
        <a href="dar" style="color:white; text-decoration:none;" class="manage-btn">CLOCK IN</a>
    </div>
    </div>
</section>
</div>
</body>

</html>
