<?php
extract($_POST);
include 'database.php';
include 'userauthentication.php';
$cd = $_SESSION['programcode'];
$id=$_SESSION['id'];
$result = $conn->query("Select count(*)  from capacityrequest where email='$email' and coursecrn='$coursecrn' and semestercode='$cd'");

$count = $result -> fetchColumn();


if($count != 0){
	echo "Your request has been recorded before";
}
else{
$crn = '';
if(!isset($labcrn)){
$crn = 'no lab';
}
else{
$crn = $labcrn;
}
	$conn->query("INSERT INTO capacityrequest (studentid,major,email,coursename,coursecrn,labcrn,reason,state,semestercode) VALUES('$id','$major','$email','$coursename','$coursecrn','$crn','$reason','pending..','$cd')");
	
	echo "Your request has been recorded successfully. Wait us to review your request and get back to you";
	



}
	$_SESSION['mail'] = $email;
	$_SESSION['id'] = $id;

$_SESSION['pc'] = $cd;
		header("Refresh: 4; user.php");

?>