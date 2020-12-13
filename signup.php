<?php
extract($_POST);
session_start();
include 'database.php';
$count=0;
$result = $conn->query("select email from students where email='$emailsignup'");
foreach($result as $ml){
	$count++;
}
if($count!=0){
	$_SESSION['message']= "This mail is already signed in . Try again with other account";
	header("Location:index.php");

}
else{
	$pass = md5($psw);
	$_SESSION['username']=$username;
		$_SESSION['email']=$emailsignup;
		$_SESSION['password']=$pass;
		$_SESSION['id']=$id;

	header("Location:token.php");
}

?>