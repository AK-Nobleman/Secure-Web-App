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
    <a href="{{ route('SettingAdmin') }}">Account Details</a>
    <a href="{{ route('SettingAdminR') }}">Requests</a>
    <a  href="{{ route('SettingAdminM') }}">Members</a>
    <a  class="active">Suggestions</a>
</div>

<div class="form-group">
    <label for="first-name">Suggestions</label>
</div>

<div class="form-group">
<table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th> <!-- Adjust this if you have a submitter's name or id -->
                <th>Suggestions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suggestions as $suggestion)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $suggestion->name }}</td> <!-- Assuming 'text' is the column for the suggestion -->
                    <td>{{ $suggestion->email }}</td> <!-- Assuming 'submitted_by' stores who submitted the suggestion -->
                    <td>{{ $suggestion->suggestions }}</td> <!-- Assuming 'created_at' stores the submission date -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>




<footer>
    @ 2024 NexaHome. All Rights Reserved.
</footer>
</body>
</html>