<!DOCTYPE html>
<?php
include 'adminauthentication.php';
extract($_POST);
include 'database.php';	
	$code = $_SESSION['pc'];

if(!isset($response)){
echo "<p>No answer was recorded</p>";

		header("Refresh: 4; admin.php");
}
else{

	$back=$response.": ".$response1;


	if($all == 1){
		$str='';
	for($i = 0 ; $i < sizeof($requestid) ; $i++){
		
    $id=$requestid[$i];
	$str = $str. " " . $id . ", " ;
				 $res=$conn->query("delete from requestsresponses where requestid='$id'");
				
				 
				 $res=$conn->query("insert into requestsresponses values('$id','$back','$code')");
				 				 $res=$conn->query("update capacityrequest set state='answered' where requestid='$id'");
		$info = $conn->query("select coursecrn,labcrn from capacityrequest where requestid='$id'");
		foreach($info as $up){
			$coursecrn=$up[0];
			$labcrn=$up[1];
			if($response=='approved'){
				$conn->query("update courses cap set cap.active = cap.active + 1 where cap.crn='$coursecrn'");
				if($labcrn!='no lab'){
					$conn->query("update courses cap set cap.active = cap.active + 1 where cap.crn='$labcrn'");

				}
			}
		}

	}
		$str = substr($str,0,strlen($str)-2);
		
		echo "<p>You answered response #$str .. </p>";

	}
	else{
	 $res=$conn->query("delete from requestsresponses where requestid='$id'");
				
				 
				 $res=$conn->query("insert into requestsresponses values('$id','$back','$code')");
				 				 $res=$conn->query("update capacityrequest set state='answered' where requestid='$id'");
				$info = $conn->query("select coursecrn,labcrn from capacityrequest where requestid='$id'");
				foreach($info as $up){
			$coursecrn=$up[0];
			$labcrn=$up[1];
			if($response=='approved'){
				$conn->query("update courses cap set cap.active = cap.active + 1 where cap.crn='$coursecrn'");
				if($labcrn!='no lab'){
					$conn->query("update courses cap set cap.active = cap.active + 1 where cap.crn='$labcrn'");

				}
			}
		}
						 
		echo "<p>You answered response #$id .. </p>";
								 
	}
	

				 $_SESSION['name']=$name;
	$_SESSION['role']=$role;
	$_SESSION['pc']  = $code;
		header("Refresh: 4; admin.php");
	}

	?>
	