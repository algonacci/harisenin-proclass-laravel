<!DOCTYPE html>
<html>

<head>
    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>
    <h1>Thank you for contacting us!</h1>
    <p>Hello {{ $name }},</p>
    <p>We have received your message regarding "{{ $subject }}".</p>
    <p>Here are the details you provided:</p>
    <ul>
        <li><strong>Name:</strong> {{ $name }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Phone:</strong> {{ $phone }}</li>
        <li><strong>Subject:</strong> {{ $subject }}</li>
        <li><strong>Message:</strong> {{ $user_message }}</li>
    </ul>
    <p>We will get back to you as soon as possible.</p>
    <p>Thank you,<br>
        Your Company Name</p>
</body>

</html>
