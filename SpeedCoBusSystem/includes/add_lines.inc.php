<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';

	if(empty($_GET['line_number'])){
		header("Location: ../add_lines.php?add=empty");
		exit();
	}

	
	$new_line = $_GET['line_number'];

	$sql = "SELECT * FROM lines_ WHERE name = '$new_line'";



	if(getObjectsSize($connection, $sql) > 0){
		header("Location: ../add_lines.php?add=repeat");
		exit();
	}

	else{
		$sql = "INSERT INTO lines_(number_) VALUES ('$new_line') ";
		mysqli_query($connection,$sql);
		header("Location: ../manage_lines.php?add=success");
	}
 ?>