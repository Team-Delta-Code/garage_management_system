<?php
//start session
session_start();

//bypass login
//verify existing session
// if(isset($_SESSION['employee_id'])) {
// 	// echo "Welcome, user with ID: " . $_SESSION['employee_id'];
 	header("Location: dashboard.php");
// } else {
// 	// echo "Please Login";
// 	header("Location: login.php");
//     exit();
// }
?>