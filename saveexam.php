<?php
include 'adminauthentication.php';

$conn = mysqli_connect("localhost","root","","finaldb");
extract($_POST);


$noofquestions = $_POST['numberofquestions'];
$qr1 = "insert into exams (lecture_id) values ('$lid')";
mysqli_query($conn, $qr1);
    $last_id = mysqli_insert_id($conn);

for($i = 0 ; $i <  $noofquestions ; $i++){
$index=$i+1;
if(isset($_POST['q'.$index])){
$description= $_POST['q'.$index];
$answers=$_POST['q'.$index.'a'];
$canswers=$_POST['cq'.$index.'a'];
$score= $_POST['sq'.$index];
$ans='';
$cansw='';
foreach($answers as $a){
$ans=$ans.$a.',';
}
$ans= substr($ans,0,strlen($ans)-1);
foreach($canswers as $a){
if($a!=''){
$cansw=$cansw.$a.',';
}
}
$cansw= substr($cansw,0,strlen($cansw)-1);
$qr2="insert into questions(description,answers,correct_answer,score) values('$description','$ans','$cansw','$score')";
mysqli_query($conn, $qr2);
$last_qid = mysqli_insert_id($conn);

$qr3= "insert into exam_questions(exam_id,question_id) values('$last_id','$last_qid')";
mysqli_query($conn, $qr3);
$_SESSION['course_id']=$course_id;
$_SESSION['message']='Exam Created';

   header("Location:viewLectures.php");

}
}

        
       	  
                
     
	


?>























