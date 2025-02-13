<?php
include('main/sessionChecker.php');

//reset appointments view
$stmt = $connect->prepare("DELETE FROM appointments WHERE DATE(`time_stamp`) < DATE(CURRENT_DATE());");
$stmt->execute();
$stmt->close();

//count today appointments
$stmt = $connect->prepare("SELECT COUNT(*) as apptTotal FROM appointments WHERE DATE(`time_stamp`) = DATE(CURRENT_DATE());");
$stmt->execute();
$stmt->bind_result($apptTotal);
$stmt->fetch();
$stmt->close();
//if there are no appointments, the amount is set to 0
if($apptTotal == null OR $apptTotal == ''){
    $apptTotal = 0;
}

//count all appointments
$stmt = $connect->prepare("SELECT COUNT(*) as apptAll FROM appointments;");
$stmt->execute();
$stmt->bind_result($apptAll);
$stmt->fetch();
$stmt->close();
//if there are no appointments, the amount is set to 0
if($apptAll == null OR $apptAll == ''){
    $apptAll = 0;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="author" content="Team Delta Code">
	<title>Appointments | Ushan Motors</title>
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
            <li class="menu-item active">
                <a href="#">
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
    			⏲️<a href="dashboard.php">Home</a> > <a href="#">Appointments</a>
    		</div>
    		<?php include('profile_icon.php') ?>
    	</div>

        <div class="dashboard-grid">
            <a href="appointmentsToday.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">Today's Appointments</div>
                        <div class="card-value"><?php echo $apptTotal ?></div>
                    </div>
                    <div class="card-icon">📅</div>
                </div>
            </a>

            <a href="appointmentsAll.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">All Appointments</div>
                        <div class="card-value"><?php echo $apptAll ?></div>
                    </div>
                    <div class="card-icon">⏰</div>
                </div>
            </a>
        </div>
    </main>

    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>