<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="/resources/css/setting-member-profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Ini bagian Header (bisa copas untuk dipake di semua) -->
    <header>
        <a href=landing.html><h1 style="display:inline-block; margin-left: 10px; color: #3563E9;">NexaHome</h1></a>
        <span style="color: #3563E9; font-size: 16px; margin-left: 4px; margin-top: 10px;">Settings</span>
        <nav>
            <a href="">Dashboard</a>
        </nav>
    </header>


<div class="container">
<div class="profile-header">
    <img alt="Profile picture" height="80" src="/resources/images/kaicenat.png" width="80"/>
    <h1>Kai Cenat</h1>
</div>

<div class="tabs">
    <a href="setting-member-details.html">Account Details</a>
    <a class="active" href="setting-member-profile.html">Profile</a>
    <a href="setting-member-viewmember.html"> Members</a>
</div>

<div class="form-group">
    <label for="first-name">Phone Number</label>
    <input type="number"/>
</div>

<div class="form-group">
    <label>Address</label>
    <div style="position: relative;">
    <input type="text" value="Fill your address here"/>
    </div>
</div>


<div class="form-group">
    <label >Date of Birth</label>
    <input type="date"/>
</div>

<div class="form-group">
    <label >Change Password</label>
    <input type="text" value="Change your password here"/>
</div>

<div class="buttons">
    <button class="cancel">Cancel</button>
    <button class="save">Save</button>
</div>
</div>


<footer>
    @ 2024 NexaHome. All Rights Reserved.
</footer>
</body>
</html>