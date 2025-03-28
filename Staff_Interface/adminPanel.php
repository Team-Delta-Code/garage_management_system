<?php
    include("main/sessionChecker.php");
    include("main/userManagement.php");

    // Handle form submissions
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['action']) && $_POST['action'] == 'add_user') {
            $result = addNewUser(
                $_POST['first_name'], 
                $_POST['last_name'], 
                $_POST['role'], 
                $_POST['salary'],
                $_POST['userPwd']
            );
            $message = $result['message'];
        }

        if (isset($_POST['action']) && $_POST['action'] == 'remove_user') {
            $result = removeUser(
                $_POST['employee_id'], 
                $_POST['confirm_employee_id']
            );
            $message = $result['message'];
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Team Delta Code">
    <title>Admin Panel | Ushan Motors</title>
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
            gap: 10px;
            margin: 10px 0;
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
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin: 1px 0 5px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            width: 50%;
            background:rgb(32, 93, 206);
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background:rgb(34, 41, 45);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            width: 100%;
            background:rgb(41, 36, 190);
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background:rgb(37, 62, 225); 
        }
            h2 {
            margin-bottom: 20px;
        }
        .btn {
            display: block;
            width: 100%;
            background: #0056b3;
            color: white;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn:hover {
            background: #0056b3;
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
                ⏲️<a href="dashboard.php">Home</a> > <a href="settings.php">Settings</a> > <a href="#">Admin Panel</a>
            </div>
            <?php include('profile_icon.php'); ?>
        </div>

        <div class="dashboard-grid">
            <?php if (isset($message)): ?>
                <div class="message">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <div class="main">
                <div class="cards">
                    <div class="card">
                        <?php echo "<div class='user-avatar'>".$firstName[0].$lastName[0]."</div><div class='user-name'>".$firstName." ".$lastName."</div>"
                        ?>
                        <span style="font-size: 14px;">Position: <?php echo $role; ?></span>
                        <br><br><br><br><br><br>
                        <ul class="settings">
                            <class="item"><h2 style="color: darkblue;">Admin Panel</h2></class="item">
                        </ul>
                    </div> 
                   
                    

                
                    <!-- <div class="card">
                        <ul class="settings">
                            <class="item"><a href="#"><h2>Admin Panel</h2></a>
                                          <a href="add_user.html" class="btn">Add User</a>
                                          <a href="remove_user.html" class="btn">Remove User</a>
                    </div> -->


                    <div class="card">
                        <ul class="settings">
                            <class="item"><h2 style="color: darkblue;">Add User</h2>
                                 <form method="POST">
                                     <input type="hidden" name="action" value="add_user">
                                     <label for="first_name">First Name</label>
                                     <input type="text" id="first_name" name="first_name" required>

                                     <label for="last_name">Last Name</label>
                                     <input type="text" id="last_name" name="last_name" required>

                                     <label for="role">Choose Role</label>
                                     <select id="role" name="role" required>
                                           <option value="admin">Admin</option>
                                           <option value="manager">Manager</option>
                                           <option value="receptionist">Receptionist</option>
                                           <option value="mechanic">Mechanic</option>
                                     </select>

                                     <label for="salary">Basic Salary</label>
                                     <input type="number" id="salary" name="salary" required>

                                     <label for="userPwd">Password</label>
                                     <input type="text" id="userPwd" name="userPwd">

                                     <button type="submit" class="btn">Submit</button>
                                 </form>
                        </ul>
                        </div>


                        <div class="card">
                        <ul class="settings">
                            <class="item"><h2 style="color: darkblue;">Remove User</h2>
                            <form method="POST">
                               <input type="hidden" name="action" value="remove_user">
                               <label for="employee_id">Employee ID</label>
                               <input type="text" id="employee_id" name="employee_id" required>

                               <label for="confirm_employee_id">Employee ID Again</label>
                               <input type="text" id="confirm_employee_id" name="confirm_employee_id" required>

                               <button type="submit" class="btn">Delete</button>
                             </form>
                        
                         </div>
                
            </div>
        </div>

    </main>

</body>
</html>