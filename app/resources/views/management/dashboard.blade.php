<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | My Admin Dashboard</title>

    <!-- Custom CSS Link -->
    <link href="{{ asset('css/management/dashboard.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
    
    <style>
        /* Additional styles for the announcements section */
        #announcements {
            padding: 20px;
            background-color: #f8f9fa; /* Light gray background */
            border: 1px solid #dee2e6; /* Gray border */
            border-radius: 8px; /* Rounded corners */
        }

        .announcement {
            margin-bottom: 15px;
            padding: 15px;
            background-color: #ffffff; /* White background */
            border: 1px solid #ced4da; /* Light gray border */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Soft shadow */
        }

        .announcement h3 {
            margin-top: 0;
            color:black;
        }

        .announcement p {
            margin-bottom: 0;
            font-size: 1rem;
            color: #495057; /* Dark gray text */
        }

        .announcement a {
            color: #007bff; /* Blue link color */
            text-decoration: none;
            font-weight: bold;
        }

        .announcement a:hover {
            text-decoration: underline;
        }

        /* Section for displaying list of daily accomplishment reports */
        #daily-reports {
            padding: 20px;
            background-color: #f8f9fa; /* Light gray background */
            border: 1px solid #dee2e6; /* Gray border */
            border-radius: 8px; /* Rounded corners */
        }

        #daily-reports table {
            width: 100%;
            border-collapse: collapse; /* Remove default spacing between table cells */
            margin-top: 20px; /* Add space above the table */
        }

        #daily-reports th, #daily-reports td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #dee2e6; /* Light gray border bottom */
        }

        #daily-reports th {
            background-color: #f8f9fa; /* Light gray background for header */
            font-weight: bold;
        }

        #daily-reports td:last-child {
            text-align: center; /* Center align the last column */
        }

        #daily-reports a {
            color: #007bff; /* Blue link color */
            text-decoration: none;
            font-weight: bold;
        }

        /* View all button style */
        .view-all-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff; /* Blue background */
            color: #ffffff; /* White text */
            text-decoration: none;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px; /* Adjust spacing */
            margin-right: 10px; /* Adjust spacing */
        }

        .view-all-btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        /* Button styles for manage links */
        .manage-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745; /* Green background */
            color: #ffffff; /* White text */
            text-decoration: none;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px; /* Adjust spacing */
        }

        .manage-btn:hover {
            background-color: #218838; /* Darker green on hover */
        }
    </style>
</head>
<body>
    @include('navbar')
    <br>

    
    <br>
    <br>
    <!-- Section for displaying announcements -->
    <section id="announcements">
        <h2>Announcements</h2>
        <div class="announcement">
            <h3>2024-06-03</h3>
            <p>Announcement content goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="announcement">
            <h3>2024-06-02</h3>
            <p>Another announcement content goes here. Nulla vehicula nisl non enim lacinia, ac interdum leo congue.</p>
        </div>
        <!-- Add more announcements as needed -->

        <!-- View All Announcements Button -->
        <a href="/admin/manage-announcements" class="manage-btn">Manage Announcements</a>
    </section>
    <br>
    <br>
    <!-- Section for displaying list of daily accomplishment reports -->
    <section id="daily-reports">
        <h2>Recent Submitted Daily Accomplishments</h2>
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Clock-In</th>
                    <th>Clock-Out</th>
                    <th>Rendered Hours</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>2024-06-03</td>
                    <td>Sample Title</td>
                    <td>9:00 AM</td>
                    <td>1:00 PM</td>
                    <td>4</td>
                    <td><a href="#">VIEW</a></td>
                </tr>
            </tbody>
        </table>

        <!-- View All Daily Reports Button -->
        <a href="/admin/manage-dars" class="view-all-btn">Manage Daily Reports</a> <a href="/admin/manage-interns" class="manage-btn">Manage Interns</a>
    </section>

</body>
</html>
