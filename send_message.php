<?php

$conn = mysqli_connect("localhost","root","","finaldb");

$sid=$_GET['student_id'];  
$rid=$_GET['room_id'];         
$message=$_GET['message'];    
$student_id_sent=$_GET['student_id_sent'];  
$admin_flag=0;
$admin_room_id=0;
$user_flag=0;
$user_room_id=0;
if($sid != '0'){ 
$user_flag=1;

$seen_admin="select * from admin_chat_room_open";
     $results = mysqli_query($conn, $seen_admin);

foreach($results as $val){
$admin_room_id=$val['chat_room_id'];
}
if($admin_room_id == $rid){
$admin_flag=1;
}
}
else{
$admin_flag=1;

$seen_user="select * from user_chat_room_open where student_id='$student_id_sent'";
$results = mysqli_query($conn, $seen_user);

foreach($results as $val){
$user_room_id++;
}
if($user_room_id!=0){
$user_flag=1;
}
}
      $query = "insert into chat_messages (chat_room_id,student_id,message,seen_by_admin,seen_by_user) values('$rid','$sid','$message','$admin_flag','$user_flag')";;
     $result = mysqli_query($conn, $query);

			
					
			
 	


?>























