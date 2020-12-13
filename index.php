<!DOCTYPE html>
<?php
session_start();
extract($_SESSION);


?>
    <head>
      
        <title>Login and Registration Form </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
		<script src="js/validate.js"></script>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
	  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	
    </head>
    <body>
	<SCRIPT type="text/javascript">    
           $(document).ready(function () {
			$("#messageResult").fadeIn(100,"swing").delay(1000).fadeOut(100);

});

        </SCRIPT>

        <div class="container">
			
			   <header>
                <h1>Massive Open Online Courses </h1>
				<nav class="codrops-demos">
					<span>Higher Learning via  <strong>Massive Open Online Courses</strong></span>
					
				</nav>
 <?php if(isset($message)){
						$me=$message;
						unset($_SESSION['message']);
					  ?>

<div class="alert alert-primary" id="messageResult" role="alert">
<?=$me?></div><?php
} ?>
            </header>

          
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login.php" method="post"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email</label>
                                    <input id="email" name="email" required="required" type="text" placeholder="xyz123@mail.aub.edu"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
									<?php if(isset($_COOKIE['password'])){ 
									$pw = $_COOKIE['password'];
									?>
                                    <input id="password" value="<?=$pw?>" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
									<?php } else { ?>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
									<?php } ?>
                                </p>
                                <p class="rememberpassword"> 
									<?php if(isset($_COOKIE['password'])){ ?>
									<input type="checkbox" checked="checked" name="rememberpassword" id="rememberpassword" value="rememberpassword" /> 
									<?php } else { ?>
									<input type="checkbox" name="rememberpassword" id="rememberpassword" value="rememberpassword" /> 
									<?php } ?>
									<label for="rememberpassword">Remember Password</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" name="member" value="Login as member" /> 
								</p>
								
								 <p class="login button"> 
                                    <input type="submit" name="admin"value="Login as admin" /> 
									                            </form>

								</p></br>
                            <form  action="forget_password.php"  method="post"> 
                                <h1> Forget Password </h1> 
                               
                                <p> 
                                    <label for="emailforgetpassword" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailforgetpassword" name="emailforgetpassword" required="required" type="email" placeholder="xyz123@mail.aub.edu"/> 

                                </p>
                                <p class="forget_password button"> 
									<input type="submit" value="Submit" id="submit"/> 
								</p>
                            </form>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>

								</p>
								 
								
							
                        </div>

                        <div id="register" class="animate form">
                            <form  action="signup.php" id="submitsignup" method="post"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your Username</label>
                                    <input required="required" type="text" name="username"placeholder="Enter your name here"/> 

                                </p>
								 <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your AUB ID</label>
                                    <input required="required" type="text" name="id" placeholder="Enter your AUB ID"/> 

                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="xyz123@mail.aub.edu"/> 
									<div id="confirmmail"></div>

                                </p>
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
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
									<div id="validateconfirmpassword"></div>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up" id="signup"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
					     
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>