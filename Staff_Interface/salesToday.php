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
	<title>Today Sales | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css">

    <style type="text/css">
        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cards {
            display: flex;
            gap: 20px;
            margin: 20px 0;
        }

        .card {
            background-color: #d9e4fd;
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
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .table th {
            background-color: #f4f4f4;
        }

        .status {
            font-weight: bold;
        }

        .status.completed {
            color: green;
        }

        .status.pending {
            color: blue;
        }

        .status.error {
            color: red;
        }

        .add-record {
            margin-top: 50px;
            text-align: center;
        }

        .add-record button {
            background-color: #007bff;
            color: #fff;
            padding: 20px 40px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .add-record button:hover {
            background-color: #0056b3;
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
            <li class="menu-item active">
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="sales.php">Sales</a> > <a href="#">Today Sales</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">

            <div class="main">

                <div class="cards">
                    <div class="card">
                        <h3>Today's Sales</h3>
                        <p>
                            <?php
                            //get today sales money count from the table
                            $stmt1 = $connect->prepare("SELECT SUM(amount) as todaySales FROM transactions WHERE DAY(time_stamp) = DAY(CURRENT_DATE()) AND MONTH(time_stamp) = MONTH(CURRENT_DATE()) AND YEAR(time_stamp) = YEAR(CURRENT_DATE());");
                            $stmt1->execute();
                            $stmt1->bind_result($todaySales);
                            $stmt1->fetch();
                            $stmt1->close();

                            //if empty assigns 0
                            if(empty($todaySales)){
                                $todaySales = 0;
                            }

                            //print to page
                            echo $todaySales." LKR";
                            ?>  
                        </p>
                    </div>
                    <div class="card">
                        <h3>Transactions</h3>
                        <p>
                            <?php
                            //get today transaction count from the table
                            $stmt3 = $connect->prepare("SELECT COUNT(id) as todayTrans FROM transactions WHERE DAY(time_stamp) = DAY(CURRENT_DATE()) AND MONTH(time_stamp) = MONTH(CURRENT_DATE()) AND YEAR(time_stamp) = YEAR(CURRENT_DATE());");
                            $stmt3->execute();
                            $stmt3->bind_result($todayTrans);
                            $stmt3->fetch();
                            $stmt3->close();

                            //if empty assigns 0
                            if(empty($todayTrans)){
                                $todayTrans = 0;
                            }

                            //print to page
                            echo $todayTrans;
                            ?>
                        </p>
                    </div>
                    <div class="card">
                        <h3>Average Sale</h3>
                        <p>
                            <?php
                            //get sales count for the whole month from the table
                            $stmt3 = $connect->prepare("SELECT COUNT(amount) as totalSales FROM transactions WHERE MONTH(time_stamp) = MONTH(CURRENT_DATE()) AND YEAR(time_stamp) = YEAR(CURRENT_DATE());");
                            $stmt3->execute();
                            $stmt3->bind_result($totalSales);
                            $stmt3->fetch();
                            $stmt3->close();
                            //if empty assigns 0
                            if(empty($totalSales)){
                                $totalSales = 0;
                            }
                            //get current timestamp
                            $timestamp = time();
                            //extract day
                            $days = date('d', $timestamp);

                            //calculate average sales for the month as a percentage
                            $avgSales = ($totalSales/$days)/100;

                            //print to page
                            echo $avgSales." %";
                            ?>
                        </p>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Service</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //get all sales records data for today from the table
                            $stmt4 = $connect->prepare("SELECT TIME(c.`time_stamp`) AS time0, a.`service_name`, e.`customer_name`, c.`amount`, b.`service_order_status` FROM garage_services a JOIN service_order b ON a.`service_id`=b.`service_id` JOIN transactions c ON b.`service_order_id`=c.`service_order_id` JOIN vehicle_data d ON b.`vehicle_id`=d.`vehicle_id` JOIN customer_data e ON d.`customer_id`=e.`customer_id`;");
                            $stmt4->execute();
                            $stmt4->bind_result($time0, $service, $customer, $amount, $status);
                            // Initialize variables to hold the results
                            $results = [];
                            while ($stmt4->fetch()) {
                                $results[] = [
                                    'time0' => $time0,
                                    'service_name' => $service,
                                    'customer_name' => $customer,
                                    'amount' => $amount,
                                    'service_order_status' => $status
                                ];
                            }
                            $stmt4->close();
                            
                            // Check if there are no results
                            if (empty($results)) {
                                $time0;
                                $service = "";
                                $customer = "";
                                $amount = "";
                                $status = "";
                            } else {
                                // If there are results, access them
                                foreach ($results as $result) {
                                    $time0 = $result['time0'];
                                    $service = $result['service_name'];
                                    $customer = $result['customer_name'];
                                    $amount = $result['amount'];
                                    $status = $result['service_order_status'];

                                    if($status==1){
                                        $statusMsg = "<td class='status completed'>Completed</td>";
                                    } else if($status==0){
                                        $statusMsg = "<td class='status pending'>Pending</td>";
                                    } else {
                                        $statusMsg = "<td class='status error'>Error Occurred</td>";
                                    }
                                    
                                    // Process each result
                                    echo "
                                    <tr>
                                        <td>".$time0."</td>
                                        <td>".$service."</td>
                                        <td>".$customer."</td>
                                        <td>".$amount."</td>
                                        ".$statusMsg."
                                    </tr>
                                    ";
                                }
                            }
                            ?>
                        <tr>
                            <td>14:30</td>
                            <td>Oil Change</td>
                            <td>Alvis</td>
                            <td>1,500 LKR</td>
                            <td class="status completed">Completed</td>
                        </tr>
                    </tbody>
                </table>

                <div class="add-record">
                    <button>Add New Record</button>
                </div>
            </div>

            
        </div>

        

    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>