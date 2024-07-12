<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Manage Daily Reports</title>
    <a href=""></a>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <p>{{ $errors->first() }}</p>

    <style>
        /* manage-interns.css */

        /* Style for the table */
        .table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        /* Header style */
        .table thead th {
            background-color: #333;
            color: #fff;
            padding: 12px;
            text-align: left;
        }

        /* Row style */
        .table tbody td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        /* Alternating row background */
        .table tbody tr:nth-child(even) {
            background-color: #e9e9e9;
        }

        /* Link style for Action column */
        .table tbody td a {
            color: #007bff;
            text-decoration: none;
        }

        /* Hover effect */
        .table tbody tr:hover {
            background-color: #ddd;
        }

        /* Responsive table */
        @media screen and (max-width: 600px) {
            .table {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    @include('navbar')
    <div class="container mt-5">
        <h1 class="mb-4">Daily Accomplishments</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Clock In At</th>
                    <th>Clock Out At</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($accomplishments as $accomplishment)
                <tr>
                    <td>{{ $accomplishment->id }}</td>
                    <td>{{ $accomplishment->user->first_name }} {{ $accomplishment->user->last_name }}</td>
                    <td>{{ $accomplishment->title }}</td>
                    <td>{{ $accomplishment->description }}</td>
                    <td>{{ $accomplishment->clock_in_at }}</td>
                    <td>{{ $accomplishment->clock_out_at }}</td>
                    <td>View</td>

                    @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>