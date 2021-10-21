<?php 
//remove the assigned group
	include_once 'database_connection.inc.php';
	$id = $_GET['id'];
	$sql = "UPDATE buses SET group_id=NULL WHERE id='$id'";
	mysqli_query($connection,$sql);
	header("Location: ../assign_groups.php?remove=success");


 ?>