<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
</head>
<body>
<h2>You have a new contact message</h2>
<p><strong>Name:</strong> {{ $details['name'] }}</p>
<p><strong>Email:</strong> {{ $details['email'] }}</p>
<p><strong>Message:</strong></p>
<p>{{ $details['message'] }}</p>
</body>
</html>
