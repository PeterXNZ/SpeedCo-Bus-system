<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';
	
	$route_name = $_GET['name'];
	//delete related stops

	$sql = "DELETE FROM stops WHERE _route_name = '$route_name'";
	mysqli_query($connection,$sql);
 //delete routes
	$sql = "DELETE FROM routes WHERE name = '$route_name'";
	mysqli_query($connection,$sql);

	header("Location: ../manage_lines.php?delete=success");

 ?>