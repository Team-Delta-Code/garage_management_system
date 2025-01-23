<?php
include('main/sessionChecker.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="author" content="Team Delta Code">
	<title>Repair Pending Review | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css">

    

</head>
<body>
	<aside class="sidebar">
        <div class="sidebar-logo">USHAN Motors</div>
        <ul class="sidebar-menu">
            <li class="menu-item">
            	<a href="dashboard.php">
                	<span class="icon">📊</span>
                	<span class="menu-text">Dashboard</span>
            	</a>
        	</li>
            <li class="menu-item">
                <a href="sales.php">
                	<span class="icon">📈</span>
                	<span class="menu-text">Monthly Sales</span>
                </a>
            </li>
            <li class="menu-item active">
                <a href="repairVehicles.php">
                	<span class="icon">🔧</span>
                	<span class="menu-text">Vehicle to Repair</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="reminders.php">
                	<span class="icon">⏰</span>
        	        <span class="menu-text">Reminders</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="mechanics.php">
                	<span class="icon">👨‍🔧</span>
                	<span class="menu-text">Mechanics</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="appointments.php">
                	<span class="icon">📅</span>
                	<span class="menu-text">Appointment</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#">
                    <span class="icon">💻</span>
                    <span class="menu-text">About Devs</span>
                </a>
            </li>
        </ul>
    </aside>

    <main class="main-content">
        <div class="top-bar">
            <div class="breadcrumb">
                ⏲️<a href="dashboard.php">Home</a> > <a href="repairVehicles.php">Repair Vehicles</a> > <a href="#">Repair Pending Review</a>
            </div>
            <div>
                <a href="#" class="user-profile" onclick="toggleDropdown(event)">
                    <div class="user-avatar">SF</div>
                    <div class="user-name">Shank Fury</div>
                </a>
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="#">Profile</a>
                    <a href="#">Settings</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>

        <div class="dashboard-grid">
            <div class="report-header">
                <h1>Repair Pending Review</h1>
            </div>

            <div class="metrics-grid">
                <div class="metric-card">
                    <h2>Total Pending Reviews</h2>
                    <div class="metric-value">24</div>
                    <div class="metric-comparison">↑ 12% from last week</div>
                </div>
                <div class="metric-card">
                    <h2>Average Wait Time</h2>
                    <div class="metric-value">2.3 days</div>
                    <div class="metric-comparison" style="color: #dc3545;">↑ 0.5 days vs target</div>
                </div>
                <div class="metric-card">
                    <h2>Priority Cases</h2>
                    <div class="metric-value">7</div>
                    <div class="metric-comparison">Require immediate attention</div>
                </div>
            </div>

            <div class="transactions-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h2>Pending Reviews</h2>
                    <button class="add-button">+</button>
                </div>
                
                <table class="transactions-table">
                    <thead>
                        <tr>
                            <th>Vehicle ID</th>
                            <th>Customer Name</th>
                            <th>Service Type</th>
                            <th>Mechanic</th>
                            <th>Submission Date</th>
                            <th>Status</th>
                            <th>Priority</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>VH-2024-001</td>
                            <td>John Smith</td>
                            <td>Engine Overhaul</td>
                            <td>Mike Rodriguez</td>
                            <td>Jan 12, 2025</td>
                            <td><span class="status pending">Pending Review</span></td>
                            <td style="color: #dc3545;">High</td>
                        </tr>
                        <tr>
                            <td>VH-2024-002</td>
                            <td>Sarah Johnson</td>
                            <td>Brake System</td>
                            <td>Chris Wilson</td>
                            <td>Jan 13, 2025</td>
                            <td><span class="status pending">Pending Review</span></td>
                            <td style="color: #28a745;">Normal</td>
                        </tr>
                        <tr>
                            <td>VH-2024-003</td>
                            <td>Michael Chang</td>
                            <td>Transmission</td>
                            <td>David Martinez</td>
                            <td>Jan 14, 2025</td>
                            <td><span class="status pending">Pending Review</span></td>
                            <td style="color: #dc3545;">High</td>
                        </tr>
                        <tr>
                            <td>VH-2024-004</td>
                            <td>Emily Brown</td>
                            <td>AC Repair</td>
                            <td>James Wilson</td>
                            <td>Jan 14, 2025</td>
                            <td><span class="status pending">Pending Review</span></td>
                            <td style="color: #28a745;">Normal</td>
                        </tr>
                    </tbody>
                </table>

                <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
                    <div style="color: #666; font-size: 14px;">
                        Showing 4 of 24 entries
                    </div>
                </div>
            </div>
        </div>

    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>