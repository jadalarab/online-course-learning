<?php

$conn = mysqli_connect("localhost","root","","finaldb");

$sid=$_GET['student_id'];         
      
	
	    
		 $query2 = "insert into user_chat_room_open (student_id) values('$sid')";;
     $result2 = mysqli_query($conn, $query2);	
$query = "insert into chat_room (student_id) values('$sid')";;
     $result = mysqli_query($conn, $query);
		$last_id = $conn->insert_id;
		echo $last_id;			
			
 	


?>























