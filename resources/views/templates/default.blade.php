<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $subject }}</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px; line-height: 1.6;">
    <h2>{{ $subject }}</h2>
    <div>{!! $body !!}</div>
    <hr>
    <p style="font-size: 12px; color: #777;">Sent via FirstContact — {{ $sender_name }}</p>
</body>
</html>
