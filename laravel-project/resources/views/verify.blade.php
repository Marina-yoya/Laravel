<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Email Verification</h1>
        <p>Thank you for registering.<br>
             To be able to view all products, you have to verify your email.<br>
             Please check your inbox and verify your email address</p>
        {{-- <a href="{{ route('verification.verify', ['id' => $user->id, 'hash' => sha1($user->getEmailForVerification())]) }}" style="padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Verify Email</a>
         --}}
    </div>
</body>
</html>
