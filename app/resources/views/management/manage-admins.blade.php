<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Manage admins</title>
    <a href=""></a>

        <!-- Custom CSS Link -->
<link href="{{ asset('css/management/manage-admins.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<p>{{ $errors->first() }}</p>
<div><form method="POST" action="{{ route('registerAdmin') }}">
    @csrf

    <div>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
    </div>

    <div>
        <label for="middle_name">Middle Name:</label>
        <input type="text" id="middle_name" name="middle_name">
    </div>

    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <i class="fas fa-eye toggle-icon" id="togglePassword"></i>
    </div>

    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <i class="fas fa-eye toggle-icon" id="toggleConfirmPassword"></i>
    </div>

    <button type="submit">Register Admin</button>
</form></div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Admin Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Date Registered</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admins as $admin)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $admin->last_name }}, {{ $admin->first_name }}, {{ $admin->middle_name }}</td>
            <td>{{ $admin->email }}</td>
            <td>
                <span class="password-visibility-toggle">
                    <span class="password-text" style="display: none;">{{ $admin->password }}</span>
                    <button class="btn btn-sm btn-secondary toggle-password-btn">Show</button>
                </span>
            </td>
            <td>{{ $admin->created_at }}</td>
            <td>View/Edit/Delete</td>
        </tr>
    @endforeach
    @push('scripts')
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
@endpush
    </tbody>
</table>
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

        const togglePasswordBtns = document.querySelectorAll('.toggle-password-btn');
        togglePasswordBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const passwordText = this.parentNode.querySelector('.password-text');
                const buttonText = this.textContent.trim();

                if (buttonText === 'Show') {
                    passwordText.textContent = passwordText.textContent.trim();
                    passwordText.style.display = 'inline';
                    this.textContent = 'Hide';
                } else {
                    passwordText.style.display = 'none';
                    this.textContent = 'Show';
                }
            });
        });
    </script>
</head>
</html>
