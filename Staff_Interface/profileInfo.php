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
	<title>Profile Info | Ushan Motors</title>
	<link rel="stylesheet" type="text/css" href="styles/mainStyle.css">

    <style type="text/css">
        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-info {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .profile-label {
            font-weight: bold;
            color: #333;
        }

        .profile-value {
            color: #666;
        }

        .edit-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #1a237e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .edit-button:hover {
            background-color: #3f51b5;
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="settings.php">Settings</a> > <a href="#">Profile Info</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
            <div class="profile-container">
                <div class="profile-header">
                    <h2>Profile Information</h2>
                </div>
                <?php
                    $empId = $_SESSION['employee_id'];
                    $firstName = "";
                    $lastName = "";
                    $roleId = "";
                    $role = "";

                    //get all mechanics from the table
                    $stmt = $connect->prepare("SELECT `emp_first_name`, `emp_last_name`, `role_id`, `basic_salary` FROM employees WHERE `employee_id`='".$empId."' LIMIT 1;");
                    $stmt->execute();
                    $stmt->bind_result($firstName, $lastName, $roleId, $bsal);
                    // Initialize variables to hold the results
                    $results = [];
                    while ($stmt->fetch()) {
                        $results[] = [
                            'emp_first_name' => $firstName,
                            'emp_last_name' => $lastName,
                            'role_id' => $roleId,
                            'basic_salary' => $bsal
                        ];
                    }
                    $stmt->close();

                    if (empty($results)) {
                        $empId = "";
                        $firstName = "";
                        $lastName = "";
                        $roleId = "";
                        $bsal = "";
                    } else {
                        // If there are results, access them
                        foreach ($results as $result) {
                            $firstName = $result['emp_first_name'];
                            $lastName = $result['emp_last_name'];
                            $roleId = $result['role_id'];
                            if($roleId == "role_admin"){
                                $role = "System Administrator";
                            }else if($roleId == "role_mech"){
                                $role = "Mechanic";
                            }else if($roleId == "role_recep"){
                                $role = "Receptionist";
                            }else if($roleId == "role_mgr"){
                                $role = "Manager";
                            }else {
                                $role = "404: Role not found";
                            }
                            
                        }
                    }
                $name = $firstName." ".$lastName; // Example placeholder
                $designation = $role; // Example placeholder
                $salary = $bsal." LKR"; // Example placeholder
                ?>
                <div class="profile-info">
                    <div class="profile-label">Name:</div>
                    <div class="profile-value"><?php echo htmlspecialchars($name); ?></div>

                    <div class="profile-label">Designation:</div>
                    <div class="profile-value"><?php echo htmlspecialchars($designation); ?></div>

                    <div class="profile-label">Salary:</div>
                    <div class="profile-value"><?php echo htmlspecialchars($salary); ?></div>
                </div>

                <a href="editProfile.php" class="edit-button">Edit Profile</a>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="js/mainScript.js"></script>
</body>
</html>