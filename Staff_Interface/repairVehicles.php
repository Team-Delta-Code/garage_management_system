<?php
include('main/sessionChecker.php');

//count repair in progress
$stmt0 = $connect->prepare("SELECT COUNT(*) AS inProgress FROM service_order WHERE `service_order_status` = 0;");
$stmt0->execute();
$stmt0->bind_result($inProgress);
$stmt0->fetch();
$stmt0->close();
//if there are no sales today amount is set to 0
if($inProgress == null OR $inProgress == ''){
    $inProgress = 0;
}

//count repair in progress
$stmt1 = $connect->prepare("SELECT COUNT(*) AS completed FROM service_order WHERE `service_order_status` = 1 AND MONTH(`completed_date`)=MONTH(CURRENT_DATE() AND YEAR(`completed_date`)=YEAR(CURRENT_DATE()));");
$stmt1->execute();
$stmt1->bind_result($completed);
$stmt1->fetch();
$stmt1->close();
//if there are no sales today amount is set to 0
if($completed == null OR $completed == ''){
    $completed = 0;
}

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
    		<?php include('profile_icon.php') ?>
    	</div>

        <div class="dashboard-grid">
            <a href="repairInProgress.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">In Progress</div>
                        <div class="card-value"><?php echo $inProgress ?></div>
                    </div>
                    <div class="card-icon">🚗</div>
                </div>
            </a>

            <a href="repairCompleted.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">Repair Completed</div>
                        <div class="card-value"><?php echo $completed ?></div>
                    </div>
                    <div class="card-icon">✅</div>
                </div>
            </a>
        </div>
    </main>

    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>