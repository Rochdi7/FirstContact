<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $subject ?? 'Event Reminder' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .email-wrapper {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            max-width: 700px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        header {
            background-color: #004080;
            color: white;
            padding: 15px 25px;
            border-radius: 8px 8px 0 0;
        }
        header h2 {
            margin: 0;
            font-size: 20px;
        }
        footer {
            background-color: #f2f2f2;
            color: #777;
            font-size: 12px;
            padding: 15px 25px;
            border-radius: 0 0 8px 8px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <header>
            <h2>FirstContact</h2>
        </header>

        <h1 style="color:#333; margin-top: 30px;">{{ $subject }}</h1>

        <div style="margin-top: 20px; color: #555;">
            {!! $body !!}
        </div>

        <footer>
            <p>Sent via FirstContact Email Platform</p>
            <p>&copy; {{ date('Y') }} FirstContact. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
