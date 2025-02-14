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
	<title>Repairs In Progress | Ushan Motors</title>
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


        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #e6e6fa;
        }

        .sidebar h1 {
            font-size: 24px;
            margin-bottom: 40px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .main {
            flex-grow: 1;
            padding: 20px;
        }

        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
        }

        .main-header h2 {
            margin: 0;
        }

        .cards {
            display: flex;
            gap: 20px;
            margin: 20px 0;
        }

        .card {
            background-color: #007bff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            flex: 1;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .table th {
            background-color:#fff;
        }

        .status {
            font-weight: bold;
        }


        .status.Available {
            color: green;
        }

        .status.Unavailable {
            color: orange;
        }


        .add-record {
            margin-top: 20px;
            text-align: center;
        }

        .add-record button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-record button:hover {
            background-color: #0056b3;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile span {
            margin-left: 10px;
        }
    </style>

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
                ⏲️<a href="dashboard.php">Home</a> > <a href="repairVehicles.php">Repair Vehicles</a> > <a href="#">Repair In Progress</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
            <div class="main-header">
                <h2>Ongoing Vehicle Repairs</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Owner Name</th>
                            <th>Vehicle Number</th>
                            <th>Phone Number</th>
                            <th>Recieved Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //get all reminders data from the table0
                            $stmt1 = $connect->prepare("SELECT b.`customer_name`, c.`license_plate_no`, b.`customer_contact`, a.`created_date` FROM service_order a JOIN vehicle_data c ON a.`vehicle_id`=c.`vehicle_id` JOIN customer_data b ON c.`customer_id`=b.`customer_id` WHERE `service_order_status` = 0;");
                            $stmt1->execute();
                            $stmt1->bind_result($custName, $lcnsPlateNo, $contact, $receDate);
                            // Initialize variables to hold the results
                            $results = [];
                            while ($stmt1->fetch()) {
                                $results[] = [
                                    'emp_first_name' => $custName,
                                    'emp_last_name' => $lcnsPlateNo,
                                    'reminder_subject' => $contact,
                                    'reminder_msg' => $receDate,
                                ];
                            }
                            $stmt1->close();
                            
                            // Check if there are no results
                            if (empty($results)) {
                                $custName = "";
                                $lcnsPlateNo = "";
                                $contact = "";
                                $receDate = "";
                            } else {
                                // If there are results, access them
                                foreach ($results as $result) {
                                    $custName = $result['emp_first_name'];
                                    $lcnsPlateNo = $result['emp_last_name'];
                                    $contact = $result['reminder_subject'];
                                    $receDate = $result['reminder_msg'];
                                    
                                    // Process each result
                                    echo "
                                    <tr>
                                        <td>".$custName."</td>
                                        <td>".$lcnsPlateNo."</td>
                                        <td>".$contact."</td>
                                        <td>".$receDate."</td>
                                    </tr>
                                    ";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>