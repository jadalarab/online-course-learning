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
	$sid=$conn->query("insert into students (username,email,password,id) values('$username','$email','$password','$id')");
	$student_id=$conn->lastInsertId();
	echo "Welcome to Massive Open Online Courses ...";
					$_SESSION['user'] = $username;
					$_SESSION['mail'] = $email;
					$_SESSION['id'] = $id;
					$_SESSION['student_id'] = $student_id;

				header("Refresh: 4; user.php");

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