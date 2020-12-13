<?php
session_start();
extract($_POST);
include 'database.php';
$result = 0 ;
        //Update picture name in the database
        $update = $conn->query("delete from profiles WHERE student_id = '$student_id'");
 
	$_SESSION['message']='Profile Deleted';

        //Update status
	header("Location: user.php");
    
    //Load JavaScript function to show the upload status
