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
                ⏲️<a href="dashboard.php">Home</a> > <a href="sales.php">Sales</a> > <a href="#">Today Sales</a>
            </div>
            <div>
                <a href="#" class="user-profile" onclick="toggleDropdown(event)">
                    <div class="user-avatar">SF</div>
                    <div class="user-name">Shank Fury</div>
                </a>
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="#">Profile</a>
                    <a href="#">Settings</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>

        <div class="dashboard-grid">
            <div class="report-header">
                <div class="metrics-grid">
                    <div class="metric-card">
                        <h2>Total Sales</h2>
                        <div class="metric-value">12,450 LKR</div>
                        <div class="metric-comparison">+15% vs yesterday</div>
                    </div>
                    <div class="metric-card">
                        <h2>Transactions</h2>
                        <div class="metric-value">28</div>
                        <div class="metric-comparison">+5 from yesterday</div>
                    </div>
                    <div class="metric-card">
                        <h2>Average Sale</h2>
                        <div class="metric-value">444.64 LKR</div>
                        <div class="metric-comparison">+8% vs yesterday</div>
                    </div>
                </div>

                <div class="transactions-section">
                    <h2>Recent Transactions</h2>
                    <table class="transactions-table">
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
                                <td>Oil Change + Brake Check</td>
                                <td>John Smith</td>
                                <td>180.00 LKR</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>13:15</td>
                                <td>Engine Tune-up</td>
                                <td>Sarah Johnson</td>
                                <td>350.00 LKR</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>11:45</td>
                                <td>Tire Replacement</td>
                                <td>Mike Brown</td>
                                <td>420.00 LKR</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="metric-grid">
                    <div class="metric-card">
                        <h1>Add New Record</h1>
                        <a href="#">
                            <div class="add-button">+</div>
                        </a>
                    </div>
                </div>
        </div>

    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>