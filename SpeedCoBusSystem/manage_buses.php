<?php
include_once '_header.php'; 
	include_once 'includes/database_connection.inc.php';
 ?>
 <a href="index.php">Back</a>
 <br>
 <body><!--below are for showing buses information in the form of a table-->
 	<table>
		<tr>
			<th>ID</th>
			<th>registration</th>
		</tr>

		<?php
			$sql = "SELECT * FROM buses";
			$selected_buses = mysqli_query($connection, $sql);
			$size_selected = mysqli_num_rows($selected_buses);

			for($i=0;$i<$size_selected;$i++){
				$next_bus =  mysqli_fetch_assoc($selected_buses);
				echo "<tr><th>".$next_bus['id']."</th><th>".$next_bus['registration']."</th><th><form action='includes/delete_buses.inc.php' method = 'POST'><button name='delete' value=".$next_bus['id'].">Delete</button></form></th></tr>";
				
			}

	 	?>
	</table>

	<br>
	<form align = "left" action="add_buses.php">
		<button>Add Bus</button>

		<br>
		<br>
	<?php 
		if(isset($_GET['delete'])){
			if($_GET['delete'] == "success"){
				echo "<p class='green' align=center>Deleting bus successfully!</p>";
			}
		}

	 ?>

	</form>

</body>