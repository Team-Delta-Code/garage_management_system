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

    <style>
.revenue-summary {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.revenue-card {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.revenue-card h3 {
    margin: 0;
    color: #666;
    font-size: 14px;
    text-transform: uppercase;
}

.revenue-card .amount {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin: 10px 0;
}

.revenue-card .trend {
    font-size: 14px;
    color: #28a745;
}

.revenue-card .trend.negative {
    color: #dc3545;
}

.revenue-table {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    overflow: hidden;
}

.revenue-table table {
    width: 100%;
    border-collapse: collapse;
}

.revenue-table th, 
.revenue-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

.revenue-table th {
    background: #f8f9fa;
    font-weight: 600;
    color: #666;
}

.revenue-table tr:last-child td {
    border-bottom: none;
}

.status-badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 12px;
}

.status-increase {
    background: #e8f5e9;
    color: #2e7d32;
}

.status-decrease {
    background: #ffebee;
    color: #c62828;
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
            <div class="revenue-summary">
                <div class="revenue-card">
                    <h3>Total Revenue (YTD)</h3>
                    <div class="amount">842,589 LKR</div>
                    <div class="trend">↑ 12.5% vs Last Year</div>
                </div>
                <div class="revenue-card">
                    <h3>This Month</h3>
                    <div class="amount">97,245 LKR</div>
                    <div class="trend">↑ 8.3% vs Last Month</div>
                </div>
                <div class="revenue-card">
                    <h3>Average Monthly Revenue</h3>
                    <div class="amount">84,258 LKR</div>
                    <div class="trend negative">↓ 2.1% vs Last Quarter</div>
                </div>
            </div>

            <div class="revenue-table" style="width: 100%;">
                <table>
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
                            <td>97,245 LKR</td>
                            <td>45,890 LKR</td>
                            <td>51,355 LKR</td>
                            <td><span class="status-badge status-increase">↑ 8.3%</span></td>
                        </tr>
                        <tr>
                            <td>December 2024</td>
                            <td>89,780 LKR</td>
                            <td>42,350 LKR</td>
                            <td>47,430 LKR</td>
                            <td><span class="status-badge status-increase">↑ 5.2%</span></td>
                        </tr>
                        <tr>
                            <td>November 2024</td>
                            <td>85,340 LKR</td>
                            <td>38,900 LKR</td>
                            <td>46,440 LKR</td>
                            <td><span class="status-badge status-decrease">↓ 2.8%</span></td>
                        </tr>
                        <tr>
                            <td>October 2024</td>
                            <td>87,800 LKR</td>
                            <td>41,200 LKR</td>
                            <td>46,600 LKR</td>
                            <td><span class="status-badge status-increase">↑ 3.1%</span></td>
                        </tr>
                        <tr>
                            <td>September 2024</td>
                            <td>85,150 LKR</td>
                            <td>39,750 LKR</td>
                            <td>45,400 LKR</td>
                            <td><span class="status-badge status-decrease">↓ 1.5%</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>