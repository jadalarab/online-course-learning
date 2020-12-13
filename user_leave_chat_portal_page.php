<?php

$conn = mysqli_connect("localhost","root","","finaldb");

$sid=$_GET['student_id'];         
$q = "delete from user_chat_room_open where chat_room_id='$rid'";
$res = mysqli_query($conn, $q);
	
	    
			
					
			
 	


?>























