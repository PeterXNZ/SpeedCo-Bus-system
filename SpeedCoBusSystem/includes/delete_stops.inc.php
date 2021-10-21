<?php 
	include_once 'database_connection.inc.php';
	
	$id = $_GET['id'];
	$sql =" DELETE FROM stops WHERE id='$id'  ";
	mysqli_query($connection,$sql);

	header("Location: ../manage_lines.php?delete=success");

 ?>