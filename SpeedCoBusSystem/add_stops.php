<?php
include_once '_header.php'; 
		
	//connect database
	include_once 'includes/database_connection.inc.php';
		#set mother name to session
	$_SESSION['_mother_name'] = $_GET['_route_name'];
	
	

 ?>
  <!--use database to add stops-->
 <a href="manage_lines.php">Back</a>

 <div>
 	<h3 align="left">Create a new stop here</h3>

 	<form align="left" action="includes/add_stops.inc.php" type="hidden" method="GET">
 		Code:<input size="40" type="text" name="code"><br><br>
 		



 		<br><br>
 		<button>Add</button>

 		
 	</form>

 </div>