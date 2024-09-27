<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        /* Additional styles for email centering */
        .email-container {
            max-width: 600px; /* Set a maximum width for the email */
            margin: auto; /* Center the email on the page */
            padding: 20px; /* Add some padding */
            border: 1px solid #ddd; /* Optional: Add a border */
            border-radius: 5px; /* Optional: Round the corners */
        }
    </style>
</head>
<body>
    <div class="email-container text-center">
        <h1>Issue: {{ $supportTicket->subject }}</h1>
        <p>
            <a href="{{ route('customer.show.support.ticket', $supportTicket->id) }}" class="btn btn-primary">Go to the ticket</a>
        </p>
    </div>
</body>
</html>
