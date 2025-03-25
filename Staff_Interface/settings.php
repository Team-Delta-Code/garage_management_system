<?php
include('main/sessionChecker.php');

if ($_POST) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Check database connection
    if (!$connect) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Collect form data
    $oldPsw = $_POST['oldPsw'];
    $newPsw = $_POST['newPsw'];
    $confirmPsw = $_POST['confirmPsw'];

    //compare passwords
    //--to be implemented--

    //generate vehicle id
    $veh_id = "veh".generateFiveDigitNumber();
    //check if the generated number already exists in the database
    //if yes generate again
    while(checkItemExists($connect, $cust_id, "vehicle_data", "vehicle_id")) {
        $veh_id = "cust".generateFiveDigitNumber();
    }

    //generate service order id
    $serv_ord_id = "ord".generateFiveDigitNumber();

    while(checkItemExists($connect, $serv_ord_id, "service_order", "service_order_id")) {
        $serv_ord_id = "ord".generateFiveDigitNumber();
    }

    //fetch service data
    $stmt0 = $connect->prepare("SELECT service_id FROM garage_services WHERE service_name = ?");
    $stmt0->bind_param("s", $service);
    $stmt0->execute();
    $stmt0->bind_result($service_id);
    $stmt0->fetch();
    $stmt0->close();

    //insert data into customer data
    $stmt = $connect->prepare("INSERT INTO customer_data (customer_id, customer_name, customer_contact, customer_email, customer_address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $cust_id, $cust_name, $cust_contact, $cust_email, $cust_address);

    //insert data into vehicle data
    $stmt1 = $connect->prepare("INSERT INTO vehicle_data (vehicle_id, customer_id, type, brand, model, license_plate_no) VALUES (?, ?, ?, ?, ?, ?);");
    $stmt1->bind_param("ssssss", $veh_id, $cust_id, $veh_type, $veh_brand, $veh_model, $veh_plate);

    //insert data into service order id
    $stmt2 = $connect->prepare("INSERT INTO service_order (service_order_id, vehicle_id, service_id, created_date, service_order_status) VALUES (?, ?, ?, CURDATE(), ?)");
    $stmt2->bind_param("sssi", $serv_ord_id, $veh_id, $service_id, $service_order_status);
    
    if ($stmt->execute()) {
        if ($stmt1->execute()) {
            if ($stmt2->execute()) {
                header("Location: " . $_SERVER['PHP_SELF']);
            } else {
                echo "Service Order Insert Error: " . $stmt2->error;
            }
        } else {
            echo "Vehicle Data Insert Error: " . $stmt1->error;
        }
    } else {
        echo "Customer Data Insert Error: " . $stmt->error;
    }

    $stmt->close();
    $stmt1->close();
    $stmt2->close();
    $connect->close();
    exit(); // Stop further processing
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="author" content="Team Delta Code">
	<title>Settings | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css">

    <style type="text/css">
        .report-header {
            padding: 20px;
        }

        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .metric-card {
            background: #fff;
            border-radius: 4px;
            padding: 15px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .metric-card h2 {
            font-size: 16px;
            color: #333;
            margin: 0 0 10px 0;
            font-weight: 500;
        }

        .metric-value {
            font-size: 24px;
            font-weight: bold;
            color: #1a237e;
            margin-bottom: 5px;
        }

        .metric-comparison {
            font-size: 14px;
            color: #28a745;
        }

        .transactions-section {
            background: #fff;
            border-radius: 4px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .transactions-section h2 {
            font-size: 18px;
            color: #333;
            margin: 0 0 20px 0;
        }

        .transactions-table {
            width: 100%;
            border-collapse: collapse;
        }

        .transactions-table th,
        .transactions-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .transactions-table th {
            color: #666;
            font-weight: 500;
            background: #f8f9fa;
        }

        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 14px;
        }

        .status.completed {
            background: #e8f5e9;
            color: #28a745;
        }

        .status.pending {
            background: #fff3e0;
            color: #f57c00;
        }

        @media (max-width: 768px) {
            .metrics-grid {
                grid-template-columns: 1fr;
            }
        }

        .add-button {
            background: #E3F2FD;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            color: #1a237e;
            font-size: 60px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            margin: 0;
            padding: 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .header-div {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            max-width: 800px;
            width: 100%;
            margin: 8px auto;
            font-size: 20px;

        }

        .header-div .header {
            font-weight: 700;
        }

        .header-div form {
            display: flex;
            flex-direction: column;
        }

        form label {
            font-size: 16px;
            color: #6b7480;
        }

        form input[type=password] {
            height: 36px;
            border: none;
            background-color: #b1c8e6;
            border-radius: 20px;
        }

        form input[type=submit] {
            height: 36px;
            border: none;
            background-color: #1a237e;
            border-radius: 20px;
            color: #fff;
            font-size: 15px;
        }

    </style>

</head>
<body>
	<aside class="sidebar">
        <div class="sidebar-logo">USHAN Motors</div>
        <ul class="sidebar-menu">
            <li class="menu-item active">
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="#">Settings</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
            <div class="container">
                <div class="header-div">
                    <h1><?php echo $firstName." ".$lastName; ?></h1>
                </div>
                <div class="header-div">
                    <span class="header">Position: </span><span><?php echo $role; ?></span>
                </div>
                <div class="header-div">
                    <span class="header">Change Password</span><br>
                    <form>
                        <label>Old Password </label><input type="password" name="oldPsw"><br>
                        <label>New Password </label><input type="password" name="newPsw"><br>
                        <label>Confirm New Password </label><input type="password" name="confirmPsw"><br>
                        <input type="submit" name="Change">
                    </form>
                </div>
            </div>
        </div>

    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>