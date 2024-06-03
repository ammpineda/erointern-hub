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

<form action="action_page.php" method="post">
    <div class="imgcontainer">
      <img src="login-logo.png" alt="logo" class="logo">
    </div>

    <div class="container">
      <label for="email"><b>e-mail</b></label>
      <input type="text" placeholder="Enter e-mail" name="email" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
    </div>
  </form>

</body>
</html>
