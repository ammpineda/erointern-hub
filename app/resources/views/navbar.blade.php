<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/dashboard.css') }}" rel="stylesheet">

    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <style>
        .navbar {
            font-family: "Lato", sans-serif;
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            height: 80px;
            width: 100%;
            /* Full width */
            font-weight: normal;
            text-shadow: 1px 1px #000000;
            background-image: url('images/navbg.png');
            background-size: 100% auto;
            /* Stretch the image horizontally */
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            padding: 0 20px;
            /* Add padding to align content */
            margin-top: -10px;
            /* Remove any top margin */
            margin-left: -32px;
            /* Remove left margin */
        }

        .logo {
            width: 150px;
            margin-left: 10px;
        }

        .navbar-text {
            font-size: 25px;
            color: white;
            text-align: center;
            flex: 1;
            font-family: 'Lato', sans-serif;
            font-weight: bold;
            cursor: pointer; /* Add cursor pointer for better UX */
            text-decoration: none;
        }

        .navbar-icons {
            margin-left: auto;
            /* Pushes the logout button to the right */
        }

        .icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: white; /* Set text color */
            font-size: 20px; /* Adjust font size */
            margin-left: 15px;
        }

        body {
            padding-left: 100px;
            padding-right: 100px;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="{{ asset('images/loginimg.png') }}" alt="logo" class="logo">
        @if (Session::has('is_admin') && Session::get('is_admin') === true)
            <a href="{{ route('admin-dashboard') }}" class="navbar-text">ERovoutika Electronics Robotics Automation - EroIntern Hub</a>
        @elseif (Session::has('is_intern') && Session::get('is_intern') === true)
            <a href="{{ route('intern-dashboard') }}" class="navbar-text">ERovoutika Electronics Robotics Automation - EroIntern Hub</a>
        @else
            <span class="navbar-text">ERovoutika Electronics Robotics Automation - InternHub</span>
        @endif

        <div class="navbar-icons">
            @if (Session::has('id'))
                @if (Session::get('is_admin') === true && Session::get('is_intern') === false)
                    <!-- If user is admin, hide settings and profile icons -->
                    <button id="logoutBtn" class="icon-btn" title="Logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                @else
                    <!-- Regular user with profile and settings icons -->
                    <a href="{{ route('client-profile', ['id' => Session::get('id')]) }}"><img src="{{ asset('images/icons8-settings-50.png') }}" class="icon" alt="Settings"></a>
                    <a class="nav-link" href="{{ route('client-profile', Session::get('id')) }}">
                        <img src="{{ asset('images/icons8-user-50.png') }}" class="icon" alt="Profile">
                    </a>
                    <button id="logoutBtn" class="icon-btn" title="Logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                @endif
            @endif
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var logoutBtn = document.getElementById('logoutBtn');

            if (logoutBtn) {
                logoutBtn.addEventListener('click', function () {
                    sessionStorage.clear(); // Clear all session storage
                    localStorage.clear(); // Clear all local storage
                    window.location.href = "{{ route('login.form') }}"; // Replace with your login form route
                });
            }
        });
    </script>
</body>

</html>
