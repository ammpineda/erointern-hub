<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Manage Interns</title>

    <!-- Custom CSS Link -->
    <link href="{{ asset('css/management/manage-interns.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .content-container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .search-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form-control {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            width: 200px;
        }

        .register-button {
            padding: 10px 20px;
            background-color: #2828DCFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-transform: uppercase;
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

        .popup-form {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .popup-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-button:hover,
        .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .register-submit-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    @include('navbar')
    @include('error')
    <div class="content-container">
        <div class="search-container">

            <input type="text" id="search-input" class="form-control" placeholder="Search..." />
            <button class="register-button" onclick="openPopup()">Register Intern</button>
        </div>
        <table class="intern-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Intern Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Date Registered</th>
                    <th>Last Login Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($interns as $intern)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $intern->last_name }}, {{ $intern->first_name }} {{ $intern->middle_name }}</td>
                        <td>{{ $intern->username }}</td>
                        <td>{{ $intern->email }}</td>
                        <td>{{ $intern->created_at }}</td>
                        <td>{{ $intern->last_login_at }}</td>
                        <td>View/Edit/Archive</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="popup-form" class="popup-form">
        <div class="popup-content">
            <span class="close-button" onclick="closePopup()">&times;</span>
            <h2>Register Intern</h2>
            <form action="{{ route('registerIntern') }}" method="post">
                @csrf
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required><br>

                <label for="middle_name">Middle Name:</label>
                <input type="text" id="middle_name" name="middle_name"><br>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="password">Password:</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" required>
                    <span id="togglePassword" class="toggle-password fa fa-eye"
                        onclick="togglePasswordVisibility('password')"></span>
                </div><br>

                <label for="password_confirmation">Confirm Password:</label>
                <div style="position: relative;">
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                    <span id="toggleConfirmPassword" class="toggle-password fa fa-eye"
                        onclick="togglePasswordVisibility('password_confirmation')"></span>
                </div><br>

                <button type="submit" class="register-submit-button">Register</button>
            </form>
        </div>
    </div>

    <script>
        // Function to toggle password visibility
        function togglePasswordVisibility(id) {
            const input = document.getElementById(id);
            const icon = document.querySelector(`#${id} + .toggle-password`);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Function to open the registration popup
        function openPopup() {
            document.getElementById('popup-form').style.display = 'block';
        }

        // Function to close the registration popup
        function closePopup() {
            document.getElementById('popup-form').style.display = 'none';
        }

        // Search functionality
        const searchType = 'name';
        document.getElementById('search-input').addEventListener('input', function() {
            const searchTerm = this.value.trim().toLowerCase();
            const searchType = 'name';
            const tableRows = document.querySelectorAll('.intern-table tbody tr');

            tableRows.forEach(row => {
                const rowText = row.querySelector(`td:nth-child(${searchType === 'name' ? 2 : 3})`)
                    .textContent.trim().toLowerCase();
                row.style.display = rowText.includes(searchTerm) ? '' : 'none';
            });
        });
    </script>
</body>

</html>
