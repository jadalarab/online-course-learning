<?php require("/PHPMailer-master/src/PHPMailer.php");
    require("/PHPMailer-master/src/SMTP.php");
    require("/PHPMailer-master/src/Exception.php");
include 'database.php';	
extract($_POST);
 ?>
<!DOCTYPE html>

    <head>
      
        <title>Token Verification </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
		<script src="validate.js"></script>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
	<SCRIPT type="text/javascript">    
           var path = 'token.php';
history.pushState(null, null, path + window.location.search);
window.addEventListener('popstate', function (event) {
    history.pushState(null, null, path + window.location.search);
});
        </SCRIPT>
        <div class="container">
			
			  <header>
                <h1>Massive Open Online Courses </h1>
				<nav class="codrops-demos">
					<span>Higher Learning via  <strong>Massive Open Online Courses</strong></span>
					
				</nav>
            </header>
			<?php

			include 'database.php';
			session_start();

			function generateToken($conn){
			$random=rand(10000,99999);
			//tokens table
			$tokens=$conn->query("select token from tokens");
			foreach($tokens as $token){
				if($token[0]==$random){
				return generateToken($conn);
		}
	}
			return $random;
		}
		$token= generateToken($conn);
		$mails = $_SESSION['email'];
							$username = $_SESSION['username'];


		$conn->query("delete from tokens where email='$mails'");
		$conn->query("insert into tokens values('$mails','$token')");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
   // $mail->SMTPDebug = 2;                                        
    $mail->isSMTP();                                             
    $mail->Host       = 'smtp.gmail.com;';                     
    $mail->SMTPAuth   = true;                              
    $mail->Username   = 'mohammadalialoul@gmail.com';                  
    $mail->Password   = '12121212@@AAAA';                         
    $mail->SMTPSecure = 'tls';                               
    $mail->Port       = 587;   
  
    $mail->setFrom('mohammadalialoul@gmail.com', 'Massive Open Online Courses');            
    $mail->addAddress($mails); 
    $mail->addAddress($mails,$username); 
       
    $mail->isHTML(true);  
	if(isset($_SESSION['password'])){ 
	  $mail->Subject = 'Token Registration for Massive Open Online Courses'; 
    $mail->Body    = 'Hello '.$username.',</br></br> Your registration token for Massive Open Online Courses site is <b>'.$token.'</b>. </br>
		<em><b>Enjoy our courses</em></b></br>Sincerely,</br>Massive Open Online Courses Team'; 
	}
	else{
		  $mail->Subject = 'Token Forget Password for Massive Open Online Courses'; 
    $mail->Body    = 'Hello '.$username.',</br></br> Your token for Massive Open Online Courses site is <b>'.$token.'</b>. </br>
		<em><b>Enjoy our courses</em></b></br>Sincerely,</br>Massive Open Online Courses Team'; 
	}
    //$mail->Subject = 'Token Registration for Massive Open Online Courses'; 
 //   $mail->Body    = 'Hello '.$username.',</br></br> Your registration token for Massive Open Online Courses site is <b>'.$token.'</b>. </br>
		//<em><b>Enjoy our courses</em></b></br>Sincerely,</br>Massive Open Online Courses Team'; 
    $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
    $mail->send(); 
    echo 'A mail was sent to '.$mails.'.Please wait...';

			
			?>
           
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
					<?php if(isset($_SESSION['password'])){ 
					$pass = $_SESSION['password'];
					$ids = $_SESSION['id'];
					?>
					<form action="confirmtoken.php" method="post">
                        <div class="animate form">
                          <p style="text-align:center">Enter the token sent to your mail</p>
						  <input type="number" name="token" placeholder="Enter your token" required/>
						   <input type="hidden" name="email" value="<?=$mails?>"/>
						   <input type="hidden" name="password" value="<?=$pass?>"/>
						   <input type="hidden" name="username" value="<?=$username?>"/>
												   <input type="hidden" name="id" value="<?=$ids?>"/>

						  <input type="submit" value="Submit"/>
                        </div>
					</form>
					<?php } else { ?>
					<form action="confirmpasswordtoken.php" method="post">
                        <div class="animate form">
                          <p style="text-align:center">Enter the token sent to your mail</p>
						  <input type="number" name="token" placeholder="Enter your token" required/>
						   <input type="hidden" name="email" value="<?=$mails?>"/>
						  

						  <input type="submit" value="Submit"/>
                        </div>
					</form>
					<?php } ?>
                      
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>