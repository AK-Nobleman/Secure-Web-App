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
    <a class="active">Requests</a>
    <a  href="{{ route('SettingAdminM') }}">Members</a>
    <a href="{{ route('SettingAdminS') }}">Suggestions</a>
</div>
    <label for="">Create Account</label>
    <div class="form-group">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Family ID</th>
                    <th>Image</th>
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$request->username}}</td>
                        <td>{{ $request->family_id }}</td>
                        <td>
                        <img src="{{ route('serveFile', ['subfolder' => 'ktp', 'filename' => str_replace('ktp/', '', $request->image_path)]) }}" alt="Image" style="width: 100px; height: auto;">
                        </td>
                        <td>
                        <form action="{{ route('acceptRequest') }}" method="POST">
                        @csrf
                            <input type="hidden" name="username" value="{{ $request->username }}">
                            <input type="hidden" name="password" value="{{ $request->password }}">
                            <input type="hidden" name="family_id" value="{{ $request->family_id }}">
                            <input type="hidden" name="image_path" value="{{ $request->image_path }}">
                            <button type="submit" class="action-btn">Accept</button>
                        </form>
                        </td>
                        <td>
                        <form action="{{ route('rejectRequest') }}" method="POST">
                        @csrf
                            <input type="hidden" name="family_id" value="{{ $request->family_id }}">
                            <button type="submit" class="action-btn">Reject</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <label for="">Delete Account</label>
    <div class="form-group">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Family ID</th>
                    <th>Reason</th>
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dels as $del)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$del->username}}</td>
                        <td>{{ $del->family_id }}</td>
                        <td>
                        {{ $del->reason }}
                        </td>
                        <td>
                        <form action="{{ route('deleteAccP') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="family_id" value="{{ $del->family_id }}">
                            <button type="submit" class="action-btn">Accept</button>
                        </form>
                        </td>
                        <td>
                        <form action="{{ route('rejectDel') }}" method="POST">
                        @csrf
                            <input type="hidden" name="family_id" value="{{ $del->family_id }}">
                            <button type="submit" class="action-btn">Reject</button>
                        </form>
                        </td>
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