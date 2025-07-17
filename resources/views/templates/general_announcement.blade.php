<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Announcement</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        p { color: #666; }
    </style>
</head>
<body>
<div class="container">
    <h1>{{ $announcement_title }}</h1>
    <p>Dear {{ $recipient_name }},</p>
    <p>{{ $announcement_body }}</p>
    <p>Thank you for being part of our community.</p>
</div>
</body>
</html>