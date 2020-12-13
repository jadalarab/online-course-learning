<?php
extract($_POST);
session_start();
include 'database.php';
$count=0;
$username="";
$result = $conn->query("select email,username from students where email='$emailforgetpassword'");
foreach($result as $ml){
	$count++;
	if($count!=0){
		$username=$ml[1];
	}
}
if($count==0){
	echo "This mail doesnot exist . Try again with other account";
	header("Refresh: 4; index.php");

}
else{
			$_SESSION['email']=$emailforgetpassword;

		$_SESSION['username']=$username;
	

	header("Location:token.php");
}

?>