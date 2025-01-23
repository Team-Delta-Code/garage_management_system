<?php

	//database credentials
	$localhost = "localhost";
	$username = "root";
	$password = "";
	$dbname = "garage_database";

	//db connection
	$connect = new mysqli($localhost, $username, $password, $dbname);

	//check connection
	if($connect->connect_error){
		die("connection failed: ".$connect->connect_error);
	} else {
		//echo "connection success";
	}
?>