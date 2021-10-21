<?php
	include_once '_header.php'; 
	include_once 'includes/_functions.inc.php';

	//connect database
	include_once 'includes/database_connection.inc.php';
 ?>
 <a href="index.php">Back</a>
 
 <form action="includes/assign_lines.inc.php" method="GET">
 	
 	<h4>Group id:</h4>
 	<?php 
 		#print all employees in checkbox form
 		$sql = "SELECT * FROM buses ";
 		$buses = getObjects($connection,$sql);
 		$buses_size = getObjectsSize($connection,$sql);
 		$groupid = array();

 		for($i=0;$i<$buses_size;$i++){
 			$current_bus = mysqli_fetch_assoc($buses);
 			if(empty($current_employee['assigned_lines'])){
 				array_push($groupid, $current_bus['group_id']);

 				//echo " <input type='checkbox' name='employees[]' value=".$current_employee['id'].">".$current_employee['group_id'];
 			}
 			
 		}
 			
 			$groupid=array_unique($groupid);
 			$groupid=array_values($groupid);
 			//print_r($groupid);
 			for($i=0;$i<count($groupid);$i++){
 			//echo $groupid[$i];
 			echo " <input type='checkbox' name='buses[]' value=".$groupid[$i].">". $groupid[$i];
 			}

 			
 	 ?>

 	 <h4>Lines:</h4>
 	 <?php 
 	 	#print all courses in checkbox form
 	 	$sql = "SELECT * FROM lines_";
 	 	$lines = getObjects($connection,$sql);
 	 	$lines_size = getObjectsSize($connection,$sql);

 	 	for($i=0;$i<$lines_size;$i++){
 	 		$current_line = mysqli_fetch_assoc($lines);

 	 		echo " <input type='checkbox' name='lines[]' value=".$current_line['id'].">".$current_line['number_']." - [ ID: ".$current_line['id']." ]<br>";
 	 	}
 	  ?>

 	  <br>
 	 <button>Assign</button>
 	 <HR>
 </form>
<a href="includes/group_remove_lines.inc.php"></a>

 <?php 
 	#print all groups

 	#this array used to record already printed groups by only remembering their required_courses
 	$lines = array();


 	$sql = "SELECT * FROM buses";
 	$_buses = getObjects($connection,$sql);
 	$_buses_size = getObjectsSize($connection,$sql);

 	$count = 1;
 	#scan through all employees
 	for($i=0;$i<$_buses_size;$i++){
 		$current__bus = mysqli_fetch_assoc($_buses);

 		#check if he or she is a course-alredy-assigned employee
 		if(!empty($current__bus['assigned_lines'])){

 			$shared_lines = $current__bus['assigned_lines'];
 			
 			#if they are not printed before, find all their group members and print them out
 			if(!in_array($shared_lines,$lines)){

 				#find all their group members
 				$sql = "SELECT * FROM buses WHERE assigned_lines='$shared_lines'";
 				$shared__buses = getObjects($connection,$sql);
 				$shared_size = getObjectsSize($connection,$sql);

 				echo "<table><tr><th>Registration</th><th>Line ID</th></tr>";
 				for($j=0;$j<$shared_size;$j++){
 					$current_shared__bus = mysqli_fetch_assoc($shared__buses);
 					echo "<tr><th>".$current_shared__bus['registration']."</th><th>".$current_shared__bus['assigned_lines']."</th><th><a href='includes/group_remove_lines.inc.php?id=".$current_shared__bus['id']."'>Remove</a></th></tr>";

 				}
 				echo "</table>";
 				array_push($lines, $shared_lines);
 			}
 			

 		}
 	}


  ?>