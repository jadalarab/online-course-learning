<?php

require("/PHPMailer-master/src/PHPMailer.php");
    require("/PHPMailer-master/src/SMTP.php");
    require("/PHPMailer-master/src/Exception.php");
	 $email_sent_to='maa274@mail.aub.edu';

				session_start();

	extract($_SESSION);
extract($_POST);
 $sendmail = new PHPMailer\PHPMailer\PHPMailer();
   $sendmail->SMTPDebug = 2;                                        
    $sendmail->isSMTP();                                             
    $sendmail->Host       = 'smtp.gmail.com;';                     
    $sendmail->SMTPAuth   = true;                              
    $sendmail->Username   = 'mohammadalialoul@gmail.com';                  
    $sendmail->Password   = '12121212@@AAAA';                         
    $sendmail->SMTPSecure = 'tls';                               
    $sendmail->Port       = 587;   
  
    $sendmail->setFrom($email, 'Massive Open Online Courses Help Request');            
    $sendmail->addAddress($email_sent_to); 
    $sendmail->addAddress($email_sent_to,$username); 
       
    $sendmail->isHTML(true);  
	
		  $sendmail->Subject = $subject;
    $sendmail->Body    = $message;
	
   
    $sendmail->AltBody = 'Body in plain text for non-HTML mail clients'; 
    $sendmail->send(); 
	$_SESSION['message']='The mail was sent succesfully';
	header('location:contact.php');
?>