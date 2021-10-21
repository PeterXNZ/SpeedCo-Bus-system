<?php
	include_once '_header.php'; 
	include_once 'includes/_functions.inc.php';
	
	//connect database
	include_once 'includes/database_connection.inc.php';
 ?>
 <a href="index.php">Back</a>
 
 <form action="includes/assign_groups.inc.php" method="GET">
 	
 	<h4>Bus:</h4>
 	<?php 
 		#print all buses in checkbox form
 		$sql = "SELECT * FROM buses  ";
 		$buses = getObjects($connection,$sql);
 		$buses_size = getObjectsSize($connection,$sql);

 		for($i=0;$i<$buses_size;$i++){
 			$current_bus = mysqli_fetch_assoc($buses);
 			if(empty($current_bus['group_id'])){
 				echo " <input type='checkbox' name='buses[]' value=".$current_bus['id'].">".$current_bus['registration'];
 			}
 			
 		}
 	 ?>
 	 
 	
 	 <button>Assign</button>
 	 <HR>
 </form>
<a href="includes/group_remove.inc.php"></a>
<body>
Attention: You must remove assigned lines and assigned time first, if you want to remove assigned groups

 <?php 
 	#print all groups

 	#this array used to record already printed groups
 	$groups = array();


 	$sql = "SELECT * FROM buses ";
 	$_buses = getObjects($connection,$sql);
 	$_buses_size = getObjectsSize($connection,$sql);

 	
 	#scan through all buses
 	for($i=0;$i<$_buses_size;$i++){
 		$current__bus = mysqli_fetch_assoc($_buses);

 		#check if bus grouped yet or not
 		if(!empty($current__bus['group_id'])){

 			$shared_groups = $current__bus['group_id'];
 			
 			#if they are not printed before, find all their group members and print them out
 			if(!in_array($shared_groups,$groups)){

 				#find all their group members
 				$sql = "SELECT * FROM buses WHERE group_id='$shared_groups'";
 				$shared__buses = getObjects($connection,$sql);
 				$shared_size = getObjectsSize($connection,$sql);

 				#print them as a group
 				echo "<h5>Group <h5>";
 		



 				echo "<table><tr><th>Name</th></tr>";
 				for($j=0;$j<$shared_size;$j++){
 					$current_shared__bus = mysqli_fetch_assoc($shared__buses);
 					echo "<tr><th>".$current_shared__bus['registration']."</th><th>".$current_shared__bus['group_id']."</th><th><a href='includes/instructor_groupmember_remove.inc.php?id=".$current_shared__bus['id']."'>Remove</a></th></tr>";

 				}
 				echo "</table>";
 				array_push($groups, $shared_groups);
 			}
 			

 		}
 	}


  ?>