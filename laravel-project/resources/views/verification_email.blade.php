<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <h1>Verify Your Email</h1>
    <p>Click the following link to verify your email:</p>
    <a href="{{ route('verification.verify', ['id' => $user->id, 'hash' => sha1($user->getEmailForVerification())]) }}">
        Verify Email
    </a>
</body>
</html>