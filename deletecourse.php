<?php

include 'adminauthentication.php';
$conn = mysqli_connect("localhost","root","","finaldb");

$id=$_POST['id'];
$name=$_POST['name'];


        
       	  
                
    
	 $dirname="lectures/lectures".$id;
	
	 emptyDir($dirname);
	 if (file_exists($dirname)) {

rmdir($dirname);
	 }
	 $lectures="select id from courses_lectures where course_id='$id'";
	      $result2 = mysqli_query($conn, $lectures);
  $rowcount=mysqli_num_rows($result2);
	if($rowcount!=0){
	 foreach($result2 as $lec){
		 $lecture_id=$lec['id'];
		   $query = "select exam_id from exams where lecture_id='$lecture_id'";;
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
	 }
	}
	  $query = "delete from courses where id='$id'";;
     $result = mysqli_query($conn, $query);
	  $query2 = "delete from courses_lectures where course_id='$id'";;
     $result2 = mysqli_query($conn, $query2);
	 
	 
	$_SESSION['message']='Course Deleted';
		
					
	function emptyDir($dir) {
    if (is_dir($dir)) {
        $scn = scandir($dir);
        foreach ($scn as $files) {
            if ($files !== '.') {
                if ($files !== '..') {
                    if (!is_dir($dir . '/' . $files)) {
                        unlink($dir . '/' . $files);
                    } else {
                        emptyDir($dir . '/' . $files);
                        rmdir($dir . '/' . $files);
                    }
                }
            }
        }
    }
}
              
		header("Location:admin.php");
	


?>























