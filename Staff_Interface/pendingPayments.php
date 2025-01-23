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
	<title>Pending Payments | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css">

    <style>
.payments-summary {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.summary-card {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.summary-card h3 {
    margin: 0;
    color: #666;
    font-size: 14px;
    text-transform: uppercase;
}

.summary-card .amount {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin: 10px 0;
}

.summary-card .subtitle {
    font-size: 14px;
    color: #666;
}

.payments-table {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    overflow: hidden;
}

.table-actions {
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #eee;
}

.search-box {
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 250px;
}

.filter-button {
    padding: 8px 15px;
    background: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 4px;
    cursor: pointer;
}

.payments-table table {
    width: 100%;
    border-collapse: collapse;
}

.payments-table th,
.payments-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

.payments-table th {
    background: #f8f9fa;
    font-weight: 600;
    color: #666;
}

.status-pill {
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 500;
}

.status-overdue {
    background: #ffebee;
    color: #c62828;
}

.status-pending {
    background: #fff3e0;
    color: #ef6c00;
}

.status-partial {
    background: #e3f2fd;
    color: #1565c0;
}

.action-button {
    padding: 6px 12px;
    border-radius: 4px;
    border: none;
    background: #1976d2;
    color: white;
    cursor: pointer;
    font-size: 12px;
}

.action-button:hover {
    background: #1565c0;
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="sales.php">Sales</a> > <a href="#">Pending Payments</a>
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
            <div class="payments-summary">
                <div class="summary-card">
                    <h3>Total Pending Amount</h3>
                    <div class="amount">47,890 LKR</div>
                    <div class="subtitle">From 23 invoices</div>
                </div>
                <div class="summary-card">
                    <h3>Overdue Payments</h3>
                    <div class="amount">12,450 LKR</div>
                    <div class="subtitle">8 invoices overdue</div>
                </div>
                <div class="summary-card">
                    <h3>Due This Week</h3>
                    <div class="amount">15,780 LKR</div>
                    <div class="subtitle">6 upcoming payments</div>
                </div>
            </div>

            <div class="payments-table">
                <div class="table-actions">
                    <input type="text" placeholder="Search by customer or invoice..." class="search-box">
                    <button class="filter-button">Filter ⌄</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Customer</th>
                            <th>Service Type</th>
                            <th>Amount</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>INV-2025-001</td>
                            <td>John Smith</td>
                            <td>Engine Repair</td>
                            <td>2,450 LKR</td>
                            <td>15 Jan 2025</td>
                            <td><span class="status-pill status-overdue">Overdue</span></td>
                            <td><button class="action-button">Send Reminder</button></td>
                        </tr>
                        <tr>
                            <td>INV-2025-002</td>
                            <td>Sarah Johnson</td>
                            <td>Full Service</td>
                            <td>3,780 LKR</td>
                            <td>18 Jan 2025</td>
                            <td><span class="status-pill status-pending">Pending</span></td>
                            <td><button class="action-button">Send Reminder</button></td>
                        </tr>
                        <tr>
                            <td>INV-2025-003</td>
                            <td>Mike Wilson</td>
                            <td>Brake System</td>
                            <td>1,890 LKR</td>
                            <td>20 Jan 2025</td>
                            <td><span class="status-pill status-partial">Partial Paid</span></td>
                            <td><button class="action-button">View Details</button></td>
                        </tr>
                        <tr>
                            <td>INV-2025-004</td>
                            <td>Emma Davis</td>
                            <td>Transmission</td>
                            <td>4,250 LKR</td>
                            <td>22 Jan 2025</td>
                            <td><span class="status-pill status-pending">Pending</span></td>
                            <td><button class="action-button">Send Reminder</button></td>
                        </tr>
                        <tr>
                            <td>INV-2025-005</td>
                            <td>Robert Brown</td>
                            <td>Oil Change</td>
                            <td>890 LKR</td>
                            <td>25 Jan 2025</td>
                            <td><span class="status-pill status-pending">Pending</span></td>
                            <td><button class="action-button">Send Reminder</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>