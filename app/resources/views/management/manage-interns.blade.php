<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Manage Interns</title>
    <a href=""></a>

        <!-- Custom CSS Link -->
<link href="{{ asset('css/management/manage-interns.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<p>{{ $errors->first() }}</p>
<div><form method="POST" action="{{ route('registerIntern') }}">
    @csrf

    <script>
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

        function openPopup() {
            document.getElementById('popup-form').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup-form').style.display = 'none';
        }
    </script>
</head>
<body>
@include('navbar')

    <div class="content-container">
        <button class="register-button" onclick="openPopup()">Register Intern</button>
        <table class="intern-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Intern Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Date Registered</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row -->
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>********</td>
                    <td>01-01-2024</td>
                    <td>
                        <button class="action-button view-button">View</button>
                        <button class="action-button edit-button">Edit</button>
                        <button class="action-button delete-button">Delete</button>
                    </td>
                </tr>
                <!-- More rows as needed -->
            </tbody>
        </table>
    </div>

    <div id="popup-form" class="popup-form">
        <div class="popup-content">
            <span class="close-button" onclick="closePopup()">&times;</span>
            <h2>Register Intern</h2>
            <form>
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first-name" required><br>

                <label for="middle-name">Middle Name:</label>
                <input type="text" id="middle-name" name="middle-name"><br>

                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last-name" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('password')"></i><br>

                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('confirm-password')"></i><br>

                <button type="submit" class="register-submit-button">Register</button>
            </form>
        </div>
    </div>
    </form>
</body>
</html>
