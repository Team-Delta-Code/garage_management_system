<?php
include('main/sessionChecker.php');

$custName = "";
$srv = "";
$time = "";

//reset appointments view
$stmt0 = $connect->prepare("DELETE FROM appointments WHERE DATE(`time_stamp`) < DATE(CURRENT_DATE());");
$stmt0->execute();
$stmt0->close();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="author" content="Team Delta Code">
	<title>Today Appointments | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css?v=<?php echo time(); ?>">

    <!-- force refresh -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">


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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color:rgba(242, 242, 242, 0.96);
        }

        .appointment-header {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: black;
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
                <a href="appointments.php">
                	<span class="icon">📅</span>
                	<span class="menu-text">Appointment</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#">
                    <span class="icon">💻</span>
                    <span class="menu-text">About Devs</span>
                </a>
            </li>
        </ul>
    </aside>

    <main class="main-content">
        <div class="top-bar">
            <div class="breadcrumb">
                ⏲️<a href="dashboard.php">Home</a> > <a href="appointments.php">Appointment</a> > <a href="#">Today Appointments</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        

            <div class="dashboard-grid">
                <div class="appointment-header">
                    <h1>Today's Appointments</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Service</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //get appointments data for today from the table
                            $stmt1 = $connect->prepare("SELECT a.`cust_name`, b.`service_name`, TIME(a.`time_stamp`) AS appointment_time FROM appointments a JOIN garage_services b ON a.`service_id`=b.`service_id` WHERE DATE(a.`time_stamp`)=DATE(CURRENT_DATE());");
                            $stmt1->execute();
                            $stmt1->bind_result($custName, $srv, $time);
                            // Initialize variables to hold the results
                            $results = [];
                            while ($stmt1->fetch()) {
                                $results[] = [
                                    'cust_name' => $custName,
                                    'service_name' => $srv,
                                    'appointment_time' => $time
                                ];
                            }
                            $stmt1->close();
                            
                            // Force array evaluation
                            $currentResults = array_values($results);
                            
                            if (count($currentResults) === 0) {
                                echo "<tr><td colspan='3' style='text-align: center;'>No appointments scheduled for today</td></tr>";
                            } else {
                                foreach ($currentResults as $result) {
                                    // Add a debug print to see what's happening
                                    error_log(print_r($result, true));
                                    
                                    echo "<tr>
                                        <td>".htmlspecialchars($result['cust_name'])."</td>
                                        <td>".htmlspecialchars($result['service_name'])."</td>
                                        <td>".htmlspecialchars($result['appointment_time'])."</td>
                                    </tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    

            
    </main>
    <script type="text/javascript" src="js/mainScript.js?v=<?php echo time(); ?>"></script>
</body>
</html>