<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexaHome</title>
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Ini bagian Header (bisa copas untuk dipake di semua) -->
<header>
        <h1 class="header-text">NexaHome</h1>
    <nav>
        <a href="{{ route('Contact') }}" class="btn btn-primary contact-btn">Contact Us |</a>
        <a href="{{ route('About') }}" class="btn btn-primary contact-btn">About Us |</a>
        <a href="{{ route('Login') }}" class="btn btn-primary contact-btn">Login |</a>
    </nav>
</header>

<div class="holy">
    <h1>WELCOME</h1>
    <p class="font">Our cutting-edge smart home technology seamlessly connects and controls all your devices, transforming your space into a personalized haven of comfort and convenience. Imagine effortlessly managing your home's lighting, temperature, security, and more, all from the palm of your hand. 
        <br> With NexaHome, enjoy intelligent automation that anticipates your needs, enhanced security that keeps your family safe, and energy efficiency that saves you money. 
        <br> Discover the next level of smart home living and elevate your lifestyle today.</p>
</div>



<div class="button-container">
    <a href="{{ route('Login') }}" class="login-button">Login</a>
</div>


<footer>
    @ 2024 NexaHome. All Rights Reserved.
</footer>

</body>
</html>