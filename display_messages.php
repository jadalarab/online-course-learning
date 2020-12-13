<?php

$conn = mysqli_connect("localhost","root","","finaldb");
$return_arr = array();
$rid=$_GET['room_id'];         
      $query = "select * from chat_messages where chat_room_id='$rid' order by date_time asc";
     $result = mysqli_query($conn, $query);
	foreach ($result as $msg){
	$id=$msg['student_id'];
	$message=$msg['message'];
		$date=$msg['date_time'];

	$return_arr[] = array("id" => $id,
                    "message" => $message,
					"date_time"=>$date
					);
}
echo json_encode($return_arr);	    
			
					
			
 	


?>























