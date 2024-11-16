<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>NexaHome - Dashboard</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard_head.css') }}">
    </head>
    <body>
        <header class="header">
            <div class="logo">
                NexaHome <span class="dashboard">Dashboard</span>
            </div>
            <div class="user-info">
                <button class="status">{{ session('role') }}</button>
                <div class="divider"></div>
                <!-- Greeting and Username -->
                <div class="greeting-username">
                    <div class="greeting" id="greetingText"></div>
                    <div class="scroll-container">
                        <div class="username" id="username" >{{ session('username') }}</div>
                    </div>
                </div>
                <!-- Profile Icon and Dropdown Menu -->
                <div class="profile-container">
                    <div class="profile-icon" onclick="toggleDropdown()">
                        <img
                            src="{{ asset('images/dashboard/user.png') }}"
                            alt="Profile"
                            class="profile-icon"
                        />
                    </div>
                    <div class="dropdown-menu" id="dropdownMenu">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Log Out</button>
                    </form>
                    </div>
                </div>
            </div>
        </header>
        <main class="container">
            <!-- Devices Section - View for Added -->
            <section class="devices" id="devices-view">
                <div class="section-header">
                    <h2>Devices</h2>
                    <button class="add-button" onclick="showAddDeviceForm()">
                        Add Device
                    </button>
                </div>
                <div class="device-content">
    @if($devices->isEmpty())
        <!-- If there are no devices, show this message -->
        <p>No devices are added</p>
    @else
        <!-- If there are devices, show the table -->
        <div class="table-wrapper">
            <table class="device-table">
                <thead>
                    <tr>
                        <th>Device Name</th>
                        <th>Device Type</th>
                        <th>Device Privilege</th>
                        <th>Family ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($devices as $device)
                    <tr>
                        <td>{{ $device->device_name }}</td>
                        <td>{{ $device->device_type }}</td>
                        <td>{{ $device->permission }}</td>
                        <td>{{ $device->family_id }}</td>
                        <td>
                            <button>Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
        </div>
                </div>
            </section>
            <div class="device-content">
        
            <!-- Add Device Form Section  -->
            <section
                class="add-device"
                id="add-device-form"
                style="display: none"
            >
                <div class="section-header">
                    <h2>Add Device</h2>
                </div>
                <form class="device-form" action="{{ route('addDevice') }}" method="POST">
                    @csrf
                    <label for="device-name">Device Name</label>
                    <input
                        type="text"
                        id="device-name"
                        placeholder="Device's Name"
                        name="devicename"
                    />
                    <!-- Device Type Selection -->
                    <div class="form-group">
                        <label for="deviceType">Device Type</label>
                        <select id="deviceType" name="deviceType">
                            <option value="">Type Selection</option>
                            <option value="AC">AC</option>
                            <option value="Camera">Camera</option>
                            <option value="Door Lock">Door Lock</option>
                            <option value="Fridge">Fridge</option>
                            <option value="Garage">Garage</option>
                            <option value="Light Switch">Light Switch</option>
                            <option value="TV">TV</option>
                        </select>
                    </div>
                    <!-- Device Privilege Selection -->
                    <div class="form-group">
                        <label for="devicePrivilege">Device Privilege Level</label>
                        <select id="devicePrivilege" name="devicePriv">
                            <option value="">Privilege Level Selection</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    <div class="form-buttons">
                        <button
                            type="button"
                            class="cancel-button"
                            onclick="cancelAddDevice()"
                        >
                            Cancel
                        </button>
                        <input type="hidden" name="family_id" value="{{ session('family_id') }}">
                        <button type="submit" class="confirm-button">
                            Confirm
                        </button>
                    </div>
                </form>
            </section>
            
            <section class="settings">
                <h2>Settings</h2>
                <a
                    href="{{ session('role') === 'Admin' ? route('SettingAdmin') : route('SettingUser') }}"
                    class="settings-link"
                >
                    <div class="settings-icon-block">
                        <img
                            src="{{ asset('images/dashboard/settings.png') }}"
                            alt="Settings Icon"
                            class="settings-icon"
                        />
                    </div>
                </a>
            </section>
        </main>
        <script src="{{ asset('js/dashboard_head.js') }}"></script>
    </body>
</html>
