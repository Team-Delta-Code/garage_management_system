<?php
include('main/sessionChecker.php');

//count sales amount for the day
$stmt0 = $connect->prepare("SELECT SUM(amount) as sales_amount FROM transactions WHERE DAY(time_stamp) = DAY(CURRENT_DATE()) AND MONTH(time_stamp) = MONTH(CURRENT_DATE()) AND YEAR(time_stamp) = YEAR(CURRENT_DATE());");
$stmt0->execute();
$stmt0->bind_result($sales_amount);
$stmt0->fetch();
$stmt0->close();
//if there are no sales today amount is set to 0
if($sales_amount == null OR $sales_amount == ''){
    $sales_amount = 0;
}

//count monthly revenue for the current month
$stmt1 = $connect->prepare("SELECT SUM(amount) as monthly_revenue FROM transactions WHERE MONTH(time_stamp) = MONTH(CURRENT_DATE()) AND YEAR(time_stamp) = YEAR(CURRENT_DATE());");
$stmt1->execute();
$stmt1->bind_result($monthly_revenue);
$stmt1->fetch();
$stmt1->close();
//if there are no sales for current month amount is set to 0
if($monthly_revenue == null OR $monthly_revenue == ''){
    $monthly_revenue = 0;
}

//check pending payments
$stmt2 = $connect->prepare("SELECT COUNT(*) as pending_count FROM service_order so LEFT JOIN transactions t ON so.service_order_id = t.service_order_id WHERE so.service_order_status = 1 AND t.transaction_id IS NULL;");
$stmt2->execute();
$stmt2->bind_result($pending_count);
$stmt2->fetch();
$stmt2->close();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="author" content="Team Delta Code">
	<title>Monthly Sales | Ushan Motors</title>
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
            <li class="menu-item active">
                <a href="#">
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
    			⏲️<a href="dashboard.php">Home</a> > <a href="#">Sales</a>
    		</div>
    		<?php include('profile_icon.php') ?>
    	</div>

        <div class="dashboard-grid">
            <a href="salesToday.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">Today's Sales</div>
                        <div class="card-value"><?php echo $sales_amount ?> LKR</div>
                    </div>
                    <div class="card-icon">💰</div>
                </div>
            </a>

            <a href="monthlyRevenue.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">Monthly Revenue</div>
                        <div class="card-value"><?php echo $monthly_revenue ?> LKR</div>
                    </div>
                    <div class="card-icon">📈</div>
                </div>
            </a>

            <a href="pendingPayments.php">
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-title">Pending Payments</div>
                        <div class="card-value"><?php echo $pending_count ?></div>
                    </div>
                    <div class="card-icon">⏳</div>
                </div>
            </a>
        </div>
    </main>

    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>