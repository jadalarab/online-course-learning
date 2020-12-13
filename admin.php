<!DOCTYPE html>
<?php
include 'adminauthentication.php';
include 'database.php';	
extract($_POST);
extract($_SESSION);

$name=$_SESSION['name'];
$role=$_SESSION['role'];
$_SESSION['name']=$name;
$_SESSION['role']=$role;



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
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<!-- MDBootstrap Datatables  -->
<link href="datatables/css/addons/datatables.min.css" rel="stylesheet">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
    <style>.fb-livechat,.fb-widget{display:none}.ctrlq.fb-button,.ctrlq.fb-close{position:fixed;right:24px;cursor:pointer}.ctrlq.fb-button{z-index:1;background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;width:60px;height:60px;text-align:center;bottom:24px;border:0;outline:0;border-radius:60px;-webkit-border-radius:60px;-moz-border-radius:60px;-ms-border-radius:60px;-o-border-radius:60px;box-shadow:0 1px 6px rgba(0,0,0,.06),0 2px 32px rgba(0,0,0,.16);-webkit-transition:box-shadow .2s ease;background-size:80%;transition:all .2s ease-in-out}.ctrlq.fb-button:focus,.ctrlq.fb-button:hover{transform:scale(1.1);box-shadow:0 2px 8px rgba(0,0,0,.09),0 4px 40px rgba(0,0,0,.24)}.fb-widget{background:#fff;z-index:2;position:fixed;width:360px;height:435px;overflow:hidden;opacity:0;bottom:0;right:24px;border-radius:6px;-o-border-radius:6px;-webkit-border-radius:6px;box-shadow:0 5px 40px rgba(0,0,0,.16);-webkit-box-shadow:0 5px 40px rgba(0,0,0,.16);-moz-box-shadow:0 5px 40px rgba(0,0,0,.16);-o-box-shadow:0 5px 40px rgba(0,0,0,.16)}.fb-credit{text-align:center;margin-top:8px}.fb-credit a{transition:none;color:#bec2c9;font-family:Helvetica,Arial,sans-serif;font-size:12px;text-decoration:none;border:0;font-weight:400}.ctrlq.fb-overlay{z-index:0;position:fixed;height:100vh;width:100vw;-webkit-transition:opacity .4s,visibility .4s;transition:opacity .4s,visibility .4s;top:0;left:0;background:rgba(0,0,0,.05);display:none}.ctrlq.fb-close{z-index:4;padding:0 6px;background:#365899;font-weight:700;font-size:11px;color:#fff;margin:8px;border-radius:3px}.ctrlq.fb-close::after{content:'x';font-family:sans-serif}</style>
<!-- MDBootstrap Datatables  -->

<script type="text/javascript" src="datatables/js/addons/datatables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script type="text/javascript" src="js/admin.js"></script>
<style>
/* A CIRCLE LIKE BUTTON IN THE TOP MENU. */
    #noti_Button {
        width:22px;
        height:22px;
        line-height:22px;
        border-radius:50%;
        -moz-border-radius:50%; 
        -webkit-border-radius:50%;
        background:#FFF;
        margin:-3px 10px 0 10px;
        cursor:pointer;
    }
        
    /* THE POPULAR RED NOTIFICATIONS COUNTER. */
    #noti_Counter {
        display:block;
        position:absolute;
        background:#E1141E;
        color:#FFF;
        font-size:12px;
        font-weight:normal;
        padding:1px 3px;
        margin:-8px 0 0 25px;
        border-radius:2px;
        -moz-border-radius:2px; 
        -webkit-border-radius:2px;
        z-index:1;
    }
        
    /* THE NOTIFICAIONS WINDOW. THIS REMAINS HIDDEN WHEN THE PAGE LOADS. */
    #notifications {
        display:none;
        width:430px;
        position:absolute;
        top:30px;
        left:0;
        background:#FFF;
        border:solid 1px rgba(100, 100, 100, .20);
        -webkit-box-shadow:0 3px 8px rgba(0, 0, 0, .20);
        z-index: 0;
    }
    /* AN ARROW LIKE STRUCTURE JUST OVER THE NOTIFICATIONS WINDOW */
    #notifications:before {         
        content: '';
        display:block;
        width:0;
        height:0;
        color:transparent;
        border:10px solid #CCC;
        border-color:transparent transparent #FFF;
        margin-top:-20px;
        margin-left:10px;
    }
        
</style>
</head>

<body>

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
              <span class="profile-text">Hello, <?=$_SESSION['name']?>!</span>
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
                  <p class="profile-name"><?=$_SESSION['name']?></p>
                  <div>
                    <small class="designation text-muted"><?=$_SESSION['role']?></small>
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
		 <li class="nav-item">
            <a class="nav-link" href="accounts.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Accounts</span>
            </a>
          </li>
 <li class="nav-item">

            <a class="nav-link" href="admin_chat_portal.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Admin Chat Portal</span>	</br></br>
            </a>
			<em style="margin-left:60px;"><span id="notification_counter">0</span> new message/s</em>

          </li>

 
			
         
         
        </ul>

 
        </ul>
      </nav>
	  
	  
	  
	  
	  
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
           <?php if(isset($uploadcourse)){
						$me=$uploadcourse;
						unset($_SESSION['uploadcourse']);
					  ?>
					  <div class="alert alert-primary" id="message" role="alert">
<?=$me?></div>
 <?php
}

?>
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
                      <p class="mb-0 text-right">Courses</p>
                      <div class="fluid-container">
					  <?php
					  
					    $nbr = $conn->query("SELECT COUNT(name)FROM courses "); 
						foreach ($nbr as $values){
							$c=$values[0];
					  ?>
					  
                        <h3 class="font-weight-medium text-right mb-0"><?=$c?></h3>
						<?php } ?>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
           
            
          </div>
         
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All courses</h4>
                  <div class="table-responsive">
				

                    <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
                          <th class="th-sm">Edit
                          </th>
							<th class="th-sm">Delete
                          </th>

<th class="th-sm">Add Lecture
                          </th>

<th class="th-sm">View Lectures
                          </th>
                        </tr>
                      </thead>
					   <tbody>
					   <?php
							$info = $conn->query("select * from courses"); 
							
						foreach($info as $values){
$id=$values[0];
							$name=$values[1];
						
					
							
							$title=$values[2];

							$start_date=$values[3];
							$end_date=$values[4];
							$author_name=$values[5];
							$cost=$values[6];
														$lang=$values[7];

						
						?>
                     
					
                        <tr>
                         <td class="font-weight-medium">
                            <?=$id?>
                          </td>
						  <td class="font-weight-medium">
                            <?=$name?>
                          </td>
                          <td class="font-weight-medium">
                            <?=$title?>
                          </td>
						   <td class="font-weight-medium">
                            <?=$start_date?>
                          
                          </td>
                          
                            <td class="font-weight-medium">
                            <?=$end_date?>
                          
                          </td>
                          <td class="font-weight-medium">
                            <?=$author_name?>
                          </td>
                          <td class="font-weight-medium">
                            <?=$cost?>
                          </td>
<td class="font-weight-medium">
                            <?=$lang?>
                          </td>
								<td class="font-weight-medium">
						<form action="editcourse.php" method="POST">
<input type="hidden" value="<?=$id?>" name="id"/>

                            <button type="submit" 
                     class="btn btn-success btn-fw">Edit</button>
</form>
                          </td>
<td class="font-weight-medium">
                            <form action="deletecourse.php" method="POST">
<input type="hidden" value="<?=$id?>" name="id"/>
<input type="hidden" value="<?=$name?>" name="name"/>

                            <button type="submit" id="submit" 
                     class="btn btn-success btn-fw">Delete</button>
</form>
                          </td>
<td class="font-weight-medium">
                            <form action="addlecture.php" method="POST">
<input type="hidden" value="<?=$id?>" name="id"/>
<input type="hidden" value="<?=$name?>" name="cname"/>

                            <button type="submit" id="submit" 
                     class="btn btn-success btn-fw">Add Lectures</button>
</form>
                          </td>
<td>
  <form action="viewlectures.php" method="POST">
<input type="hidden" value="<?=$id?>" name="course_id"/>
<input type="hidden" value="<?=$name?>" name="cname"/>

                            <button type="submit" id="submit" 
                     class="btn btn-success btn-fw">View Lectures</button>
</form>
                          </td>
							             
						  </tr>
                        
                        
                        
						<?php 
						}
					
					
					
					
					
						?>
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
	<h4 class="card-title">This section allows you to upload a course</h4>

<form action="uploadcourse.php" method="post">		
			
			
			<div class="form-group row">
									<label for="id" class="col-sm-3 col-form-label"> Course Name </label>
									<div class="col-sm-9">
							<input class="course_upload_data" name="coursename" id="coursename" required type="text"/>
								</div>
				</div>
						<div class="form-group row">
									<label for="id" class="col-sm-3 col-form-label"> Course Title </label>
									<div class="col-sm-9">
							<input class="course_upload_data" name="coursetitle" id="coursetitle" required type="text"/>
								</div>
				</div>			
				<div class="form-group row">
									<label for="id" class="col-sm-3 col-form-label"> Start Date </label>
									<div class="col-sm-9">
							<input class="course_upload_data" name="startdate" required id="startdate" type="date"/>
								</div>
				</div>
				
			<div class="form-group row">
									<label for="id" class="col-sm-3 col-form-label"> End Date </label>
									<div class="col-sm-9">
							<input class="course_upload_data" name="enddate" required id="enddate" type="date"/>
								</div>
				</div>
						<div class="form-group row">
									<label for="id" class="col-sm-3 col-form-label"> Author Name </label>
									<div class="col-sm-9">
							<input class="course_upload_data" name="authorname" required id="authorname" type="text"/>
								</div>
				</div>			
								<div class="form-group row">
									<label for="id" class="col-sm-3 col-form-label"> Cost </label>
									<div class="col-sm-9">
							<input class="course_upload_data" name="cost" required id="cost" type="number"/>
								</div>
				</div>	
				<div class="form-group row">
									<label for="id" class="col-sm-3 col-form-label"> Language Name </label>
									<div class="col-sm-9">
							<input class="course_upload_data" name="lname" required id="lname" type="text"/>
								</div>
				</div>		
				

				
				
                <button type="submit" id="course_upload" name="import"
                     class="btn btn-success btn-fw">Upload Course</button>
        
				
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