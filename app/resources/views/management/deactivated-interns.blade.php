<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Deactivated Interns</title>

    <!-- Custom CSS Link -->
    <link href="{{ asset('css/management/manage-interns.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />

    <style>
        .content-container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            align-self: center
        }

        .intern-table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
        }

        .intern-table th,
        .intern-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 14px;
            color: #333;
        }

        .intern-table th {
            background-color: #f2f2f2;
            color: #000;
            font-weight: bold;
            text-transform: uppercase;
        }

        .intern-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>

<body>
    @include('navbar')
    @include('error')
    <div class="content-container">
        <h1 style="text-align:center;Color:black; ">DEACTIVATED INTERNS</h1>
        <a href="/admin/manage-interns" style="text-decoration: none; color: black; display: flex; justify-content: flex-end;">
            <span class="material-symbols-outlined">arrow_back</span>
          </a>
            <table class="intern-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Intern Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Rendered Hours</th>
                        <th>Required Hours</th>
                        <th>Date Registered</th>
                        <th>Last Login Date</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($interns as $intern)
                        @if (!$intern->is_active)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $intern->last_name }}, {{ $intern->first_name }} {{ $intern->middle_name }}</td>
                                <td>{{ $intern->username }}</td>
                                <td>{{ $intern->email }}</td>
                                <td>{{ $intern->ojtDetails->rendered_hours }}</td>
                                <td>{{ $intern->ojtDetails->required_hours }}</td>
                                <td>{{ $intern->created_at }}</td>
                                <td>{{ $intern->last_login_at }}</td>

                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
    </div>
