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
	<title>Repair Vehicles | Ushan Motors</title>
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
                <a href="#">
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
                <a href="aboutDevs.php">
                    <span class="icon">💻</span>
                    <span class="menu-text">About Devs</span>
                </a>
            </li>
        </ul>
    </aside>

    <main class="main-content">
    	<div class="top-bar">
    		<div class="breadcrumb">
    			⏲️<a href="dashboard.php">Home</a> > <a href="#">Repair Vehicles</a>
    		</div>
    		<div>
            	<a href="#" class="user-profile" onclick="toggleDropdown(event)">
			        <div class="user-avatar">SF</div>
			        <div class="user-name">Shank Fury</div>
			    </a>
			    <div class="dropdown-menu" id="dropdownMenu">
                    <a href="settings.php">Settings</a>
			        <a href="logout.php">Logout</a>
			    </div>
            </div>
    	</div>

        <div class="dashboard-grid">
            <a href="repairInProgress.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">In Progress</div>
                        <div class="card-value">7</div>
                    </div>
                    <div class="card-icon">🚗</div>
                </div>
            </a>

            <a href="repairCompleted.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">Repair Completed</div>
                        <div class="card-value">5</div>
                    </div>
                    <div class="card-icon">✅</div>
                </div>
            </a>
        </div>
    </main>

    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>