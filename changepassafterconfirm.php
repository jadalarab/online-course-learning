<?php
include 'database.php';
session_start();
extract($_POST);
$pw=md5($psw);
$student_id=$sid;
$conn->query("update students set password='$pw' where student_id='$student_id'");
$st=$conn->query("select * from students where student_id='$student_id'");
$status=0;
foreach($st as $t){
	$status=$t[5];
	
}
if($status == '1'){
	echo "Welcome Again to Massive Open Online Courses ...";

$_SESSION['user'] = $username;
					$_SESSION['mail'] = $mail;
					$_SESSION['id'] = $id;
					$_SESSION['student_id'] = $student_id;
					header("Refresh: 4; user.php");
}
else{
	echo "Your password was changed but this account is deactivated by admin";
					header("Refresh: 4; index.php");
}
?>