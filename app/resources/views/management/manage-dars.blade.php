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

        /* Style for the table */table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Add box shadow */
            background-color: #fff; /* White background */
            border-radius: 5px; /* Rounded corners */
            overflow: hidden; /* Prevents shadows from overflowing */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 14px;
            color: #333;
        }

        th {
            background-color: #f2f2f2;
            color: #000;
            font-weight: bold;
            text-transform: uppercase; /* Uppercase headings */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .viewbutton {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border-radius: 4px;
            border: none;
            padding: 7px 5px;
            width: 100%
        }
    </style>
</head>

<body>
    @include('navbar')
    <div class="container mt-5">
        <h1 class="mb-4">Recent Daily Accomplishment Reports</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th style="width: 250px;">User</th>
                    <th style="width: 300px;">Title</th>
                    <th>Date Submitted</th>
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
                    <td> {{ $accomplishment->created_at }} </td>
                    <td>{{ $accomplishment->clock_in_at }}</td>
                    <td>{{ $accomplishment->clock_out_at }}</td>
                    <td> <form  method="POST">
                        @csrf
                        @method('VIEW')
                        <button type="submit" class="viewbutton">VIEW DETAILS</button>
                    </form>
                </td>

                    @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
