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
	<title>Mechanics On Leave | Ushan Motors</title>
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
            background-color: rgba(0, 0, 0, 0.1);
            color: black;
        }
        .leave-header {
            text-align: center;
            font-size: 16px;
            margin-bottom: 20px;s
            color: black;
            display: flex;
            flex-direction:column;
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
            <li class="menu-item active">
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="mechanics.php">Mechanics</a> > <a href="#">Mechanics On Leave</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
                <div class="main-header">
                    <div class="leave-header">
                        <h1>Mechanics On Leave</h1>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Member Name</th>
                                <th>Leave Start Date</th>
                                <th>Leave End Date</th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Amal Perera</td>
                                <td>2025-01-25</td>
                                <td>2025-01-27</td>
                                <td>Personal Emergency</td>
                            </tr>
                           
                            <tr>
                                <td>Damith Kamal</td>
                                <td>2025-01-27</td>
                                <td>2025-01-30</td>
                                <td>Vacation</td>
                            </tr>
                            <tr>
                                <td>Emil  Davis</td>
                                <td>2025-01-28</td>
                                <td>2025-02-01</td>
                                <td>Personal Reasons</td>
                            </tr>
                            <tr>
                                <td>Janidu sithum</td>
                                <td>2025-01-30</td>
                                <td>2025-02-02</td>
                                <td>Medical Procedure</td>
                            </tr>
                            <tr>
                                <td>Arn Kavi</td>
                                <td>2025-01-29</td>
                                <td>2025-02-01</td>
                                <td>Personal Leave</td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>