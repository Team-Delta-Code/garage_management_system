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
	<title>Completed Repairs | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css">

    <style type="text/css">
        .report-header {
            padding: 20px;
        }

        .main {
            flex-grow: 1;
            padding: 50px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
            background-color: #fff;
        }

        .table th, .table td {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .table th {
            background-color:rgb(244, 244, 244);
        }

    </style>


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
            <li class="menu-item  active">
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="repairVehicles.php">Repair Vehicles</a> > <a href="#">Completed Repairs</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
            <div class="main">
                <div class="main-header">
                    <h2>Completed Vehicle Repairs</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Vehicle Number</th>
                                <th>Owner Name</th>
                                <th>Contact Number</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ABC-456</td>
                                <td>Nipun Sanjeewa</td>
                                <td>0711234567</td>
                                <td>4,500 LKR</td>
                            </tr>
                            <tr>
                                <td>QQ-8243</td>
                                <td>Janith Lanarol</td>
                                <td>0789876543</td>
                                <td>8,000 LKR</td>
                            </tr>
                            <tr>
                                <td>BBl-3486</td>
                                <td>Janaka Bandara </td>
                                <td>0119876567</td>
                                <td>2950 LKR</td>
                            </tr>
                            <tr>
                                <td>AAQ-0087</td>
                                <td>Disira Vimarsana </td>
                                <td>0757935284</td>
                                <td>7100 LKR</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>
