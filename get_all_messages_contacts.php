<?php

include 'database.php';

$query = $conn->query("select chat_room_id,s.username,s.student_id,p.picture from chat_room cr join students s on s.student_id=cr.student_id join profiles p on p.student_id=s.student_id");
foreach ($query as $chat) { 
$username=$chat[1];
$crid  = $chat [0];
$student_id=$chat[2];
$path=$chat[3];
$ct = $conn->query("select count(message) from chat_messages where chat_room_id='$crid' and seen_by_admin='0'");
$found_unread = -1 ;
foreach($ct as $c){ 
if($c[0] != 0) { $found_unread = $c[0]; } }

$return_arr[] = array("crid" => $crid,
                    "found_unread" => $found_unread,
					"username" => $username,
					"sid" => $student_id,
					"path"=>$path

					);


}
echo json_encode($return_arr);	    
			
					
			
 	


?>























