<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <h1 class="header-text" ><a href="{{ route('Landing') }}" class="home">NexaHome</a></h1>
    <nav>
        <a href="{{ route('Contact') }}" class="btn btn-primary contact-btn">Contact Us |</a>
        <a href="{{ route('About') }}" class="btn btn-primary contact-btn" style="color: #3563E9;">About Us |</a>
        <a href="{{ route('Login') }}" class="btn btn-primary contact-btn">Login |</a>
    </nav>
</header>

<div class="people">
<img height="170px" src="{{ asset('images/aboutus/multiple-users-silhouette.png') }}" alt="People">
</div>

<div class="aboutus">
    <h1>ABOUT US</h1>
</div>


<div class="texthere">
    <p1>NexaHome was founded in Indonesia in 2024 by a group of six brilliant university students driven by a shared passion for technology and innovation. Recognizing the growing demand for smart home solutions, they set out to create a platform that would empower families to embrace the convenience and security of connected living.
    With diverse backgrounds in engineering, design, and business, the founders combined their skills to develop cutting-edge technology that simplifies home management. From humble beginnings, NexaHome has rapidly grown into a pioneering force in the smart home industry, dedicated to enhancing the lives of families worldwide. As we continue to innovate and expand, our commitment to quality and customer satisfaction remains at the heart of everything we do.</p1>
    </div>




<footer>
    @ 2024 NexaHome. All Rights Reserved.
</footer>
</body>
</html>