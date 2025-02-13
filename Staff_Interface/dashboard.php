<?php
include('main/sessionChecker.php');

//count sales for the current month
$stmt = $connect->prepare("SELECT COUNT(*) as sales_count FROM transactions WHERE MONTH(time_stamp) = MONTH(CURRENT_DATE()) AND YEAR(time_stamp) = YEAR(CURRENT_DATE());");
$stmt->execute();
$stmt->bind_result($sales_count);
$stmt->fetch();
$stmt->close();

//count vehicle to be repaired in the current month
$stmt = $connect->prepare("SELECT COUNT(*) as to_repair_count FROM service_order WHERE service_order_status = 0;");
$stmt->execute();
$stmt->bind_result($to_repair_count);
$stmt->fetch();
$stmt->close();

//count reminders
$stmt = $connect->prepare("SELECT COUNT(*) as reminder_count FROM reminders");
$stmt->execute();
$stmt->bind_result($reminder_count);
$stmt->fetch();
$stmt->close();

//count mechanics
$stmt = $connect->prepare("SELECT COUNT(*) as mechanic_count FROM employees WHERE role_id='role_mech';");
$stmt->execute();
$stmt->bind_result($mech_count);
$stmt->fetch();
$stmt->close();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="author" content="Team Delta Code">
	<title>Dashboard | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css">

</head>
<body>
	<aside class="sidebar">
        <div class="sidebar-logo">USHAN Motors</div>
        <ul class="sidebar-menu">
            <li class="menu-item active">
            	<a href="#">
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
            <li class="menu-item">
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
                ⏲️<a href="#">Home</a> > <a href="#">Dashboard</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
            <a href="sales.php">
            	<div class="dashboard-card">
	                <div class="card-content">
	                    <div class="card-title">Monthly Sales</div>
	                    <div class="card-value"><?php echo $sales_count ?></div>
	                </div>
	                <div class="card-icon">👤</div>
	            </div>
            </a>

            <a href="repairVehicles.php">
            	<div class="dashboard-card">
	                <div class="card-content">
	                    <div class="card-title">Vehicle to Repair</div>
	                    <div class="card-value"><?php echo $to_repair_count ?></div>
	                </div>
	                <div class="card-icon">🚗</div>
	            </div>
            </a>

            <a href="reminders.php">
            	<div class="dashboard-card">
	                <div class="card-content">
	                    <div class="card-title">Reminders</div>
	                    <div class="card-value" id="reminderCount"><?php echo $reminder_count ?></div>
	                </div>
	                <div class="card-icon">💬</div>
	            </div>
            </a>

            <a href="mechanics.php">
            	<div class="dashboard-card">
	                <div class="card-content">
	                    <div class="card-title">Mechanics</div>
	                    <div class="card-value"><?php echo $mech_count ?></div>
	                </div>
	                <div class="card-icon">👥</div>
	            </div>
            </a>

            <a href="newEntry.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">Add New Entry</div>
                    </div>
                    <div class="card-icon">➕</div>
                </div>
            </a>

        </div>
    </main>

    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>