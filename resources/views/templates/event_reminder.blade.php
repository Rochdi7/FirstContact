<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Reminder</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 20px; }
        .container { background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        p { color: #555; }
    </style>
</head>
<body>
<div class="container">
    <h1>Reminder: {{ $event_title }}</h1>
    <p>Dear {{ $recipient_name }},</p>
    <p>This is a friendly reminder that the event <strong>{{ $event_title }}</strong> will take place on <strong>{{ $event_date }}</strong> at <strong>{{ $event_location }}</strong>.</p>
    <p>Don't forget to bring your ticket and ID for check-in.</p>
    <p>We can't wait to see you there!</p>
</div>
</body>
</html>