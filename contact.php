<!DOCTYPE html>
<?php

include 'userauthentication.php';
extract($_SESSION);
include 'database.php';	
$mail = $_SESSION['mail'];
$user = $_SESSION['user'];
$id=	$_SESSION['id'];
$student_id=$_SESSION['student_id'];

$_SESSION['email'] = $mail;
$_SESSION['user'] = $user;
$_SESSION['id'] = $id;

 ?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student Page</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />

		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        <link rel="shortcut icon" href="../favicon.ico"> 
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="profile.js"></script>
        <link rel="stylesheet" type="text/css" href="css/profile.css" />
		
		 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

				        <link rel="stylesheet" type="text/css" href="css/user.css" />

        <link rel="stylesheet" type="text/css" href="css/demo.css" />

        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
<script type="text/javascript" src="datatables/js/addons/datatables.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<script type="text/javascript" src="js/user.js"></script>
<script type="text/javascript" src="js/user_chat_portal.js"></script>

</head>

<body>
<SCRIPT type="text/javascript">    
           var path = 'contact.php';
history.pushState(null, null, path + window.location.search);
window.addEventListener('popstate', function (event) {
    history.pushState(null, null, path + window.location.search);
});
        </SCRIPT>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="images/aub.jpg" id="aub" alt="logo" />
        </a>
       
		
      </div>
	  
	  
      <div class="navbar-menu-wrapper d-flex align-items-center">
      <li  class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span>Hello, <?=$user?>!</span>
              <!--<img class="img-xs rounded-circle" src="images/faces/face1.jpg" alt="Profile image"> -->
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  
                </div>
              </a>
             
			 
              <a class="dropdown-item" href="index.php">
                Sign Out
              </a>
            </div>
          </li>
         
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
		 
      </div>
	  
	  
    </nav>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                 <!-- <img src="images/faces/face1.jpg" alt="profile image"> -->
                </div>
				
				
				
                <div class="text-wrapper">
                  <p class="profile-name"><?=$_SESSION['user']?></p>
                  <div>
                    <small class="designation text-muted">Student</small>
                    <span class="status-indicator online"></span>
				  
				  
							<?php
			$result = $conn->query("SELECT * FROM profiles WHERE student_id = '$student_id'");
$pic = "";
foreach($result as $row){
	$pic = $row[2];
	
}

//User profile picture
$userPicture = !empty($pic)?$pic:'no-image.jpg';

$userPictureURL = 'uploads/images/'.$userPicture;
?>
</br>
<div class="container">
    <div class="user-box">
        <div class="img-relative">
            <!-- Loading image -->
            <div class="overlay uploadProcess" style="display: none;">
                <div class="overlay-content"><img src="images/loading.gif"/></div>
            </div>
            <!-- Hidden upload form -->
            <form method="post" action="upload.php" enctype="multipart/form-data" id="picUploadForm" target="uploadTarget">
                <input type="file" name="picture" id="fileInput"  style="display:none"/>
				                <input type="hidden" name="mail" value="<?=$mail?>"/>

            </form>
			
			 <form method="post" action="delete.php" enctype="multipart/form-data" id="picDeleteForm">
				                <input type="hidden" name="mail" value="<?=$mail?>"/>

            </form>
            <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
            <img src="<?php echo $userPictureURL; ?>" class="img-circle" alt="Cinque Terre" width="70" height="70">

            <!-- Image update link -->
            <a class="editLink" href="javascript:void(0);"><img src="images/edit.png" width="10" height="10"/></a>
			<a class="deleteLink" href="javascript:void(0);"><img src="images/delete.png" width="10" height="10"/></a>

			
            <!-- Profile image -->
        </div>
        </div>
    </div>
</div>
                </div>
				
				
              </div>
              
            </div>

			
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
         
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
       
           
            
          
		  
	
		  
    
        
		
	<?php if(isset($message)){
						$me=$message;
						unset($_SESSION['message']);
					  ?>
<div class="alert alert-primary" id="message2" role="alert">
<?=$me?></div> <?php
}

?>
	     
           <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
	<h4 class="card-title">Contact Admin</h4>

<form action="sendmail.php" method="post">		
			
			
			<div class="form-group row">
									<label for="id" class="col-sm-3 col-form-label"> Subject </label>
									<div class="col-sm-9">
							<input class="subject" name="subject" id="subject" required type="text"/>
								</div>
				</div>
						
					<input type="hidden" name="mail" value="<?=$mail?>">
												<input type="hidden" name="username" value="<?=$user?>">

				<div class="form-group row">
									<label for="id" class="col-sm-3 col-form-label"> Message </label>
									<div class="col-sm-9">
							<textarea class="message" rows="4" cols="40" name="message" required id="messagearea" placeholder="Type your Message here"></textarea>
								</div>
				</div>		
				

				
				
                <button type="submit" id="message_send" name="import"
                     class="btn btn-success btn-fw">Send Email</button>
        
				
				</form>
                  
                </div>
              </div>
            </div>
          </div>
      
		
		       
		
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        <!-- content-wrapper ends -->
        
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
  
</body>



</html>