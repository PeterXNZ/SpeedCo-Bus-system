<?php 
	include_once 'database_connection.inc.php';

	
	$bus = $_GET['buses'];
	$string_bus = implode(", ",$bus);
	$array_bus = explode(", ", $string_bus);
	$result = mysqli_query("SELECT * FROM _buses WHERE group_id=$bus", $connection);
	$num_rows = mysqli_num_rows($result);
	$time = $_GET['time'];
	$string_time = implode(", ", $time);
	$array_time = explode(", ", $string_time);
	
// echo $string_employee;
// echo "<br>";
echo $num_rows;


	$bus_size = count($array_bus);

		
		//$sql = "UPDATE users SET required_courses = '$string_course' WHERE group_id = '$employee'";
		//mysqli_query($connection,$sql);
	//mysqli_query($connection,"UPDATE users SET required_courses = '$string_course' WHERE group_id = '$employee'");
	for($i=0;$i<$bus_size;$i++){
		$id = $array_bus[$i];
		$sql = "UPDATE buses SET assigned_time = '$string_time' WHERE group_id = '$bus[0]'";
		mysqli_query($connection,$sql);
		$j++;
		
	}

	header("Location: ../assign_time.php?assign=$bus_size");
 ?>