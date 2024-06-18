<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Login Page</title>

    <!-- Custom CSS Link -->
    <link href="{{ asset('css/client/login.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dfb92ffd18.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
</head>
<body>

<nav class="navbar">
<img src="{{ asset('images/loginlogo.png') }}" alt="logo" class="logo">
        <div class="icons">
            <i class="fa-solid fa-globe"></i>
            <i class="fa-regular fa-circle-question"></i>
        </div>
    </nav>

@if ($errors->any())
        <div class="error-container">
            <h4>Authentication failed.</h4>
            <p>{{ $errors->first() }}</p>
        </div>
    @endif
    @if (session('error'))
        <div class="error-container">
            <h4>Authentication failed.</h4>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <form action="{{ route('login') }}" method="post">
@csrf
<br>


<img src="{{ asset('images/loginimg.png') }}" alt="middle-image" class="middle-image">
    <div class="container">
    
        <div class="login-box">
            <img src="{{ asset('images/loginimg.png') }}" alt="logo" class="logo">
            <div class="text welcome">Welcome to InternHub!</div>
            <div class="text login">Log in to your account</div>
            <div class="textbox">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="textbox">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
                <i class="fa-solid fa-eye"></i>
            </div>
            <button class="button" input type="submit" value="Login">Continue</button>
            
        </div>
    </div>
</body>
</html>



</body>
</html>
