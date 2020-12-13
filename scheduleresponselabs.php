<?php
include 'database.php';
header('Content-Type: application/json');
$codeval = $_REQUEST['value'];

$task  ="[".PHP_EOL."{";
$mon = $conn->query("select course,subject,crn,starttime,endtime,room from courses where M='M' and section LIKE 'B%' and semestercode='$codeval' order BY endtime");
foreach($mon as $mons){
	$st1 = (int)substr($mons[3],0,2);
	$st2 = (int)substr($mons[3],2);

	$end1 =  (int)substr($mons[4],0,2);
	$end2 =  (int)substr($mons[4],2);
		
	$starttime = $st1;
	$hrdif=$end1 - $st1;
	$mindif = $end2 - $st2;
	$totaldiff = $mindif/60 ;
	$dur = $hrdif + $totaldiff;
	$crn = $mons[2];
	$subject = $mons[1];
	$course = $mons[0];
	$room = $mons[5];
	$name = $mons[1]."".$mons[0];

	
	
	 $t = '"startTime":"'.$starttime.'","duration":"'.$dur.'","column":"0","title":"'.$crn.' ' . $subject. ' ' . $course.'"'.',"name":"'.$name.'",'.'"room":"'.$room.'"'.PHP_EOL.'},'.PHP_EOL;
$task = $task.$t."{".PHP_EOL."";		

	
}
$tues = $conn->query("select course,subject,crn,starttime,endtime,room from courses where T='T' and section LIKE 'B%' and semestercode='$codeval' order BY endtime");
foreach($tues as $tuess){
	$st1 = (int)substr($tuess[3],0,2);
	$st2 = (int)substr($tuess[3],2);

	$end1 =  (int)substr($tuess[4],0,2);
	$end2 =  (int)substr($tuess[4],2);
		
	$starttime = $st1;
	$hrdif=$end1 - $st1;
	$mindif = $end2 - $st2;
	$totaldiff = $mindif/60 ;
		$dur = $hrdif + $totaldiff;

	$crn = $tuess[2];
	$subject = $tuess[1];
	$course = $tuess[0];

		$name = $tuess[1]."".$tuess[0];
	$room = $tuess[5];

	
	 $t = '"startTime":"'.$starttime.'","duration":"'.$dur.'","column":"1","title":"'.$crn.' ' . $subject. ' ' . $course.'"'.',"name":"'.$name.'",'.'"room":"'.$room.'"'.PHP_EOL.'},'.PHP_EOL;
$task = $task.$t."{".PHP_EOL."";	
	

	
}

$in=0;
$wed = $conn->query("select course,subject,crn,starttime,endtime,room from courses where W='W' and section LIKE 'B%' and semestercode='$codeval' order BY endtime");
foreach($wed as $weds){
	$st1 = (int)substr($weds[3],0,2);
	$st2 = (int)substr($weds[3],2);

	$end1 =  (int)substr($weds[4],0,2);
	$end2 =  (int)substr($weds[4],2);
		
	$starttime = $st1;
	$hrdif=$end1 - $st1;
	$mindif = $end2 - $st2;
	$totaldiff = $mindif/60 ;
		$dur = $hrdif + $totaldiff;

	$crn = $weds[2];
	$subject = $weds[1];
	$course = $weds[0];
	$name = $weds[1]."".$weds[0];
	$room = $weds[5];

	
	
	 $t = '"startTime":"'.$starttime.'","duration":"'.$dur.'","column":"2","title":"'.$crn.' ' . $subject. ' ' . $course.'"'.',"name":"'.$name.'",'.'"room":"'.$room.'"'.PHP_EOL.'},'.PHP_EOL;
$task = $task.$t."{".PHP_EOL."";
$in++;
	/*if($in==3){
break;
}*/

	
}

$thurs = $conn->query("select course,subject,crn,starttime,endtime,room from courses where 	R='R' and section LIKE 'B%' and semestercode='$codeval' order BY endtime" );
foreach($thurs as $thurss){
	$st1 = (int)substr($thurss[3],0,2);
	$st2 = (int)substr($thurss[3],2);

	$end1 =  (int)substr($thurss[4],0,2);
	$end2 =  (int)substr($thurss[4],2);
		
	$starttime = $st1;
	$hrdif=$end1 - $st1;
	$mindif = $end2 - $st2;
	$totaldiff = $mindif/60 ;
		$dur = $hrdif + $totaldiff;

	$crn = $thurss[2];
	$subject = $thurss[1];
	$course = $thurss[0];

		$name = $thurss[1]."".$thurss[0];

		$room = $thurss[5];

	 $t = '"startTime":"'.$starttime.'","duration":"'.$dur.'","column":"3","title":"'.$crn.' ' . $subject. ' ' . $course.'"'.',"name":"'.$name.'",'.'"room":"'.$room.'"'.PHP_EOL.'},'.PHP_EOL;
$task = $task.$t."{".PHP_EOL."";	
	

	
}



$fri = $conn->query("select course,subject,crn,starttime,endtime,room from courses where 	F='F' and section LIKE 'B%' and semestercode='$codeval' order BY endtime");
foreach($fri as $fris){
	$st1 = (int)substr($fris[3],0,2);
	$st2 = (int)substr($fris[3],2);

	$end1 =  (int)substr($fris[4],0,2);
	$end2 =  (int)substr($fris[4],2);
		
	$starttime = $st1;
	$hrdif=$end1 - $st1;
	$mindif = $end2 - $st2;
	$totaldiff = $mindif/60 ;
		$dur = $hrdif + $totaldiff;

	$crn = $fris[2];
	$subject = $fris[1];
	$course = $fris[0];

		$name = $fris[1]."".$fris[0];
	$room = $fris[5];

	
	 $t = '"startTime":"'.$starttime.'","duration":"'.$dur.'","column":"4","title":"'.$crn.' ' . $subject. ' ' . $course.'"'.',"name":"'.$name.'",'.'"room":"'.$room.'"'.PHP_EOL.'},'.PHP_EOL;
$task = $task.$t."{".PHP_EOL."";	
	

	
}
$task = substr($task,0,strlen($task)-6);
echo $task.PHP_EOL.']';


?>