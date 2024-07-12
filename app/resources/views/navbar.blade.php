<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
   

    <style>

.navbar {
    font-family: "Lato", sans-serif;
    font-size: 25px;
    font-weight: bold;
    text-align: center;
    height: 80px;
    width: 100%; /* Full width */
    font-weight: normal;
    text-shadow: 1px 1px #000000;
    background-image: url('images/navbg.png');
    background-size: 100% auto; /* Stretch the image horizontally */
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    padding: 0 20px; /* Add padding to align content */
    margin-top: -10px; /* Remove any top margin */
    margin-left: -32px; /* Remove left margin */

}

        .logo {
            width: 150px;

            width: 150px;
            margin-left: 10px;
        }

        .navbar-text {
            font-size: 25px;
            color: white;
            text-align: center;
            flex: 1;
            font-family: 'Lato', sans-serif;
            font-size: 25px;
            color: white;
            text-align: center;
            flex: 1;
            font-family: 'Lato', sans-serif;
            font-weight: bold;
        }
        .navbar-icons a {
            margin-left: 100px;
            font-size: 24px;
        }
        .icon {
            width: 25px;
            margin-left: 15px;
        }


        .button {
            font-family: 'DM Sans', sans-serif;
            font-size: 16px;
            font-weight: 700;
            color: #FFFFFF;
            background: #3E3EE0FF;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            text-decoration: none;
            transition: background 0.3s ease;
            /* Adjustable properties */
            width: auto; /* Adjust width */
            height: 20px; /* Adjust height */
            margin: 0 10px; /* Adjust margin */
        }

        .button:hover {
            background: #2828DCFF;
        }

        .button:active {
            background: #1D1DB2FF;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="{{ asset('images/loginimg.png') }}" alt="logo" class="logo">
        <span class="navbar-text">ERovoutika Electronics Robotics Automation - InternHub</span>
        <a href="dar" class="button">Clock In</a>
        @if (Session::has('id'))
        <a class="nav-link" href="{{ route('client-profile', Session::get('id')) }}">
            <img src="{{ asset('images/icons8-user-50.png') }}" class="icon" alt="Profile">
        </a>
    @endif
</nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
