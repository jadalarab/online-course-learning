<?php
include 'database.php';
session_start();

extract($_POST);
$password = "";
$res = $conn->query("select email,password from students where email = '$mail' ");
foreach($res as $st){
		$password = $st[1];
	
		break;
	
}
if($password != md5($pre)){
	 $_SESSION['message']=  "Your old password doesnot matches the one in our system . Try Again";
	 $_SESSION['mail'] = $mail;
	  $_SESSION['user'] = $users;
	  header("Location:change_password.php");

}
else if($password == md5($pre)){
	if($pre == $new){
	 $_SESSION['mail'] = $mail;
	  $_SESSION['user'] = $users;
	  $_SESSION['message']= "Your old and new passwords are the same. Try again";	
	  header("Location:change_password.php");

	}
	else{
	$newp = md5($new);
	$conn->query("update students set password='$newp' where email='$mail'");
	 $_SESSION['mail'] = $mail;
	  $_SESSION['user'] = $users;
	  $_SESSION['pc'] = $pc;
	  $_SESSION['message']= "Your password has changed successfully";
	  	header("Location:change_password.php");

}


}
?>