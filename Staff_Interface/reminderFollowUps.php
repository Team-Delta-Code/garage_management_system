<?php
include('main/sessionChecker.php');

//reset reminders view
$stmt0 = $connect->prepare("DELETE FROM reminders WHERE DATE(`reminder_date`) < DATE(CURRENT_DATE());");
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
	<title>Reminders List | Ushan Motors</title>
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

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .action-btn {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            margin-right: 10px;
            padding: 5px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .action-btn:hover {
            background-color: #f0f0f0;
        }

        @media (max-width: 600px) {
            .transactions-table {
                font-size: 12px;
            }
            .transactions-table th,
            .transactions-table td {
                padding: 8px;
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

        .reminders-section {
            margin-top: 20px;
        }
        .reminders-table .status.pending {
            background: #e1f5fe;
            color: #0288d1;
        }
        .reminders-table tr:hover {
            background-color: #f5f5f5;
            transition: background-color 0.3s ease;
        }
        .priority {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
        .priority.high {
            background: #ffebee;
            color: #d32f2f;
        }
        .priority.medium {
            background: #fff3e0;
            color: #f57c00;
        }
        .priority.low {
            background: #e8f5e9;
            color: #388e3c;
        }
        @media (max-width: 768px) {
            .reminders-table {
                font-size: 12px;
            }
            .reminders-table th,
            .reminders-table td {
                padding: 8px;
            }
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .action-btn {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            margin-right: 10px;
            padding: 5px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .action-btn:hover {
            background-color: #f0f0f0;
        }

        @media (max-width: 600px) {
            .transactions-table {
                font-size: 12px;
            }
            .transactions-table th,
            .transactions-table td {
                padding: 8px;
            }
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
            <li class="menu-item active">
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="reminders.php">Reminders</a> > <a href="#">All Reminders</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
            <div class="transactions-section reminders-section">
                <div class="section-header">
                    <h2>Reminders - Follow-ups</h2>
                    <button class="add-button" title="Add New Reminder">+</button>
                </div>
                <table class="transactions-table reminders-table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Assigned Mechanic</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //get all reminders data from the table0
                            $stmt1 = $connect->prepare("SELECT b.`emp_first_name`, b.`emp_last_name`, a.`reminder_subject`, a.`reminder_msg`, a.`reminder_date` AS rem_date, a.`reminder_time` AS rem_time FROM reminders a JOIN employees b ON a.`employee_id`=b.`employee_id`;");
                            $stmt1->execute();
                            $stmt1->bind_result($firstName, $lastName, $subject, $msg, $date, $time);
                            // Initialize variables to hold the results
                            $results = [];
                            while ($stmt1->fetch()) {
                                $results[] = [
                                    'emp_first_name' => $firstName,
                                    'emp_last_name' => $lastName,
                                    'reminder_subject' => $subject,
                                    'reminder_msg' => $msg,
                                    'rem_date' => $date,
                                    'rem_time' => $time
                                ];
                            }
                            $stmt1->close();
                            
                            // Check if there are no results
                            if (empty($results)) {
                                $firstName = "";
                                $lastName = "";
                                $subject = "";
                                $msg = "";
                                $date = "";
                                $time = "";
                            } else {
                                // If there are results, access them
                                foreach ($results as $result) {
                                    $firstName = $result['emp_first_name'];
                                    $lastName = $result['emp_last_name'];
                                    $subject = $result['reminder_subject'];
                                    $msg = $result['reminder_msg'];
                                    $date = $result['rem_date'];
                                    $time = $result['rem_time'];
                                    
                                    // Process each result
                                    echo "
                                    <tr>
                                        <td>".$subject."</td>
                                        <td>".$msg."</td>
                                        <td>".$firstName." ".$lastName."</td>
                                        <td>".$date."</td>
                                        <td>".$time."</td>
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