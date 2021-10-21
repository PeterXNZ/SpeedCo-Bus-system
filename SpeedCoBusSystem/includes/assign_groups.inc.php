<?php 
	include_once 'database_connection.inc.php';
	include_once 'instructor_assign_group';

	$accessCount = 0; 
$file = 'accessCount.txt'; 
if(file_exists($file)){ 
	$accessCount = file_get_contents($file); 
}
$accessCount++; 
file_put_contents($file, $accessCount); 
	
	$bus = $_GET['buses'];
	$string_bus = implode(", ",$bus);
	$array_bus = explode(", ", $string_bus);
	
	$line = $_GET['lines'];
	$string_line = implode(", ", $line);
	$array_line = explode(", ", $string_line);
	
// echo $string_employee;
// echo "<br>";
// echo $string_course;

   $j=0;
	$bus_size = count($array_bus);
	for($i=0;$i<$bus_size;$i++){
		$id = $array_bus[$i];
		$sql = "UPDATE buses SET group_id = $accessCount WHERE id = '$id'";
		mysqli_query($connection,$sql);
		$j++;
		
	}

	header("Location: ../assign_groups.php?assign=success");
 ?>