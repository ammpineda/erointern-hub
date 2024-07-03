<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Announcements</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/announcements.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e71518412.js" crossorigin="anonymous"></script>
    <script>
        function openPopup() {
            document.getElementById('popup-form').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup-form').style.display = 'none';
        }
    </script>
</head>

<body>
    <nav class="navbar">
        <img src="logo.png" alt="Logo" class="logo">
        <div class="header-title">ERovoutika Electronics Robotics Automation - InternHub</div>
        <div class="icons">
            <i class="fa-solid fa-gear"></i>
            <i class="fa-regular fa-bell"></i>
            <i class="fa-solid fa-user"></i>
        </div>
    </nav>

    <div class="content-container">
        <button class="manage-button" onclick="openPopup()">Manage Announcements</button>
        <table class="announcement-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Posted By</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($announcements as $announcement)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $announcement->description }}</td>
                    <td>{{ $announcement->user->username }}</td>
                    <td>{{ $announcement->created_at }}</td>

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
        </body>

