<?php 

	include 'database_connection.inc.php';

	$delete_bus_id = $_POST['delete'];

	$sql = "DELETE FROM buses WHERE id ='$delete_bus_id';";
	mysqli_query($connection,$sql);
	header("Location: ../manage_buses.php?delete=success");
	exit();
 ?>