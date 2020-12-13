<?php

$conn = mysqli_connect("localhost","root","","finaldb");

$rid=$_GET['room_id'];         
       $query2 = "delete from admin_chat_room_open";
     $result2 = mysqli_query($conn, $query2);
	    $query2 = "insert into admin_chat_room_open (chat_room_id) values('$rid')";
     $result2 = mysqli_query($conn, $query2);
	    $query3 = "update chat_messages set seen_by_admin=1 where chat_room_id='$rid'";;
     $result3 = mysqli_query($conn, $query3);
			
					
			
 	


?>























