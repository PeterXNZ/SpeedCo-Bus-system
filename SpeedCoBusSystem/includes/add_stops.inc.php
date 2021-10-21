<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';


	session_start();

	$new_mother_name = $_SESSION['_mother_name'];
	$new_code = $_GET['code'];
	
	if(empty($new_code) ){
		header("Location: ../manage_lines.php?add=empty");
		exit();
	}

	else{
		$sql = " INSERT INTO stops( _route_name,  code) VALUES ('$new_mother_name', '$new_code') ";
		mysqli_query($connection,$sql);
		header("Location: ../manage_lines.php?add=success");
		}
		
	
 ?>