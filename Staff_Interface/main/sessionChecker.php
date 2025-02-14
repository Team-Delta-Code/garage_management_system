<?php
// Start session
session_start();

//cache control headers
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Verify existing session using a not clause
if (!isset($_SESSION['employee_id'])) {
    // If the session does not exist, redirect to the login page
    header("Location: login.php");
    exit();
}

//database connection
include('main/connect.php');
?>