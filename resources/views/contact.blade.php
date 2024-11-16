<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Ini bagian Header (bisa copas untuk dipake di semua) -->
<header>
        <h1 class="header-text" ><a href="{{ route('Landing') }}" class="home">NexaHome</a></h1>
    <nav>
        <a href="{{ route('Contact') }}" class="btn btn-primary contact-btn" style="color: #3563E9;">Contact Us |</a>
        <a href="{{ route('About') }}" class="btn btn-primary contact-btn">About Us |</a>
        <a href="{{ route('Login') }}" class="btn btn-primary contact-btn">Login |</a>
    </nav>
</header>
<div class="up">
<div class="rightcontainer">
<form action="{{ route('submitForm') }}" method="POST" class="form-move">
    @csrf 
    
    <h2>Get In Touch</h2>
    
    <div class="form-group">
        <label for="firstName">Full Name:</label>
        <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
        <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your Email" required>
    </div>
    
    <div class="form-group">
        <label for="suggestion">Any suggestion?</label>
        <textarea id="suggestion" name="suggestion" placeholder="Tell us something"></textarea>
    </div>
    
    <button type="submit">Submit</button>
</form>
    </div>


    <div id="successModal" class="modal">
    <div class="modal-content">
        <h4>Success</h4>
        <p>Your suggestion has been sent successfully!</p>
    </div>
    <div class="modal-footer">
        <button class="modal-close btn" id="close">Close</button>
    </div>
    </div>



@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("successModal");
            modal.style.display = "block";
        });
    </script>
@endif
    


<div class='middle'>
<div class="container">
    <div class="leftcolumn">
        <div class="image-container">
        <img style="height: 50px;" id="image1" src="{{ asset('images/contact/viber.png') }}" alt="Customer Support">
        </div>
        <div class="text-container">
        <h2>Customer Support</h2>
        <p>We have 24/7 customer support available at +971 4 123 4567</p>
        </div>
    </div>
    </div>
    
    <div class="container">
    <div class="leftcolumn">
        <div class="image-container1">
        <img style="height: 50px;" id="image2" src="{{ asset('images/contact/pin.png') }}" alt="Location">
        </div>
        <div class="text-container">
        <h2>Location</h2>
        <p>Dubai, UAE: 32 Skyline Towers, Business Bay, Dubai</p>
        </div>
    </div>
    </div>
    
    <div class="container">
    <div class="leftcolumn">
        <div class="image-container2">
            <img style="height: 50px;" id="image3" src='{{ asset('images/contact/gmail.png') }}' alt="gmail">
        </div>
    <div class="text-container">
        <h2>Email</h2>
        <p>nexahomeofficial@gmail.com</p>
        </div>
    </div>
    </div>
</div>

</div>

<footer>
    @ 2024 NexaHome. All Rights Reserved.
</footer>
<script src="{{ asset('js/contact.js') }}"></script>
</body>
</html>