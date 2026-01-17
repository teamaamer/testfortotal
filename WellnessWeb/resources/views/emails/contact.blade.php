<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color:#333;">
    <h2 style="margin-bottom: 10px;">📩 New Contact Message</h2>

    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Type:</strong> {{ ucfirst($type) }}</p>

    <hr>

    <p><strong>Message:</strong></p>
    <p style="white-space: pre-line; margin-top: 5px;">
        {{ $userMessage }}
    </p>

    <hr>

    <p style="font-size: 12px; color: #777;">
        Sent on {{ now()->format('Y-m-d H:i') }}
    </p>
</body>
</html>
