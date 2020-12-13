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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="bootbox/bootbox.min.js"></script>
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="jqueryurls/jquery.redirect.js"></script>
<script type="text/javascript" src="js/user.js"></script>
</head>

<body>
<SCRIPT type="text/javascript">    
           var path = 'user.php';
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
	  
	  <input type="hidden" value="<?=$student_id?>" name="student_id">

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
				                <input type="hidden" name="student_id" value="<?=$student_id?>"/>

            </form>
			
			 <form method="post" action="delete.php" enctype="multipart/form-data" id="picDeleteForm">
				                <input type="hidden" name="student_id" value="<?=$student_id?>"/>

            </form>
            <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
            <img src="<?=$userPictureURL?>" class="img-circle" alt="Cinque Terre" width="70" height="70">

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
              <span class="menu-title">Dashboard</span>	</br></br>
            </a>
			

          </li>
          <li class="nav-item">

            <a class="nav-link" href="user_chat_portal.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">User Chat Portal</span>	</br></br>
            </a>
			<input type="hidden" value="<?=$student_id?>" id="student_id"/>
			<em style="margin-left:60px;"><span id="notification_counter">0</span> new message/s</em>

          </li>
 
          <li class="nav-item">

            <a class="nav-link" href="change_password.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Change Password</span>	</br></br>
            </a>
			

          </li>
		  <li class="nav-item">

            <a class="nav-link" href="contact.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Contact Via Email</span>	</br></br>
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
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Number of Courses</p>
                      <div class="fluid-container">
					 
                        <h3 class="font-weight-medium text-right mb-0" id="numberOfCourses"></h3>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Courses Enrolled in</p>
                      <div class="fluid-container">
					  

					  
                        <h3 class="font-weight-medium text-right mb-0" id="numberOfCoursesEnrolled"></h3>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
           
            
          </div>
          
		  <div id="enroll_course_message"></div>
			<div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Top 6 courses</h4>
                  <div class="table-responsive">
				 

                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						<th class="th-sm">Number of students joined</th>

						<th class="th-sm">Course Name</th>
                          <th class="th-sm"> Course Title
                          </th>
						   
						  <th class="th-sm">Author Name
						  </th>
						 
                          <th class="th-sm">Cost
                          </th>
<th class="th-sm">Language
                          </th>
                         


                        </tr>
                      </thead>
					   <tbody id="topcoursesbody">
					 
                      </tbody>
					 
                    </table>
					<?php
					
					?>
                  </div>
                </div>
              </div>
            </div>
          </div>
		   <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All courses (Click on any course to Enroll)</h4>
                  <div class="table-responsive">
				 

                    <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead id="dtBasicExample_thead">
                        <tr>
<th class="th-sm">ID</th>
						<th class="th-sm">Course Name</th>
                          <th class="th-sm"> Course Title
                          </th>
						   <th class="th-sm"> Start Date
                          </th>
                          <th class="th-sm">End Date
                          </th>
						  <th class="th-sm">Author Name
						  </th>
						 
                          <th class="th-sm">Cost
                          </th>
<th class="th-sm">Language
                          </th>
                         

<th class="th-sm">Enrolled
                          </th>
                        </tr>
                      </thead>
					   <tbody>
					  
                      </tbody>
					 
                    </table>
					<?php
					
					?>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  
		  
         
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Enrolled courses (Click on any course to view its lectures)</h4>
                  <div class="table-responsive">
				 

                    <table  id="dtBasicExample2" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
<th class="th-sm">ID</th>
						<th class="th-sm">Course Name
                          </th>
                          <th class="th-sm">Course Title
                          </th>
						   <th class="th-sm">Start Date
                          </th>
                          <th class="th-sm">End Date
                          </th>
						  <th class="th-sm">Author Name
						  </th>
						 
                          <th class="th-sm">Cost
                          </th>
<th class="th-sm">Language
                          </th>
                         


                        </tr>
                      </thead>
					   <tbody>
					   
                      </tbody>
					  
                    </table>
					<?php
					
					?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
	
	

        <!-- content-wrapper ends -->
        <script>
	$(document).ready(function(){
		setInterval(function(){
				$rid = $('#room_id').val();
				if($rid != ''){
			displayMessages();

			}
		}, 1000);


	$('#open_chat_room').on('click', function(){
			$sid = $('#student_id').val();
				$.ajax({
					type: "GET",
					url: "open_chat_room.php",
					data: {
						student_id: $sid,
					},
					success: function(){
					}
				});
				
		});
	$('#send_message').on('click', function(){
			$sid = $('#student_id').val();
			$rid = $('#room_id').val();
			$message = $('#messageval').val();
			if($message != ''){
				$.ajax({
					type: "GET",
					url: "send_message.php",
					data: {
						student_id: $sid,
						room_id: $rid,
						message: $message

					},
					success: function(){
				$('#messageval').val('');
				
					}
				});
}
				
		});
		function displayMessages(){
			var chat_messages_div = $('#chat_messages');

			$rid = $('#room_id').val();
				$.ajax({
					type: "GET",
					url: "display_messages.php",
					dataType:"JSON",
					data: {
						room_id: $rid,
					},
					success: function(response){

					console.log("res "+response);
					 var len = response.length;
					for(var i=0; i<len; i++){
                $id = response[i].id;
                $message = response[i].message;
				
				if($id != '0'){
				$("<p>").css("float","right").text($message+"").appendTo(chat_messages_div);
				
				}
				else{
				$("<p>").text($message+"").appendTo(chat_messages_div);

				}
				$('<br/>').appendTo(chat_messages_div);
				$('<br/>').appendTo(chat_messages_div);

				}
					}
				});
		}
});
</script>
		

		
        <!-- content-wrapper ends -->
        
	  

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
  <!--Start of Zendesk Chat Script-->

<!--End of Zendesk Chat Script-->
  <!-- End custom js for this page-->
</body>

</html>