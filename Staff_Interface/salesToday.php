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
                        <p>2,450 LKR</p>
                    </div>
                    <div class="card">
                        <h3>Transactions</h3>
                        <p>28</p>
                    </div>
                    <div class="card">
                        <h3>Average Sale</h3>
                        <p>444.64 LKR</p>
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
                        <tr>
                            <td>14:30</td>
                            <td>Oil Change</td>
                            <td>Alvis</td>
                            <td>1,500 LKR</td>
                            <td class="status completed">Completed</td>
                        </tr>
                        <tr>
                            <td>13:15</td>
                            <td>Engine Tune Up</td>
                            <td>Mdushanka</td>
                            <td>8,000 LKR</td>
                            <td class="status pending">Pending</td>
                        </tr>
                        <tr>
                            <td>11:45</td>
                            <td>Tire Replacement</td>
                            <td>Tifin</td>
                            <td>1,000 LKR</td>
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