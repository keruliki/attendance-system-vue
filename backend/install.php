<?php
	//Connect to database
    $servername = "localhost";
    $username = "root";		//put your phpmyadmin username.(default is "root")
    $password = "";			//if your phpmyadmin has a password put it here.(default is "root")
    $dbname = "";
    
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Create database
	$sql = "CREATE DATABASE biometricattendace";
	if ($conn->query($sql) === TRUE) {
	    echo "Database created successfully";
	} else {
	    echo "Error creating database: " . $conn->error;
	}

	echo "<br>";

	$dbname = "biometricattendace";
    
	$conn = new mysqli($servername, $username, $password, $dbname);

	// sql to create table
	$sql = "CREATE TABLE IF NOT EXISTS `users` (
			`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`username` varchar(100) NULL,
			`serialnumber` double NULL,
			`gender` varchar(10) NULL,
			`email` varchar(50) NULL,
			`fingerprint_id` int(11) NULL,
			`fingerprint_select` tinyint(1) NULL DEFAULT '0',
			`user_date` date NULL,
			`time_in` time NULL,
			`del_fingerid` tinyint(1) NULL DEFAULT '0',
			`add_fingerid` tinyint(1) NULL DEFAULT '0'
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	if ($conn->query($sql) === TRUE) {
	    echo "Table users created successfully";
	} else {
	    echo "Error creating table: " . $conn->error;
	}

	$sql = "CREATE TABLE IF NOT EXISTS `users_logs` (
			`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`username` varchar(100) NULL,
			`serialnumber` double NULL,
			`fingerprint_id` int(5) NULL,
			`checkindate` date NULL,
			`timein` time NULL,
			`timeout` time NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	if ($conn->query($sql) === TRUE) {
	    echo "Table users_logs created successfully";
	} else {
	    echo "Error creating table: " . $conn->error;
	}
		
	$conn->close();
?>