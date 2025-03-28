<?php
include('main/sessionChecker.php');
include('main/functions.php');

// Initialize variables
$error_message = '';
$success_message = '';

$user_id = $_SESSION['employee_id'];

// Process password change
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate form inputs
    $oldPsw = $_POST['oldPsw'] ?? '';
    $newPsw = $_POST['newPsw'] ?? '';
    $confirmPsw = $_POST['confirmPsw'] ?? '';

    // Basic validation
    if (empty($oldPsw) || empty($newPsw) || empty($confirmPsw)) {
        $error_message = "All fields are required.";
    } elseif ($newPsw !== $confirmPsw) {
        $error_message = "New passwords do not match.";
    } elseif (strlen($newPsw) < 8) {
        $error_message = "New password must be at least 8 characters long.";
    } else {
        // Check database connection
        if (!$connect) {
            $error_message = "Database connection failed: " . mysqli_connect_error();
        } else {
            // Fetch the current password for verification
            $stmt = $connect->prepare("SELECT `password` FROM system_access_control WHERE `employee_id` = ?");
            $stmt->bind_param("s", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($row = $result->fetch_assoc()) {
                // Verify current password using custom verification method
                if (passwordVerify($oldPsw, $row['password'])) {
                    // Hash new password using custom hashing method
                    $hashedNewPsw = simple_hash($newPsw);
                    
                    // Update password in database
                    $updateStmt = $connect->prepare("UPDATE system_access_control SET `password` = ? WHERE `employee_id` = ?");
                    $updateStmt->bind_param("ss", $hashedNewPsw, $user_id);
                    
                    if ($updateStmt->execute()) {
                        $success_message = "Password changed successfully!";
                    } else {
                        $error_message = "Failed to update password. Please try again.";
                    }
                    
                    $updateStmt->close();
                } else {
                    $error_message = "Current password is incorrect.";
                }
            } else {
                $error_message = "User not found.";
            }
            
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Team Delta Code">
    <title>Change Password | Ushan Motors</title>
    <link rel="stylesheet" type="text/css" href="styles/mainStyle.css">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .password-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }
        .password-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .password-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .password-container button {
            width: 100%;
            padding: 10px;
            background-color: #280aed;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .password-container button:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 15px;
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="settings.php">Settings</a> > <a href="#">Change Password</a>
            </div>
            <?php include('profile_icon.php') ?>
        </div>

        <div class="dashboard-grid">
            <div class="password-container">
                <h2>Change Password</h2>
                
                <?php if (!empty($error_message)): ?>
                    <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
                <?php endif; ?>
                
                <?php if (!empty($success_message)): ?>
                    <div class="success-message"><?php echo htmlspecialchars($success_message); ?></div>
                <?php endif; ?>
                
                <form action="changePassword.php" method="POST">
                    <input type="password" name="oldPsw" placeholder="Current Password" required>
                    <input type="password" name="newPsw" placeholder="New Password" required>
                    <input type="password" name="confirmPsw" placeholder="Confirm New Password" required>
                    <button type="submit">Change Password</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>