<?php

include 'adminauthentication.php';
$conn = mysqli_connect("localhost","root","","finaldb");
$id=$_GET['id'];
$cn=$_GET['cname'];
$title=$_GET['title'];
$start_date=$_GET['start_date'];
$end_date=$_GET['end_date'];
$author_name=$_GET['author_name'];
$cost=$_GET['cost'];
if($start_date > $end_date){
$_SESSION['message']='Invalid Dates';

}
else{


        
       	  
                
      $query = "update courses set name='$cn',title='$title',start_date='$start_date',end_date='$end_date',author_name='$author_name',cost='$cost' where id='$id'";;
     $result = mysqli_query($conn, $query);
			
				$_SESSION['id']=$_GET['id'];
	$_SESSION['message']='Course Editted';

			
              
	}
header("Location:editcourse.php");

?>























