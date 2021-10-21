<?php 
	
	include_once 'database_connection.inc.php';

	
	
	// get variable value from the input text
	$input_registration = $_POST['registration'];



	//check the repeat registration
	$sql = "SELECT * FROM buses WHERE registration = '$input_registration'";
	$repeated_buses = mysqli_query($connection, $sql);
	$size_repeated_buses = mysqli_num_rows($repeated_buses);

	if( empty($input_registration) ){
		header("Location: ../add_buses.php?add=empty");
		exit();
	}

	else if($size_repeated_buses > 0){
		header("Location: ../add_buses.php?add=repeat");
		exit();
	}
 	
 
		//add bus to database if all previous information typed in is correct
	else{
		$sql = "INSERT INTO buses (registration) VALUES ('$input_registration');";
		mysqli_query($connection,$sql);
		header("Location: ../add_buses.php?add=success");
		exit();
	}
	

 ?>