<?php


	//connect database
	include_once 'includes/database_connection.inc.php';
 ?>

 <a href="index.php">Back</a>
 

  <!--When Delete lines, related routes and stops will  be deleted automatically -->
 	
 	<?php 
 		
 		$sql = "SELECT * FROM lines_";
 		$selected_lines =  mysqli_query($connection, $sql);
 		$size_lines=mysqli_num_rows($selected_lines);
 		
 		for($i=0;$i<$size_lines;$i++){
 			$current_line = mysqli_fetch_assoc($selected_lines);
 			$line_number = $current_line['number_'];
 			$line_id = $current_line['id'];

 			#start print all courses
 			echo "<h3>Lines ".($i+1)." <a href='includes/delete_lines.inc.php?number_=".$line_number."'>DELETE</a> </h3>";
 			
 			?>
 			<div>
 				
 				<p>

 				Line Number: <?php echo $current_line['number_']; ?>
 				

 				</p>
 				<!--When Delete routes, related stops will  be deleted automatically -->

 				<?php 

 					$sql_routes = "SELECT * FROM routes WHERE _line_number='$line_number' ";
 					$selected_routes = mysqli_query($connection, $sql_routes);
 					$size_routes=mysqli_num_rows($selected_routes);

 					for($j=0;$j<$size_routes;$j++){
 						$current_route = mysqli_fetch_assoc($selected_routes);
 						$route_name = $current_route['name'];
 						$route_id = $current_route['id'];
 						#start print all chapters
 						echo "<h4>Route ".($j+1)." <a href='includes/delete_routes.inc.php?name=".$route_name."'>DELETE</a> </h4>";
 						?>
 						
 					
 						<p>
 							Name: <?php echo $current_route['name'] ?>
 				
 						</p>


 						<p>
 							Direction: <?php echo $current_route['direction'] ?> 
 						</p>


 						<?php 

 							$sql_stops = "SELECT * FROM stops WHERE _route_name='$route_name' ";
 							$selected_stops = mysqli_query($connection, $sql_stops);
 							$size_stops=mysqli_num_rows($selected_stops);

 							for($k=0;$k<$size_stops;$k++){
 								$current_stop = mysqli_fetch_assoc($selected_stops);
 								$stop_id = $current_stop['id'];
 								echo "<h6>Stop ".($k+1)." <a href='includes/delete_stops.inc.php?id=".$stop_id."'>DELETE</a></h6>";

 								?>
 								
 								

 								<p>
 									 Code: <?php echo $current_stop['code'] ?>
 								</p>

 								

 								<?php
 							}

 							echo "<a href='add_stops.php?_route_name=".$route_name."'><h6>Add a stop</h6></a>";

 						 ?>


 						<?php
 					}

 					echo "<a href='add_routes.php?_line_number=".$line_number."'><h4>Add a route<h4></a>";
 				 ?>

 				 <br>
 			</div>
 			
 			<?php
 		}

 		echo "<a href='add_lines.php'><h3>Create a line</h3></a>";




 	 ?>
 