<?php
include 'database.php';
header('Content-Type: application/json');
$codeval = $_REQUEST['value'];

$task  ="[".PHP_EOL."{";
$t1="";$t2="";$t3="";$t4="";$t5="";
$mon = $conn->query("select course,subject,crn,starttime,endtime,building,room,firstname,lastname from courses where M!='' and semestercode='$codeval' and (section LIKE 'L%' || section=1 || section=2 || section=3) order BY endtime");
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
	$subject = strtolower($mons[1]);
	$course = $mons[0];
	$name = $mons[1]."".$mons[0];
		$loc = strtolower($mons[5]."".$mons[6]);
		$insname=$mons[7]." " .$mons[8];
		


	
	 $t1 = '"startTime":"'.$starttime.'","duration":"'.$dur.'","column":"0","title":"'. $subject. '' . $course.' '.$loc.'"'.',"name":"'.$name.'","instructor":"'.$insname.'"'.PHP_EOL.'},'.PHP_EOL;
$task = $task.$t1."{".PHP_EOL."";	
	
}
$tues = $conn->query("select course,subject,crn,starttime,endtime,building,room,firstname,lastname from courses where T!='' and semestercode='$codeval' and (section LIKE 'L%' || section=1 || section=2 || section=3) order BY endtime");
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
	$subject = strtolower($tuess[1]);
	$course = $tuess[0];
	$name = $tuess[1]."".$tuess[0];
		$loc = strtolower($tuess[5]."".$tuess[6]);
		$insname=$tuess[7]." " .$tuess[8];


	
	
	 $t1 = '"startTime":"'.$starttime.'","duration":"'.$dur.'","column":"1","title":"'. $subject. '' . $course.' '.$loc.'"'.',"name":"'.$name.'","instructor":"'.$insname.'"'.PHP_EOL.'},'.PHP_EOL;
$task = $task.$t1."{".PHP_EOL."";	
	

	
}


$wed = $conn->query("select course,subject,crn,starttime,endtime,building,room,firstname,lastname from courses where W='W' and semestercode='$codeval' and (section LIKE 'L%' || section=1 || section=2 || section=3) order BY endtime");
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
	$subject = strtolower($weds[1]);
	$course = $weds[0];
	$name = $weds[1]."".$weds[0];

		$loc = strtolower($weds[5]."".$weds[6]);
		$insname=$weds[7]." " .$weds[8];

	
	
	 $t1 = '"startTime":"'.$starttime.'","duration":"'.$dur.'","column":"2","title":"'. $subject. '' . $course.' '.$loc.'"'.',"name":"'.$name.'","instructor":"'.$insname.'"'.PHP_EOL.'},'.PHP_EOL;
$task = $task.$t1."{".PHP_EOL."";	
	

	
}

$thurs = $conn->query("select course,subject,crn,starttime,endtime,building,room,firstname,lastname from courses where 	R='R' and semestercode='$codeval' and (section LIKE 'L%' || section=1 || section=2 || section=3) order BY endtime");
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
	$subject = strtolower($thurss[1]);
	$course = $thurss[0];

		$name = $thurss[1]."".$thurss[0];
		$loc = strtolower($thurss[5]."".$thurss[6]);
		$insname=$thurss[7]." " .$thurss[8];

	
	 $t1 = '"startTime":"'.$starttime.'","duration":"'.$dur.'","column":"3","title":"'. $subject. '' . $course.' '.$loc.'"'.',"name":"'.$name.'","instructor":"'.$insname.'"'.PHP_EOL.'},'.PHP_EOL;
$task = $task.$t1."{".PHP_EOL."";	
	

	
}



$fri = $conn->query("select course,subject,crn,starttime,endtime,building,room,firstname,lastname from courses where F='F' and semestercode='$codeval' and (section LIKE 'L%' || section=1 || section=2 || section=3) order BY starttime");
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
	$subject = strtolower($fris[1]);
	$course = $fris[0];
	
	$name = $fris[1]."".$fris[0];
		$loc = strtolower($fris[5]."".$fris[6]);
		$insname=$fris[7]." " .$fris[8];

	 $t1 = '"startTime":"'.$starttime.'","duration":"'.$dur.'","column":"4","title":"'. $subject. '' . $course.' '.$loc.'"'.',"name":"'.$name.'","instructor":"'.$insname.'"'.PHP_EOL.'},'.PHP_EOL;
$task = $task.$t1."{".PHP_EOL."";	

	


}
$task = substr($task,0,strlen($task)-6);
echo $task.PHP_EOL.']';


?>