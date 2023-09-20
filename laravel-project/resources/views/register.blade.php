
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="registration.css">
</head>
<div class="container">
    <img src="https://www.megaparts.bg/images/megaparts-logo-dark-large.svg" alt="Logo">
    <h2>Registration</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
         <input type="password" id="password" name="password" required>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <input type="submit" value="Register">
    </form>

        Вече имате профил?
        <a href="{{ route('login') }}">Вход</a>
      </p>
    
</div>
</body>
</html>
