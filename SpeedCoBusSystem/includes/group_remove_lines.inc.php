<?php 
//remove assigned lines
	include_once 'database_connection.inc.php';
	$groupid = $_GET['id'];
	$sql1 = "SELECT group_id FROM buses WHERE id='$groupid'";
	$t=mysqli_query($connection,$sql1);
	$x=mysqli_fetch_array($t);
	$sql = "UPDATE buses SET assigned_lines=NULL WHERE group_id='$x[0]'";
	mysqli_query($connection,$sql);
	header("Location: ../assign_lines.php?remove=$x[0]");


 ?>