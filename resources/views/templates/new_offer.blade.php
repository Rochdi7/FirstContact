<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Special Offer</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 20px; }
        .container { background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        p { color: #555; }
    </style>
</head>
<body>
<div class="container">
    <h1>Special Offer for {{ $recipient_name }}</h1>
    <p>Dear {{ $recipient_name }},</p>
    <p>We have an exclusive offer just for you: {{ $offer_details }} valid until {{ $expiry_date }}.</p>
    <p>Cheers, The Team</p>
</div>
</body>
</html>