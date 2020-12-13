<?php 
session_start();
	$mail=$_SESSION['email'];
	?>

<!DOCTYPE html>

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
    </head>
    <body>
	
        <div class="container">
			
			   <header>
                <h1>AUB Courses System </h1>
				<nav class="codrops-demos">
					<span>The <strong>"only best choice"</strong> to ask for courses capacity</span>
					
				</nav>
            </header>
           
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="sendrequest.php" method="post"> 
                                <h1>Open Capacity</h1> 
                               
                                <p> 
                                    <label> Course Name </label>
                                    <input id="cousename" name="coursename" required="required" type="text" placeholder="Type the course name "/> 
                                </p>
                                <p> 
                                    <label> Course crn </label>
                                    <input id="coursecrn" name="coursecrn" required="required" type="text" placeholder="Type course crn " /> 
                                </p>
								<p> 
                                    <label> Reason behind your request </label>
                                    <input  required="required" name="reason" type="text" placeholder="Reason ..." /> 
                                </p>
								
								<input  name="email"  type="hidden" value="<?=$mail?>"/> 

								
                                <p class="login button"> 
                                    <input type="submit" value="Send Request" /> 
								</p>
								
								
                               
                            </form>
                        </div>

                       
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>