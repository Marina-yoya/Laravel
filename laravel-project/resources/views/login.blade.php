<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('registration.css') }}">
</head>

<body>
    <div class="container">
        <img src="https://www.megaparts.bg/images/megaparts-logo-dark-large.svg" alt="Logo">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <p class="error">
              
                @if($errors->has('login_error'))
                {{ $errors->first('login_error') }}
            @endif
            </p>
            <input type="submit" value="Login">
        </form>
        <p>Нямате профил? <a href="{{ route('register') }}">Регистрация</a></p>
    </div>
</body>

</html>
