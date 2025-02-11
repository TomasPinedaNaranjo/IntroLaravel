

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="container">
    <h2>Contact Us</h2>
    <p><strong>Email:</strong> {{ $contactInfo['email'] }}</p>
    <p><strong>Address:</strong> {{ $contactInfo['address'] }}</p>
    <p><strong>Phone:</strong> {{ $contactInfo['phone'] }}</p>
</div>

</body>
</html>

