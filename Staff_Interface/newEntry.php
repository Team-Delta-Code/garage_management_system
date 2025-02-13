<?php
include('main/sessionChecker.php');
include('main/functions.php');

if ($_POST) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Check database connection
    if (!$connect) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Collect form data
    $cust_name = $_POST['cust_name'];
    $cust_address = $_POST['cust_address'];
    $cust_contact = $_POST['cust_contact'];
    $cust_email = $_POST['cust_email'];
    $veh_type = $_POST['veh_type'];
    $veh_brand = $_POST['veh_brand'];
    $veh_model = $_POST['veh_model'];
    $veh_plate = $_POST['veh_plate'];
    $service = $_POST['required_service'];
    $service_order_status = 0;

    //generate customer id
    $cust_id = "cust".generateFiveDigitNumber();
    //check if the generated number already exists in the database
    //if yes generate again
    while(checkItemExists($connect, $cust_id, "customer_data", "customer_id")) {
        $cust_id = "cust".generateFiveDigitNumber();
    }

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
	<title>New Entry | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css">

    <style>
        .form-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .form-body {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .form-heading {
            font-size: 28px;
            font-weight: 700;
        }
        form span {
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }
        input, textarea, select {
            margin-top: 5px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #1a237e;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="#">New Entry</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
            <div class="form-container">
                <div class="form-body">
                    <form id="serviceBookingForm" action="newEntry.php" method="POST">
                        <span class="form-heading">Customer Details</span><br>
                        <span>Name</span>
                        <input type="text" name="cust_name" required><br>
                        
                        <span>Address</span>
                        <textarea name="cust_address" required></textarea><br>
                        
                        <span>Contact No</span>
                        <input type="tel" name="cust_contact" required><br>
                        
                        <span>Email (Optional)</span>
                        <input type="email" name="cust_email"><br>
                        
                        <span class="form-heading">Vehicle Details</span><br>
                        
                        <span>Type</span>
                        <select name="veh_type" required>
                            <option value="">Select Vehicle Type</option>
                            <option value="car">Car</option>
                            <option value="truck">Truck</option>
                            <option value="motorcycle">Motorcycle</option>
                            <option value="suv">SUV</option>
                        </select><br>
                        
                        <span>Brand</span>
                        <input type="text" name="veh_brand" required><br>
                        
                        <span>Model</span>
                        <input type="text" name="veh_model" required><br>
                        
                        <span>Plate No</span>
                        <input type="text" name="veh_plate" required><br>
                        
                        <span class="form-heading">Required Service</span>
                        <select name="required_service" required>
                            <option value="">Select Service</option>
                            <option value="Vehicle Repair">Vehicle Repair</option>
                            <option value="Full Service">Full Service</option>
                            <option value="Body Wash">Body Wash</option>
                            <option value="Paint Services">Paint Services</option>
                            <option value="Tow Services">Tow Services</option>
                        </select><br>
                        
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>