<?php

include 'adminauthentication.php';
$conn = mysqli_connect("localhost","root","","finaldb");

$id=$_POST['sid'];
if(isset($_POST['deactivate'])){
 $query = "update students set status=0 where student_id='$id'";;
     $result = mysqli_query($conn, $query);
	 			 $_SESSION['message']='Student Deactivated';			

}
  
else if(isset($_POST['activate'])){
 $query = "update  students set status=1 where student_id='$id'";;
     $result = mysqli_query($conn, $query);
	 	 			 $_SESSION['message']='Student Activated';			

}      
else if(isset($_POST['delete'])){
 $query = "delete from  students where student_id='$id'";;
     $result = mysqli_query($conn, $query);
	 	 			 $_SESSION['message']='Student Deleted';			

}      
           	  
                
   header("Location:accounts.php");
	


?>























