<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';
	
	$line_number = $_GET['number_'];
	#find routes and stops
	$sql = " SELECT * FROM routes where line_number = '$line_number' ";
	$routes = getObjects($connection,$sql);
	$routes_size = getObjectsSize($connection,$sql);

	#delete stops
	for($i=0;$i<$routes_size;$i++){
		$current_route = mysqli_fetch_assoc($routes);
		$route_name = $current_route['name'];

		$sql = "DELETE FROM stops WHERE _route_name = '$route_name'";
		mysqli_query($connection,$sql);
	}

 	#delete routes
 	$sql = " DELETE FROM routes WHERE line_number='$line_number' ";
 	mysqli_query($connection,$sql);

 	#delete lines
 	$sql = "DELETE FROM lines_ WHERE number_ = '$line_number' ";
 	mysqli_query($connection,$sql);

 	header("Location: ../manage_lines.php?delete=success");
 ?>