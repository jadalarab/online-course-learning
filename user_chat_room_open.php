<?php

$conn = mysqli_connect("localhost","root","","finaldb");

$sid=$_GET['student_id'];         
       $query2 = "delete from user_chat_room_open where student_id='$sid'";
     $result2 = mysqli_query($conn, $query2);
	    $query2 = "insert into user_chat_room_open (student_id) values('$sid')";
     $result2 = mysqli_query($conn, $query2);
	    $query3 = "update chat_messages set seen_by_user=1 where student_id='$sid'";;
     $result3 = mysqli_query($conn, $query3);
			
					
			
 	


?>























