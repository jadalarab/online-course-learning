<?php

include 'adminauthentication.php';
$conn = mysqli_connect("localhost","root","","finaldb");

$id=$_POST['cid'];
$path=$_POST['path'];
$lid=$_POST['lid'];


        
       	  
                
      $query = "delete from courses_lectures where id='$lid'";;
     $result = mysqli_query($conn, $query);
		unlink($path);
		  $query = "select exam_id from exams where lecture_id='$lid'";;
     $result = mysqli_query($conn, $query);
	       $row = mysqli_fetch_array($result);
		mysqli_free_result($result);
       $exam_id = $row[0];
		$query2="select question_id from exam_questions where exam_id='$exam_id'";
		     $result2 = mysqli_query($conn, $query2);
			while($row = mysqli_fetch_assoc($result2)) {
			$qid=$row['question_id'];
			$query3="delete from questions where id='$qid'";
			 mysqli_query($conn, $query3);
			}
			$query4="delete from exam_questions where exam_id='$exam_id'";
			 mysqli_query($conn, $query4);
		$query5="delete from exams where exam_id='$exam_id'";
			 mysqli_query($conn, $query5);
		$_SESSION['course_id']=$id;
			 $_SESSION['message']='Lecture Deleted';			
			
              
   	header("Location:viewLectures.php");
	


?>























