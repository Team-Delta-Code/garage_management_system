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
	<title>Service Sales | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css">

    <style>
.stats-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.stat-card h3 {
    margin: 0 0 10px 0;
    color: #666;
    font-size: 14px;
    text-transform: uppercase;
}

.stat-card .value {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

.stat-card .trend {
    color: #28a745;
    font-size: 14px;
    margin-top: 5px;
}

.trend.negative {
    color: #dc3545;
}

.sales-table-container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    overflow-x: auto;
}

.sales-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.sales-table th, .sales-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.sales-table th {
    background-color: #f8f9fa;
    font-weight: 600;
    color: #666;
}

.sales-table tr:hover {
    background-color: #f5f5f5;
}

.status-badge {
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
}

.status-completed {
    background-color: #e8f5e9;
    color: #28a745;
}

.status-pending {
    background-color: #fff3e0;
    color: #f57c00;
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="sales.php">Sales</a> > <a href="#">Service Sales</a>
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
            <div class="stats-container">
                <div class="stat-card">
                    <h3>Today's Service Sales</h3>
                    <div class="value">2,845 LKR</div>
                    <div class="trend">↑ 12% vs yesterday</div>
                </div>
                <div class="stat-card">
                    <h3>Monthly Service Sales</h3>
                    <div class="value">45,672 LKR</div>
                    <div class="trend">↑ 8% vs last month</div>
                </div>
                <div class="stat-card">
                    <h3>Services Completed</h3>
                    <div class="value">24</div>
                    <div class="trend">↑ 4 more than yesterday</div>
                </div>
                <div class="stat-card">
                    <h3>Average Service Value</h3>
                    <div class="value">$118</div>
                    <div class="trend negative">↓ 3% vs last week</div>
                </div>
            </div>

            <div class="sales-table-container">
                <h2>Recent Service Sales</h2>
                <table class="sales-table">
                    <thead>
                        <tr>
                            <th>Service ID</th>
                            <th>Customer</th>
                            <th>Service Type</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#SRV001</td>
                            <td>John Smith</td>
                            <td>Oil Change</td>
                            <td>45.00 LKR</td>
                            <td>2025-01-14</td>
                            <td><span class="status-badge status-completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>#SRV002</td>
                            <td>Sarah Johnson</td>
                            <td>Brake Service</td>
                            <td>225.00 LKR</td>
                            <td>2025-01-14</td>
                            <td><span class="status-badge status-completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>#SRV003</td>
                            <td>Mike Brown</td>
                            <td>Tire Rotation</td>
                            <td>80.00 LKR</td>
                            <td>2025-01-14</td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>#SRV004</td>
                            <td>Emily Davis</td>
                            <td>Engine Tune-up</td>
                            <td>350.00 LKR</td>
                            <td>2025-01-13</td>
                            <td><span class="status-badge status-completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>#SRV005</td>
                            <td>Robert Wilson</td>
                            <td>AC Service</td>
                            <td>195.00 LKR</td>
                            <td>2025-01-13</td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>