<?php 

	$dbServername = "localhost";	//fixed unless switch to online server
	$dbUsername = "root";		//fixed unless switch to online server
	$dbPassword = "";			//fixed unless switch to online server
	$dbName = "speedco_bus_system";				//the exactly same name we created on phpmyadmin

	$connection = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
 ?>