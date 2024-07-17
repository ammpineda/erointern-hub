<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Manage Interns</title>

    <!-- Custom CSS Link -->
    <link href="{{ asset('css/management/manage-interns.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />

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
            align-self: center
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
  margin-right: 10px; /* Adjust the margin as needed */
        }

        .button-container {
  display: flex;
  justify-content: center;
}

.deactivated-button,
.register-button {
  display: flex;
  align-items: center;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
  text-transform: uppercase;
}

.deactivated-button {
  text-decoration: none;
  background-color: rgba(82, 0, 1, 0.304);
  margin-right: 5px;
  padding-right: 10px;
  padding-left: 10px;
  height: 45px;
}

.register-button {
  background-color: #2828DCFF;
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
            background-color: #08106b;
            /* Updated background color */
            color: #fff;
            /* Text color */
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 70%;
            /* Adjusted width */
            max-width: 400px;
            /* Adjusted max-width */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .close-button {
            color: #555;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close-button:hover,
        .close-button:focus {
            color: #fff;
            text-decoration: none;
        }

        .close-button:active {
            transform: scale(0.9);
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
            transition: background-color 0.3s ease;
        }

        .register-submit-button:hover,
        .register-submit-button:focus {
            background-color: #0056b3;
            outline: none;
        }

        .form-group {
            margin-bottom: 15px;
            /* Reduced margin */
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 13px;
            /* Adjusted font size */
        }

        .form-input {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Password toggle icon */
        .toggle-password {
            position: absolute;
            margin-top: -10px;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #000;
            /* Black color */
        }

        /* Actions buttons */
        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .manage-details-button {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-transform: uppercase;
            font-size: 12px;
            transition: background-color 0.3s ease;
        }

        .manage-details-button:hover,
        .manage-details-button:focus {
            background-color: #0056b3;
            outline: none;
        }

        .deactivate-button {
            padding: 8px 16px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-transform: uppercase;
            font-size: 12px;
            transition: background-color 0.3s ease;
        }

        .deactivate-button:hover,
        .deactivate-button:focus {
            background-color: #c82333;
            outline: none;
        }
    </style>

</head>

<body>
    @include('navbar')
    @include('error')
    <div class="content-container">
        <div class="search-container">
            <input type="text" id="search-input" class="form-control" placeholder="Search..." />


            <div class="button-container">
                <a class="deactivated-button" href="deactivated">
                  <span class="material-symbols-outlined" style="vertical-align: middle;">person_off</span>
                  Show Deactivated Interns
                </a>
                <button class="register-button" onclick="openPopup()">
                  <span class="material-symbols-outlined" style="vertical-align: middle;">person_add</span>
                  Register Intern
                </button>
              </div>
        </div>
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($interns as $intern)
                @if ($intern->is_active)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $intern->last_name }}, {{ $intern->first_name }} {{ $intern->middle_name }}</td>
                    <td>{{ $intern->username }}</td>
                    <td>{{ $intern->email }}</td>
                    <td>{{$intern->ojtDetails->rendered_hours}}</td>
                    <td>{{$intern->ojtDetails->required_hours}}</td>
                    <td>{{ $intern->created_at }}</td>
                    <td>{{ $intern->last_login_at }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('client-profile', ['id' => $intern->id]) }}" class="manage-details-button">Manage Details</a>
                            <form action="{{ route('deactivate-intern', ['id' => $intern->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="deactivate-button">Deactivate</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="popup-form" class="popup-form">
        <div class="popup-content">
            <span class="close-button" onclick="closePopup()">&times;</span>
            <h2 style="text-align: center; margin-bottom: 20px;">Deactivated interns</h2>
            <form action="{{ route('registerIntern') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input type="text" id="first_name" name="first_name" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="middle_name" class="form-label">Middle Name:</label>
                    <input type="text" id="middle_name" name="middle_name" class="form-input">
                </div>

                <div class="form-group">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password:</label>
                    <div style="position: relative;">
                        <input type="password" id="password" name="password" class="form-input" required>
                        <span id="togglePassword" class="toggle-password fa fa-eye" onclick="togglePasswordVisibility('password')"></span>
                    </div>
                </div>

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
