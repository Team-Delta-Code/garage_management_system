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
	<title>Completed Repairs | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css">

    <style type="text/css">
        .report-header {
            padding: 20px;
        }

        .main {
            flex-grow: 1;
            padding: 50px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
            background-color: #fff;
        }

        .table th, .table td {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .table th {
            background-color:rgb(244, 244, 244);
        }

        .main-header h2 {
            text-align: center;
        }

    </style>


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
            <li class="menu-item  active">
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="repairVehicles.php">Repair Vehicles</a> > <a href="#">Completed Repairs</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
            <div class="main">
                <div class="main-header">
                    <h2>Completed Vehicle Repairs</h2>
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
                            $stmt1 = $connect->prepare("SELECT b.`customer_name`, c.`license_plate_no`, b.`customer_contact`, a.`created_date` FROM service_order a JOIN vehicle_data c ON a.`vehicle_id`=c.`vehicle_id` JOIN customer_data b ON c.`customer_id`=b.`customer_id` WHERE `service_order_status` = 1 AND MONTH(`completed_date`) = MONTH(CURRENT_DATE()) AND YEAR(`completed_date`) = YEAR(CURRENT_DATE());;");
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
        </div>

    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>
