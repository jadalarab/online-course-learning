<?php
include 'database.php';
extract($_POST);
include 'userauthentication.php';

$res = $conn->query("select max(requestid) from capacityrequest");
$ct = 0 ;
$up=0;
foreach($res as $vl){
	$ct = $vl[0];
	break;
}
for($i = 0 ; $i<=$ct ; $i++){
if(isset($_POST['cb'.$i])){
	$up++;
$name = $_POST['id'.$i][0];
$crn = $_POST['id'.$i][1];
$reason = $_POST['id'.$i][2];
$conn->query("update capacityrequest set coursename='$name',coursecrn='$crn',reason='$reason' where requestid='$i'");

}
}
echo $up. " record/s updated successully";
//$del=0;
header("Refresh: 4;  user.php");

	
	
	


?>