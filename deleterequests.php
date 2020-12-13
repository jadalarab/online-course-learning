<?php
include 'database.php';
extract($_POST);
include 'userauthentication.php';
$res = $conn->query("select max(requestid) from capacityrequest");
$ct = 0 ;
foreach($res as $vl){
	$ct = $vl[0];
	break;
}
$del = 0 ;
for($i=0 ; $i <= $ct ; $i++){	
$vl ="cb".$i;
if(isset($_POST['cb'.$i])){
$del++;	

$conn->query("delete from capacityrequest where requestid='$i'");

}
}
echo $del. " record/s deleted successully";
$del=0;
header("Refresh: 4;  user.php");


?>