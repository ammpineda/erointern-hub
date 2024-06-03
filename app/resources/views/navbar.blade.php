<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

     <!-- Custom CSS Link -->
     <link href="{{ asset('css/client/dashboard.css') }}" rel="stylesheet">
</head>
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: gray">
        <img src="{{asset('images/nav_logo.png')}}" alt="logo" class="logo">
        <span style="font-size: 30px;">ERovoutika Electronics Robotics Automation - InternHub</span>
        <a href="">(gear icon)</a>
        <a href="">(bell icon)</a>
        <a href="">(display pic)</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</div>
</html>
