<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h1>Hello, {{ $name }}</h1>
    <p>Please click the link below to verify your email address and proceed to payment:</p>
    <a href="{{ $verificationUrl }}">Verify Email</a>
</body>
</html>
