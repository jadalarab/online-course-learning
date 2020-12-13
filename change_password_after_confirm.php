<!DOCTYPE html>
<?php
session_start();
$username=$_SESSION['user'];
$mail=$_SESSION['mail'];
$id=$_SESSION['id'];
$sid=$_SESSION['student_id'];

?>
    <head>
      
        <title>Change Password Form </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
		<script src="js/validatechangepassword.js"></script>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
	<SCRIPT type="text/javascript">    
           var path = 'change_password_after_confirm.php';
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

           
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                     

                   <div id="changepass" class="animate form">
                            <form  action="changepassafterconfirm.php" method="post" id="submitforgetpassword"> 
                                <h1>Change Password</h1> 
                               
                               <input type="hidden" name="username" value="<?=$username?>">
							   <input type="hidden" name="mail" value="<?=$mail?>">
                               <input type="hidden" name="sid" value="<?=$sid?>">
                               <input type="hidden" name="id" value="<?=$id?>">

                               <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
									<input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  placeholder="Type your password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>									<div id="validatepassword">
									
									<div id="message">
									<h3 id="h3">Password must contain the following:</h3>
									<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
									<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
									<p id="number" class="invalid">A <b>number</b></p>
									<p id="length" class="invalid">Minimum <b>8 characters</b></p>
									</div>
									<div id="ok"></div>
                                </p>
                                <p> 
                                    <label for="passwordforgetpassword_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordforgetpassword_confirm" name="passwordforgetpassword_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
									<div id="validateconfirmpassword"></div>
                                </p>

                                </p>
                                <p class="forget_password button"> 
									<input type="submit" value="Submit" id="submit"/> 
								</p>
                               
								
							
                        </div>
					     
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>