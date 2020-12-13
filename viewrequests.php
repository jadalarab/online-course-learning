<!DOCTYPE html>
<?php
include 'adminauthentication.php';
extract($_SESSION);
extract($_POST);
include 'database.php';	
$code = $_SESSION['pc'];
$_SESSION['programcode'] = $code;

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
  <script src="js/replyall.js"></script>
</head>

<body>
<SCRIPT type="text/javascript">    
           var path = 'viewrequests.php';
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

			 
         
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
           
            
            
          </div>
         
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Requests For CRN <?=$crn?></h4>
                  <div class="table-responsive">
				  <?php
				  $st = "pending..";
				  $cnt=0;
				  	$res=$conn->query("select * from capacityrequest where state='$st' and semestercode='$code'");
					foreach($res as $req){
						$cnt++;
						
						break;
					
					}
					if($cnt==0){?>
					<p>No new requests sent </p>
					<?php
					}
					else{
					?>

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Student Info
                          </th>
							<th>
                            #
                          </th>
						   <th>
                            ID
                          </th>
                          <th>
                            Email
                          </th>
						  <th>
							Major
						  </th>
						 
                          <th>
                            Course Name
                          </th>
                          <th>
                            CRN
                          </th>
                          <th>
                            Reason
                          </th>
                          <th>
                            Reply
                          </th>
						  <th>
                            Select
                          </th>
                        </tr>
                      </thead>
					   <tbody>
					   <?php
					   $nbofrequests = 0 ;
							$info = $conn->query("select requestid,studentid,email,coursename,coursecrn,reason,major from capacityrequest where coursecrn='$crn' and state='pending..' and semestercode='$code'"); 
							
						foreach($info as $values){
							$requestid=$values[0];
							if($requestid > $nbofrequests){
								$nbofrequests = $requestid;
							}
					
							
							$id=$values[1];

							$email=$values[2];
							$coursename=$values[3];
							$coursecrn=$values[4];
							$reason=$values[5];
							$major=$values[6];
							$path='no-image.jpg';
							$names='';	
						$pic = $conn->query("select picture from profiles where email='$email'");
						foreach($pic as $p){
							$path = $p[0];
						}
							$username = $conn->query("select username from students where email='$email'");
						foreach($username as $u){
							$names = $u[0];
						}
						$path = "uploads/images/".$path;
							
						?>
                     
					
                        <tr>
							<td class="font-weight-medium">
							<img src="<?=$path?>"/>
                            <?=$names?>

							
                          </td>
                          <td class="font-weight-medium">
                            <?=$requestid?>
                          </td>
						  <td class="font-weight-medium">
                            <?=$id?>
                          </td>
                          <td class="font-weight-medium">
                            <?=$email?>
                          </td>
						   <td class="font-weight-medium">
                            <?=$major?>
                          
                          </td>
                          
                            <td class="font-weight-medium">
                            <?=$coursename?>
                          
                          </td>
                          <td class="font-weight-medium">
                            <?=$coursecrn?>
                          </td>
                          <td class="font-weight-medium">
                            <?=$reason?>
                          </td>
							<td class="font-weight-medium">
							<form action="requestresponse.php" class="form" method="post">
							<input type="hidden" value="<?=$requestid?>" name="id"/> 
							<input type="hidden" value="<?=$name?>" name="name"/> 
							<input type="hidden" value="<?=$role?>" name="role"/> 

                            <input type="submit" class="btn btn-success btn-fw"id="<?=$requestid?>" value="Reply"/> 
                          </td>    
							<td class="font-weight-medium">
							<?php $cbname = "cb".$requestid?>
                            <input type="checkbox" name="<?=$cbname?>" class="check"/>
                          </td>						  
						  </tr>
                        
                        
                        
						<?php 
						}
					
					
					
					
					
						?>
                      </tbody>
					  
                    </table>
					<?php
					}
					
					?>
					<div id="chance">
					<p>You have the choice to choose all of requests to reply</p>

					Select all : <input type="checkbox" name="<?=$name?>" id="selectall"/>
					<input type="hidden" name="nbofrequests" value="<?=$nbofrequests?>"/>
					<input type="submit" class="btn btn-success btn-fw" id="replyall"  value="Reply" name="replyall"/> 
					</br></br>
					Or check some of requests to reply

					<input type="submit" class="btn btn-success btn-fw" id="replysome" value="Reply" name="replysome"/> 

					</form>
					

					
					</div>
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