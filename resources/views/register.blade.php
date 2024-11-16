<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>
<body>
<header class="header">
<h1 class="header-text" ><a href="{{ route('Landing') }}" class="home">NexaHome</a></h1>
    <nav>
        <a href="{{ route('Contact') }}" class="btn btn-primary contact-btn">Contact Us |</a>
        <a href="{{ route('About') }}" class="btn btn-primary contact-btn">About Us |</a>
        <a href="{{ route('Login') }}" class="btn btn-primary contact-btn">Login |</a>
    </nav>
</header>
    <div class="container" id="form">
        <div class="form-container">
            <h1>Register</h1>
            <form id="registerForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="box">
                    <div class="left">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                        @error('username')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password">
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <label for="role">Role</label>
                        <select id="role" name="role">
                            <option value="">Select Role</option>
                            <option value="head" {{ old('role') == 'head' ? 'selected' : '' }}>Head</option>
                            <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                        </select>
                        @error('role')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <div class="ktp" id="headInput">
                            <label for="ktp">Upload KTP</label>
                            <input type="file" id="ktp" name="ktp" accept="image/*" onchange="previewKTP(event)">
                            @error('ktp')
                                <div class="error ">{{ $message }}</div>
                            @enderror

                            <label for="nik">NIK</label>
                            <input type="text" id="nik" name="nik" placeholder="Enter NIK 16 digits" value="{{ old('nik') }}">
                            @error('nik')
                                <div class="error ">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="head" id="memberInput">
                            <label for="head">Head ID</label>
                            <input type="text" id="head" name="head" placeholder="Enter Parent ID" value="{{ old('head') }}">
                            @error('head')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        @error($errors->any())
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit">Register</button>
                    
                </div>
                <div class="right">
                        
                </div>
            
        </div>
        <div class="preview-container">
            <img id="ktpPreview" value="{{ old('ktp') }}" class="image">
        </div>
        </form>
    </div>

    <div id="memberModal" class="modal" style="display:none;">
        <div class="modal-content">
            <h2>Please provide your member tag</h2>
            <label for="member_tag">Member Tag:</label>
            <input type="text" id="member_tag" name="member_tag" placeholder="Enter member tag">
            <button id="submitModal" type="button">Submit</button>
            <button id="cancelModal" type="button">Cancel</button>
        </div>
    </div>

    <footer>
        @ 2024 NexaHome. All Rights Reserved.
    </footer>
    <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>