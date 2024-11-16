<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <link rel="stylesheet" href="{{ asset('css/setting-head-details.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <h1 style="display:inline-block; margin-left: 10px; color: #3563E9;">NexaHome</h1></a>
    <span style="color: #3563E9; font-size: 16px; margin-left: 4px; margin-top: 10px;">Settings</span>
    <nav>
        <a href="{{ route('Dashboard') }}">Dashboard</a>
    </nav>  
</header>


<div class="container">
<div class="profile-header">
    <img alt="Profile picture" height="80" src="{{ asset('images/dashboard/user.png') }}" width="80"/>
    <h1>{{ session('username') }}</h1>
</div>

<div class="tabs">
    <a class="active" >Account Details</a>
    <a href="{{ route('SettingUserF') }}">Family Members</a>
</div>

<div class="form-group">
    <label>Username</label>
    <input type="text" value="{{ session('username') }}" readonly/>
</div>

<div class="form-group">
    <label>Family ID</label>
    <div style="position: relative;">
    <input type="email" value="{{ session('family_id') }}" readonly/>
    </div>
</div>

<div class="form-group">
    <label>Role</label>
    <input type="email" value="{{ session('role') }}" readonly/>
</div>

<form action="{{ route('deleteAcc') }}" method="POST" class="delete-button">
    @csrf
    @method('DELETE')
    <input type="hidden" name="family_id" value="{{ session('family_id') }}">
    <input type="hidden" name="username" value="{{ session('username') }}">
    <button type="button" class="delete" id="deleteAccountButton">Delete Account</button>
</form>

<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close-button" id="closeModal">&times;</span>
        <h2>Reason for Deletion</h2>
        <textarea id="deletionReason" name="reason" placeholder="Enter the reason for account deletion" rows="4" cols="50"></textarea>
        <br>
        <button id="confirmDeleteButton">Confirm Delete</button>
    </div>
</div>


<footer>
    @ 2024 NexaHome. All Rights Reserved.
</footer>
<script src="{{ asset('js/SaCC.js') }}"></script>
</body>
</html>