<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexaHome</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <h1 class="header-text" ><a href="{{ route('Landing') }}" class="home">NexaHome</a></h1>
    <nav>
        <a href="{{ route('Contact') }}" class="btn btn-primary contact-btn" >Contact Us |</a>
        <a href="{{ route('About') }}" class="btn btn-primary contact-btn">About Us |</a>
        <a href="{{ route('Login') }}" class="btn btn-primary contact-btn"style="color: #3563E9;">Login |</a>
    </nav>
</header>
    <div class="container">
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="{{ route('submitLogin') }}">
            @csrf
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="username" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <form action="{{ route('Dashboard') }}" method="POST">
                    <input type="hidden" value="{{session('family_head')}}">
                    <button type="submit" href="{{ route('Landing') }}">Login</button>
                </form>
            </form>
            <nav class="register"> Don't have an account <a href="{{ route('Register') }}" class="regist">Register Here</a></nav>
        </div>
        <footer>
            @ 2024 NexaHome. All Rights Reserved.
        </footer>
    </div>
    
</body>
</html>