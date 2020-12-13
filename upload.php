<?php
session_start();
extract($_POST);
if(!empty($_FILES['picture']['name'])){
    //Include database configuration file
    include_once 'database.php';
    
    //File uplaod configuration
    $result = 0;
    $uploadDir = "uploads/images/";
    $fileName = time().'_'.basename($_FILES['picture']['name']);
    $targetPath = $uploadDir. $fileName;
    
    //Upload file to server
    if(@move_uploaded_file($_FILES['picture']['tmp_name'], $targetPath)){
        //Get current user ID from session
        
        //Update picture name in the database
        $update = $conn->query("delete from profiles WHERE student_id = '$student_id'");
        $insert = $conn->query("insert into profiles (student_id,picture) values('$student_id','$fileName')");

        //Update status
        if($insert){
            $result = 1;
        }
    }
	$_SESSION['email']=$mail;
	$_SESSION['message']='Profile Updated';

        echo '<script type="text/javascript">window.top.window.completeUpload(' . $result . ',\'' . $targetPath . '\');</script>  ';

    //Load JavaScript function to show the upload status
       // echo '<script type="text/javascript">window.location.href=\'user.php\';</script>';


}