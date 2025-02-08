<?php
// Start session
session_start();

//bypass login

// Verify existing session using a not clause
// if (!isset($_SESSION['employee_id'])) {
//     // If the session does not exist, redirect to the login page
//     header("Location: login.php");
//     exit();
// }

//database connection
include('main/connect.php');
?>