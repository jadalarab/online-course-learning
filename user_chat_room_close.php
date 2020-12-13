<?php

$conn = mysqli_connect("localhost","root","","finaldb");

$sid=$_GET['student_id'];         
      
	
$query = "delete from user_chat_room_open where student_id='$sid'";
mysqli_query($conn, $query);
			
			
 	


?>























