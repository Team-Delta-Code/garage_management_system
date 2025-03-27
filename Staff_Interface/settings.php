<?php
    include("main/sessionChecker.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Team Delta Code">
    <title>Settings | Ushan Motors</title>
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
            width: 100%;
        }

        .settings {
            text-align: left;
            text-decoration: none;
        }

        .settings.item a {
            text-decoration: none;
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="#">Settings</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
            <div class="main">
                <div class="cards">
                    <div class="card">
                        <?php echo "<div class='user-avatar'>".$firstName[0].$lastName[0]."</div><div class='user-name'>".$firstName." ".$lastName."</div>"
                        ?>
                        <span style="font-size: 14px;">Position: <?php echo $role; ?></span>
                    </div>
                    <div class="card">
                        <ul class="settings">
                            <li class="item"><a href="#">Profile Info</a></li>
                            <li class="item"><a href="#">Change Password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </main>

</body>
</html>