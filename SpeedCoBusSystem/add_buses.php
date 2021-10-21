<?php
	include_once '_header.php'; 

 ?>
<a href="manage_buses.php">Back</a>
<!--use database to add buses-->
<body>

	<form align=center action = "includes/add_buses.inc.php" method="POST">
		<h4>Add buses here</h4>
		<br>
		<input type="text" name="registration" placeholder="registration">
		<br>
		<button type= "submit" name="signup">Add</button>
	</form>	

<?php 
		if(isset($_GET['add'])){
			if($_GET['add'] == "empty"){
				echo "<p  class='red' align=center>Error: Input cannot be empty</p>";
			}

			else if($_GET['add'] == "repeat"){
				echo "<p  class='red' align=center>Error: Already registered </p>";
			}


			else if($_GET['add'] == "success"){
				echo "<p  class='green' align=center>Adding bus successfully!</p>";
			}

		}


	 ?>



</body>