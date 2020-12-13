<?php

include 'adminauthentication.php';
extract ($_POST);
$conn = mysqli_connect("localhost","root","","finaldb");


if (isset($_POST["import"]))
{
	
  
	  //echo 'hi';
if($startdate > $enddate){
$_SESSION['uploadcourse']='Invalid Dates';
}
else{
$q="select * from courses where title='$title'";
     $r = mysqli_query($conn, $q);
$ct =0;
foreach($r as $c){
	$ct++;
}
        
       	  
        if($ct==0){        
      $query = "insert into courses (name,title,start_date,end_date,author_name,cost,language)
 values('$coursename','$coursetitle','$startdate','$enddate','$authorname','$cost','$lname')";;
     $result = mysqli_query($conn, $query);
		$_SESSION['uploadcourse']='Course uploaded successfully';
		}
		else{
				$_SESSION['uploadcourse']='Another Course has same title. Try again';
	
		}
					
			}
     }           
   	header("location:admin.php");
	


?>























