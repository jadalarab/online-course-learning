<?php
extract($_POST);
session_start();
include 'database.php';
$sql = "select token from tokens where email='$email'";
$res = $conn->query($sql);
$tokenvalue = 0 ;
foreach ($res as $values ){
	$tokenvalue = $values[0];
	break;
}
if($token == $tokenvalue){
	$q="select * from students where email='$email'";
	$res2 = $conn->query($q);
	 $username='';
	 $id='';
	 $student_id='';
	 	 $status='';

	foreach($res2 as $r){
		 $username = $r[1];
		 $id=$r[4];
		 $student_id=$r[0];
		 $status=$r[5];
	}
					$_SESSION['user'] = $username;
					$_SESSION['mail'] = $email;
					$_SESSION['id'] = $id;
					$_SESSION['student_id'] = $student_id;

				header("Location:change_password_after_confirm.php");
	
	

}
else{
	$_SESSION['user'] = $username;
					$_SESSION['mail'] = $email;
					$_SESSION['id'] = $id;
					$_SESSION['student_id'] = $student_id;

	echo "The token is not correct . Check the new token and try again";
	header ("Refresh: 4; token.php");
}


?>