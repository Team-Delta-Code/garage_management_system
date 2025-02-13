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
	<title>Monthly Revenue | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css">

    <style type="text/css">

        .main {
            flex-grow: 1;
            padding: 20px;
        }

        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            background-color: #d9e4fd;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            flex: 1;
        }

        .card p {
            margin: 10px 0 0;
        }

        .card span {
            font-size: 12px;
            color: green;
        }

        .card span.decline {
            color: red;
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
            background-color: #f4f4f4;
        }

        .status {
            font-weight: bold;
        }

        .status.positive {
            color: green;
        }

        .status.negative {
            color: red;
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="sales.php">Sales</a> > <a href="#">Monthly Revenue</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
        
        <div class="main">
        <div class="main-header">
            <h2>Home > Sales > Monthly Revenue</h2>
        </div>

        <div class="cards">
            <div class="card">
                <h3>Total Revenue (YTD)</h3>
                <p>24,000 LKR</p>
                <span>12.5% vs Last Year</span>
            </div>
            <div class="card">
                <h3>This Month</h3>
                <p>3,000 LKR</p>
                <span>8.3% vs Last Month</span>
            </div>
            <div class="card">
                <h3>Average Monthly Revenue</h3>
                <p>5,000 LKR</p>
                <span class="decline">2.5% vs Last Quarter</span>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Revenue</th>
                    <th>Repairs</th>
                    <th>Sales</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>January 2025</td>
                    <td>1,000 LKR</td>
                    <td>2,500 LKR</td>
                    <td>5,000 LKR</td>
                    <td class="status positive">8.3%</td>
                </tr>
                <tr>
                    <td>December 2024</td>
                    <td>5,000 LKR</td>
                    <td>9,000 LKR</td>
                    <td>3,000 LKR</td>
                    <td class="status positive">5.2%</td>
                </tr>
                <tr>
                    <td>November 2024</td>
                    <td>3,000 LKR</td>
                    <td>4,500 LKR</td>
                    <td>4,500 LKR</td>
                    <td class="status negative">2.8%</td>
                </tr>
                <tr>
                    <td>October 2024</td>
                    <td>2,500 LKR</td>
                    <td>3,500 LKR</td>
                    <td>1,300 LKR</td>
                    <td class="status positive">3.1%</td>
                </tr>
                <tr>
                    <td>September 2024</td>
                    <td>7,500 LKR</td>
                    <td>8,200 LKR</td>
                    <td>3,600 LKR</td>
                    <td class="status negative">1.5%</td>
                </tr>
            </tbody>
        </table>
    </div>
        </div>

    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>