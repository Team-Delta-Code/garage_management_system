<?php
include('main/sessionChecker.php');

//count all mechanics
$stmt = $connect->prepare("SELECT COUNT(*) as mechTotal FROM employees WHERE role_id='role_mech';");
$stmt->execute();
$stmt->bind_result($mechTotal);
$stmt->fetch();
$stmt->close();
//if there are no mechanics, the amount is set to 0
if($mechTotal == null OR $mechTotal == ''){
    $mechTotal = 0;
}

//count mechanics available today
$stmt = $connect->prepare("SELECT COUNT(*) as mechAVa FROM employee_attendance WHERE role_id='role_mech' AND DATE(time_stamp) = CURDATE() AND availability = 1;");
$stmt->execute();
$stmt->bind_result($mechAva);
$stmt->fetch();
$stmt->close();
//if there are no mechanics available, amount is set to 0
if($mechAva == null OR $mechAva == ''){
    $mechAva = 0;
}

//count mechanics who are on leave
$stmt = $connect->prepare("SELECT COUNT(*) as mechLeave FROM employee_attendance WHERE role_id='role_mech' AND DATE(time_stamp) = CURDATE() AND availability = 0;");
$stmt->execute();
$stmt->bind_result($mechLeave);
$stmt->fetch();
$stmt->close();
//if there are no mechanics on leave, amount is set to 0
if($mechLeave == null OR $mechLeave == ''){
    $mechLeave = 0;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Team Delta Code">
    <title>Mechanics | Ushan Motors</title>
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
            <li class="menu-item active">
                <a href="#">
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="#">Mechanics</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
            <a href="mechanicsTotal.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">Total Mechanics</div>
                        <div class="card-value"><?php echo $mechTotal ?></div>
                    </div>
                    <div class="card-icon">👨‍🔧</div>
                </div>
            </a>

            <a href="mechanicsNowAvailable.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">Available Now</div>
                        <div class="card-value"><?php echo $mechAva ?></div>
                    </div>
                    <div class="card-icon">✅</div>
                </div>
            </a>

            <a href="mechanicsOnLeave.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">On Leave</div>
                        <div class="card-value"><?php echo $mechLeave ?></div>
                    </div>
                    <div class="card-icon">🏖️</div>
                </div>
            </a>
            
        </div>
    </main>

    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>