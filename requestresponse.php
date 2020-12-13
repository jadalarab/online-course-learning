<!DOCTYPE html>
<?php
include 'adminauthentication.php';
extract($_POST);
include 'database.php';	
$_SESSION['pc'] = $_SESSION['programcode'];

 ?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Page</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <script src="js/requestresponse.js"></script>
</head>

<body>
<SCRIPT type="text/javascript">    
           var path = 'requestresponse.php';
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
          <img src="images/aub.jpg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
         
		  <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, <?=$name?>!</span>
              <!--<img class="img-xs rounded-circle" src="images/faces/face1.jpg" alt="Profile image"> -->
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  
                </div>
              </a>
              
              <a class="dropdown-item">
                Check Inbox
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
                  <p class="profile-name"><?=$name?></p>
                  <div>
                    <small class="designation text-muted"><?=$role?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              
            </div>
          </li>
          
 <li class="nav-item">
            <a class="nav-link" href="admin.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
 <li class="nav-item  d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="menu-icon mdi mdi-content-copy"></i>

              <span class="profile-text">Requests</span>
              <!--<img class="img-xs rounded-circle" src="images/faces/face1.jpg" alt="Profile image"> -->
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  
                </div>
              </a>
              
              <a class="dropdown-item" href="requests.php">
			Courses Requests
              </a>
              <a class="dropdown-item" href="admin.php">
			Individual Requests
              </a>
          </li>


			  <li class="nav-item  d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="menu-icon mdi mdi-content-copy"></i>

              <span class="profile-text">Schedules</span>
              <!--<img class="img-xs rounded-circle" src="images/faces/face1.jpg" alt="Profile image"> -->
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  
                </div>
              </a>
              
              <a class="dropdown-item" href="schedulecourses\demo\">
               Courses
              </a>
              <a class="dropdown-item" href="schedulelabs\demo\">
				Labs
              </a>
          </li>
         
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
         
         
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
				
				<?php 
				$all = 0 ;
				if(isset($replyall)  || isset($replysome)){
					$all=1;
					?>
                  <h4 class="card-title">Response Form to Requests</h4>
				  <?php
				  
				}
				else{
					
					
				
				
				?>
				                  <h4 class="card-title">Response Form to Request #<?=$id?></h4>

				<?php
				}
				?>
                  <div class="table-responsive">
				  <form action="completeresponse.php" method="post">
                              <input type="radio"  name="response"  value="approved" > Approve</br>
                              <input type="radio"  name="response" value="declined"> Decline</br>
                              <input type="checkbox"  id="more" name="more" value="extra"> Add response</br>
                   <textarea style="display:none" id="response1" name="response1" cols="70" rows="5"></textarea></br></br>
				   	<input type="hidden" value="<?=$id?>" name="id"/> 
					<input type="hidden" value="<?=$name?>" name="name"/> 
							<input type="hidden" value="<?=$role?>" name="role"/> 
							<?php
							if(isset($replyall) || isset($replysome)){
							for($i = 0 ; $i <= $nbofrequests ; $i++){
								if(isset($_POST['cb'.$i])){
									?>
									<input type="hidden" value="<?=$i?>" name="requestid[]"/>
									<?php
								}
							}
							?>
							

							<?php
							
							}
							
							
							?>
					<input type="hidden" value="<?=$name?>" name="name"/> 
							<input type="hidden" value="<?=$role?>" name="role"/> 
							<input type="hidden" value="<?=$all?>" name="all"/>
				   <input type="submit" class="btn btn-dark btn-fw" value="Send Response"/>
				   
				   <?php
				   
							
							?>
				   </form>
                  </div>
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