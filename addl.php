<?php
include 'adminauthentication.php';
extract($_SESSION);
include 'database.php';	
extract($_POST);
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);
$target = 'lectures/lectures'.$_POST['id'];
$ltitle = $_POST['ltitle'];
$continue=true;
if($_FILES['fileupload']['error'] === UPLOAD_ERR_INI_SIZE) {
    // Handle the error
	$_SESSION['message']='File is too large';
	$continue=false;
}
if($continue){
$query="select title from courses_lectures where title='$ltitle' and course_id='$id'";
$res=$conn->query($query);
$ct =0;
foreach($res as $c){
	$ct++;
}
if($ct != 0){

	$_SESSION['message']='A Lecture has a same title. Please choose another title';
}
else{
if (!file_exists($target)) {
    mkdir($target, 0777, true);
}
$target = $target.'/' . basename($_FILES['Filename']['name']);

//This gets all the other information from the form
$Filename=basename( $_FILES['Filename']['name']);
$fileTarget = $target;
$tempFileName = $_FILES["Filename"]["tmp_name"];
move_uploaded_file($tempFileName,$fileTarget);
$q="insert into courses_lectures (title,course_id,path) values('$ltitle','$id','$target')";
$conn->query($q);
	$_SESSION['message']='Lecture Added';
}
}
	$_SESSION['id']=$id;

header("Location:addlecture.php");

?>