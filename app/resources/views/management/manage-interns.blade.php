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
@include('error')
<div class="content-container">
    <div class="search-container">
        <select id="search-type" class="form-control">
            <option value="name">Intern Name</option>
            <option value="email">Email</option>
        </select>
        <input type="text" id="search-input" class="form-control" placeholder="Search..." />
    </div>
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
        <tbody id="table-body">
            @foreach ($interns as $intern)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $intern->last_name }}, {{ $intern->first_name }}, {{ $intern->middle_name }}</td>
                <td>{{ $intern->email }}</td>
                <td>
                    <span class="password-visibility-toggle">
                        <span class="password-text" style="display: none;">{{ $intern->password }}</span>
                        <button class="btn btn-sm btn-secondary toggle-password-btn">Show</button>
                    </span>
                </td>
                <td>{{ $intern->created_at }}</td>
                <td>View/Edit/Archive</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // Get the search input and search type select elements
    const searchInput = document.getElementById('search-input');
    const searchType = document.getElementById('search-type');

    // Add an event listener to the search input
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const selectedSearchType = searchType.value;

        // Get all the table rows
        const tableRows = document.querySelectorAll('#table-body tr');

        // Loop through the table rows and show/hide based on the search
        tableRows.forEach(function(row) {
            const cells = row.querySelectorAll('td');
            let isMatch = false;

            if (selectedSearchType === 'name') {
                const nameText = cells[1].textContent.toLowerCase();
                isMatch = nameText.includes(searchTerm);
            } else if (selectedSearchType === 'email') {
                const emailText = cells[2].textContent.toLowerCase();
                isMatch = emailText.includes(searchTerm);
            } else {
                const nameText = cells[1].textContent.toLowerCase();
                const emailText = cells[2].textContent.toLowerCase();
                isMatch = nameText.includes(searchTerm) || emailText.includes(searchTerm);
            }

            row.style.display = isMatch ? 'table-row' : 'none';
        });
    });
</script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye / eye slash icon
            this.classList.toggle('fa-eye-slash');
        });

        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPassword = document.querySelector('#password_confirmation');

        toggleConfirmPassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            // toggle the eye / eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    <div id="popup-form" class="popup-form">
        <div class="popup-content">
            <span class="close-button" onclick="closePopup()">&times;</span>
            <h2>Register Intern</h2>
            <form action="{{ route('registerIntern') }}" method="post">
                @csrf
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required><br>

                <label for="middle-name">Middle Name:</label>
                <input type="text" id="middle_name" name="middle_name"><br>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div>
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit" class="register-submit-button">Register</button>
        </div>
    </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePasswordBtns = document.querySelectorAll('.toggle-password-btn');
            togglePasswordBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    const passwordText = this.parentNode.querySelector('.password-text');
                    if (passwordText.style.display === 'none') {
                        passwordText.style.display = 'inline';
                        this.textContent = 'Hide';
                    } else {
                        passwordText.style.display = 'none';
                        this.textContent = 'Show';
                    }
                });
            });
        });
    </script>
</body>
</html>
