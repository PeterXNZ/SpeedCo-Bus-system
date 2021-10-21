<?php
	session_start();
include_once '_header.php'; 
	//connect database
	include_once 'includes/database_connection.inc.php';

	#set mother name to session
	if(isset($_GET['_line_number'])){
		$_SESSION['mother_name'] = $_GET['_line_number'];
	}
	
 ?>
  <!--use database to add routes-->
 <a href="manage_lines.php">Back</a>

 <div>
 	<h3 align="left">Create a new route here</h3>

 	<form align="left" type='hidden' action="includes/add_routes.inc.php"  method="GET">
 		<p>name </p>
 		<input size="35" type="text" name="route_name">
 		<p>direction</p>
 		<input size="50" type="text" name="route_direction">
 		<br>
 		<br>
 		<button>Add</button>

 		<p  class='blue' >(You will need to add stop later)</p>
 	</form>

 </div>