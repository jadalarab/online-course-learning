<?php
include 'userauthentication.php';

extract ($_POST);
$conn = mysqli_connect("localhost","root","","finaldb");
$sd=$_POST['start_date'];
$ed=$_POST['end_date'];
$cid=$_POST['course_id'];
$id=$_POST['student_id'];


$today_date=date("Y-m-d");
if($ed < $today_date){
$_SESSION['message']='Cannot Enroll in the course';
}
else{


        
                
      $query = "insert into course_enroll (course_id,student_id)
 values('$cid','$id')";;
     $result = mysqli_query($conn, $query);
		$_SESSION['id']=$id;
		$_SESSION['message'] = 'Course Added Successfully';
		 	
			}
               
			header("Location:user.php");			



?>























