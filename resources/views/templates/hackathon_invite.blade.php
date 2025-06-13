<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hackathon Invitation</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; margin: 0; padding: 20px; }
        .container { background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #343a40; }
        p { color: #495057; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px; margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h1>You're Invited to {{ $event_name }}!</h1>
    <p>Dear {{ $recipient_name }},</p>
    <p>We are excited to invite you to participate in our upcoming hackathon: <strong>{{ $event_name }}</strong> happening on {{ $event_date }} at {{ $event_location }}.</p>
    <p>Don't miss the chance to collaborate, innovate, and win great prizes!</p>
    <a href="{{ $registration_link }}" class="btn">Register Now</a>

    <p style="margin-top: 30px;">We look forward to seeing you there!</p>
</div>
</body>
</html>
