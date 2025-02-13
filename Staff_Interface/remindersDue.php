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
	<title>Reminders Due | Ushan Motors</title>
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="reminders.php">Reminders</a> > <a href="#">Reminders Due</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
            
        <div class="transactions-section reminders-section">
    <div class="section-header">
        <h2>Reminders Due</h2>
        <button class="add-button" title="Add New Reminder">+</button>
    </div>
    <table class="transactions-table reminders-table">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Vehicle</th>
                <th>Reminder Type</th>
                <th>Due Date</th>
                <th>Days Left</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>Toyota Camry</td>
                <td>Oil Change</td>
                <td>Feb 10, 2024</td>
                <td><span class="days-left urgent">5 days</span></td>
                <td><span class="status pending">Pending</span></td>
                <td>
                    <button class="action-btn" title="Call Customer">📞</button>
                    <button class="action-btn" title="Edit Reminder">📝</button>
                </td>
            </tr>
            <tr>
                <td>Sarah Smith</td>
                <td>Honda Civic</td>
                <td>Tire Rotation</td>
                <td>Feb 15, 2024</td>
                <td><span class="days-left warning">10 days</span></td>
                <td><span class="status pending">Pending</span></td>
                <td>
                    <button class="action-btn" title="Call Customer">📞</button>
                    <button class="action-btn" title="Edit Reminder">📝</button>
                </td>
            </tr>
            <tr>
                <td>Mike Johnson</td>
                <td>Ford F-150</td>
                <td>Annual Service</td>
                <td>Feb 20, 2024</td>
                <td><span class="days-left normal">15 days</span></td>
                <td><span class="status pending">Pending</span></td>
                <td>
                    <button class="action-btn" title="Call Customer">📞</button>
                    <button class="action-btn" title="Edit Reminder">📝</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<style type="text/css">
    .reminders-section {
        margin-top: 20px;
    }
    .days-left {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: bold;
    }
    .days-left.urgent {
        background: #ffebee;
        color: #d32f2f;
    }
    .days-left.warning {
        background: #fff3e0;
        color: #f57c00;
    }
    .days-left.normal {
        background: #e8f5e9;
        color: #388e3c;
    }
    .reminders-table tr:hover {
        background-color: #f5f5f5;
        transition: background-color 0.3s ease;
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
</style>


<!-- Add these styles to the existing <style> section -->
<style type="text/css">
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
        </div>

    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>