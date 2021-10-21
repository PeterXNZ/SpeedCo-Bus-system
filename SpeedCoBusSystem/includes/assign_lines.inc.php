<?php 
	include_once 'database_connection.inc.php';

	
	$bus = $_GET['buses'];
	$string_bus = implode(", ",$bus);
	$array_bus = explode(", ", $string_bus);
	$result = mysqli_query("SELECT * FROM _buses WHERE group_id=$bus", $connection);
	$num_rows = mysqli_num_rows($result);
	$line = $_GET['lines'];
	$string_line = implode(", ", $line);
	$array_line = explode(", ", $string_line);

echo $num_rows;


	$bus_size = count($array_bus);

		
		
	for($i=0;$i<$bus_size;$i++){
		$id = $array_bus[$i];
		$sql = "UPDATE buses SET assigned_lines = '$string_line' WHERE group_id = '$bus[0]'";
		mysqli_query($connection,$sql);
		$j++;
		
	}

	header("Location: ../assign_lines.php?assign=$bus_size");
 ?>