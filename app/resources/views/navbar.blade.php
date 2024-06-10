<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/dashboard.css') }}" rel="stylesheet">

    <style>

.navbar {
    font-family: "Lato", sans-serif;
    font-size: 25px;
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
            
        }

        .navbar-text {
            font-size: 25px; 
            color: white; 
            text-align: center; 
            flex: 1; 
            font-family: 'Lato', sans-serif; 
        }
        .navbar-icons a {
            margin-left: 100px; 
            font-size: 24px; 
        }
        .icon {
            width: 25px; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="{{ asset('images/nav_logo.png') }}" alt="logo" class="logo">
        <span class="navbar-text">ERovoutika Electronics Robotics Automation - InternHub</span>
        <a href=""><img src="{{ asset('images/icons8-settings-50.png') }}" class="icon"></a> 
        <a href=""><img src="{{ asset('images/icons8-bell-48.png')}}" class="icon"></a>
        <a href=""><img src="{{ asset('images/icons8-user-50.png')}}" class="icon"></a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>