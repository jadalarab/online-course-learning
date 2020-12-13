<?php
extract($_POST);
include 'database.php';
session_start();	
$id=0;


if(isset($member)){
	$pw = md5($password);

	$username="";
	$sid="";
	$count=0;
	$res = $conn->query("select username,email,password from students where email='$email' and password='$pw'");
	foreach($res as $values){
		$count++;	
	}
	if($count!=0){
	$status=0;
	$name = $conn->query("select username,email,password,id,status,student_id from students where email='$email' and password='$pw'");
	foreach($name as $n){
		$username=$n[0];
		$id=$n[3];
		$status=$n[4];
		$sid=$n[5];
		break;		
	}
	


	if($status ==0){
$_SESSION['message']= " student account not active . Try again";
		header("Location: index.php");

}
else{

	$_SESSION['user']=$username;
		$_SESSION['id']=$id;

		$_SESSION['mail']=$email;
$_SESSION['student_id']=$sid;
if(isset($rememberpassword) && !isset($_COOKIE['password'])){
setcookie('password', $password, time() + (86400 * 30), "/"); // 86400 = 1 day
echo 'd';
}
else if(!isset($rememberpassword)){
echo 'hi';
unset($_COOKIE['password']);

setcookie("password", "", time() - 3600,"/");

}
echo $_COOKIE['password'];
		header("Location: user.php");
}
	
	}
	else{
	$_SESSION['message']=  "No student with these details . Try again";
		header("Location: index.php");
	
	}
}
if(isset($admin)){

	$count=0;
	$name="";
	$role="";
$res = $conn->query("select email,password,name,role from admin where email='$email' and password='$password'");
foreach($res as $values){
		$count++;
		$name=$values[2];
		$role=$values[3];
		break;
	}
	if($count!=0){
	$_SESSION['name']=$name;
	$_SESSION['role']=$role;
	header("Location:admin.php");
	
	}
	else{
	$_SESSION['message']=  "No admin with these details . Try again";
		header("Location: index.php");
	
	}

}






?>