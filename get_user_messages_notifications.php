<?php

include 'database.php';
$return_arr = array();
$noofmes=0;
$sid = $_GET['student_id'];
$ct = $conn->query("select count(message) as num from chat_messages cm where seen_by_user=0");
foreach ($ct as $ctr){
$noofmes=$ctr[0];
}
echo $noofmes;	   
					
			
 	


?>























