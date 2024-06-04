<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Login Page</title>

    <!-- Custom CSS Link -->
    <link href="{{ asset('css/client/login.css') }}" rel="stylesheet">

</head>
<body>

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
      <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Login">
  </form>

</body>
</html>
