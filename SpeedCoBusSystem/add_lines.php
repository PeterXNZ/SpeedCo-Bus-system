<?php
include_once '_header.php'; 
	//connect database
	include_once 'includes/database_connection.inc.php';
 ?>
 <!--use database to add lines-->
 <a href="manage_lines.php">Back</a>

 <div>
 	<h3 align="left">Create a new line here</h3>

 	<form align="left" action="includes/add_lines.inc.php" method="GET">
 		Line number: <input type="text" name="line_number">
 		<button>Add</button>
 		<p  class='blue' >(You will need to add route later)</p>
 	</form>

 </div>