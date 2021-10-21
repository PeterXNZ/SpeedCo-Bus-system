<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';

	

	if(empty($_GET['route_name']) || empty($_GET['route_direction'])){
		header("Location: ../add_routes.php?add=empty");
		exit();
	}
	
	session_start();
	$new_mother_name = $_SESSION['mother_name'];
	$new_route_name = $_GET['route_name'];
	$new_route_direction = $_GET['route_direction'];

	#check if there are repeated  names alredy in database
	$sql = "SELECT * FROM routes WHERE name = '$new_route_name'";
	if(getObjectsSize($connection, $sql) > 0){
		header("Location: ../add_routes.php?add=repeat");
		exit();
	}

	else{
		$sql = "INSERT INTO routes (_line_number, name, direction) VALUES('$new_mother_name', '$new_route_name', '$new_route_direction ')";
		mysqli_query($connection,$sql);
		header("Location: ../manage_lines.php?add=success");
	}
 ?>