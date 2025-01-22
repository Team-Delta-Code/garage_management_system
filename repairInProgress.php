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
	<title>Repair In Progress | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css">

    <style type="text/css">
        .report-header {
            padding: 60px 40px;
            background: linear-gradient(to right, #1a237e, #3949ab);
            color: white;
            border-radius: 12px;
            margin-bottom: 30px;
        }

        .report-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 500;
        }

        .report-header p {
            margin: 10px 0 0 0;
            opacity: 0.8;
        }

        .metrics-grid {
            grid-gap: 25px;
        }

        .metric-card {
            background: linear-gradient(145deg, #ffffff, #f5f5f5);
            border: none;
            padding: 25px;
            border-radius: 12px;
            transition: transform 0.2s;
            cursor: pointer;
        }

        .metric-card:hover {
            background: #c9ecff;
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
            <li class="menu-item active">
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="repairVehicles.php">Repair Vehicles</a> > <a href="#">Repair In Progress</a>
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
                <h1>Vehicle Repairs in Progress</h1>
                <p>Overview of current repair operations</p>
                <br>
                <div class="metrics-grid">
                    <div class="metric-card" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <h2 style="color: #000; font-size: 18px; margin-bottom: 15px;">Active Repairs</h2>
                        <div class="metric-value" style="color: #1a237e; font-size: 32px; margin-bottom: 10px;">12</div>
                        <div class="metric-comparison" style="color: #28a745; display: flex; align-items: center; gap: 5px;">
                            <span style="font-size: 20px;">↑</span> 2 from last week
                        </div>
                    </div>
                    <div class="metric-card" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <h2 style="color: #000; font-size: 18px; margin-bottom: 15px;">Average Repair Time</h2>
                        <div class="metric-value" style="color: #1a237e; font-size: 32px; margin-bottom: 10px;">3.2 days</div>
                        <div class="metric-comparison" style="color: #dc3545; display: flex; align-items: center; gap: 5px;">
                            <span style="font-size: 20px;">↑</span> 0.5 days vs target
                        </div>
                    </div>
                    <div class="metric-card" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <h2 style="color: #000; font-size: 18px; margin-bottom: 15px;">Completion Rate</h2>
                        <div class="metric-value" style="color: #1a237e; font-size: 32px; margin-bottom: 10px;">94%</div>
                        <div class="metric-comparison" style="color: #28a745; display: flex; align-items: center; gap: 5px;">
                            <span style="font-size: 20px;">↑</span> 2% from last month
                        </div>
                    </div>
                </div>
            </div>

            <div class="transactions-section" style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                    <h2 style="font-size: 24px; color: #333; margin: 0;">Current Repairs</h2>
                    <button class="add-button" style="background: #1a237e; color: white; width: 48px; height: 48px; border-radius: 12px; font-size: 24px; transition: all 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">+</button>
                </div>
                
                <div style="overflow-x: auto;">
                    <table class="transactions-table" style="width: 100%; border-spacing: 0;">
                        <thead>
                            <tr style="background: #f8f9fa;">
                                <th style="padding: 16px; color: #666; font-weight: 500; border-bottom: 2px solid #eee; text-align: left;">Vehicle</th>
                                <th style="padding: 16px; color: #666; font-weight: 500; border-bottom: 2px solid #eee; text-align: left;">Customer</th>
                                <th style="padding: 16px; color: #666; font-weight: 500; border-bottom: 2px solid #eee; text-align: left;">Service Type</th>
                                <th style="padding: 16px; color: #666; font-weight: 500; border-bottom: 2px solid #eee; text-align: left;">Mechanic</th>
                                <th style="padding: 16px; color: #666; font-weight: 500; border-bottom: 2px solid #eee; text-align: left;">Start Date</th>
                                <th style="padding: 16px; color: #666; font-weight: 500; border-bottom: 2px solid #eee; text-align: left;">Est. Completion</th>
                                <th style="padding: 16px; color: #666; font-weight: 500; border-bottom: 2px solid #eee; text-align: left;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="transition: background 0.2s;" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='white'">
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">
                                    <div style="font-weight: 500; color: #333;">Toyota Camry</div>
                                    <div style="color: #666; font-size: 13px; margin-top: 4px;">KDE 234G</div>
                                </td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">John Smith</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Engine Overhaul</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Mike Johnson</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Jan 12, 2025</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Jan 15, 2025</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">
                                    <span style="background: #fff3e0; color: #f57c00; padding: 6px 12px; border-radius: 20px; font-size: 14px;">In Progress</span>
                                </td>
                            </tr>
                            <tr style="transition: background 0.2s;" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='white'">
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">
                                    <div style="font-weight: 500; color: #333;">Honda Civic</div>
                                    <div style="color: #666; font-size: 13px; margin-top: 4px;">KBZ 789H</div>
                                </td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Sarah Wilson</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Brake System</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Dave Miller</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Jan 13, 2025</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Jan 14, 2025</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">
                                    <span style="background: #fff3e0; color: #f57c00; padding: 6px 12px; border-radius: 20px; font-size: 14px;">In Progress</span>
                                </td>
                            </tr>
                            <tr style="transition: background 0.2s;" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='white'">
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">
                                    <div style="font-weight: 500; color: #333;">Nissan Altima</div>
                                    <div style="color: #666; font-size: 13px; margin-top: 4px;">KCA 567J</div>
                                </td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Robert Brown</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Transmission</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Chris Davis</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Jan 11, 2025</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">Jan 16, 2025</td>
                                <td style="padding: 16px; border-bottom: 1px solid #eee;">
                                    <span style="background: #e8f5e9; color: #28a745; padding: 6px 12px; border-radius: 20px; font-size: 14px;">Final Check</span>
                                </td>
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