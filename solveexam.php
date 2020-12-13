<!DOCTYPE html>
<?php
header('Cache-Control: no cache'); //disable validation of form by the browser
session_cache_limiter('private, must-revalidate');

include 'userauthentication.php';
extract($_SESSION);
extract($_POST);

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
		<script src="user.js"></script>
				<script src="userchoice.js"></script>

		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

				<script src="userchoice.js"></script>

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
<script type="text/javascript" src="js/testscore.js"></script>

</head>

<body>
	
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
            
            <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
            <img src="<?php echo $userPictureURL; ?>" class="img-circle" alt="Cinque Terre" width="70" height="70">

            <!-- Image update link -->
           

			
            <!-- Profile image -->
        </div>
        </div>
    </div>
</div>
                </div>
				
				
              </div>
              
            </div>

			
          </li>
          
          
        </ul>
      </nav>
	  
	  
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        
         
       <div class="row exam" id="source-html">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h1>Quiz Questions</h1>
					<em id="note"></em>
						</br></br>
                  <div class="table-responsive">
				<?php	$index=0;
					$questions=$conn->query("select e.exam_id,eq.question_id,q.description,q.answers,q.correct_answer,q.score from exams e join exam_questions eq on e.exam_id=eq.exam_id join questions q on q.id=eq.question_id where lecture_id='$lecture_id'");
					foreach($questions as $record){
					$index++;
					$description=$record[2];
					$answers=explode(",",$record[3]);
					$correct_answer=$record[4];
					$score=$record[5];
					?>
					<h2>Question <?=$index?></h2> <h3>Score: <span class="sq<?=$index?>"><?=$score?></span> pts</h3>
					<em><?=$description?></em></br></br>
					<?php foreach($answers as $a){ ?>
					<input class="aq<?=$index?>" type="checkbox" value="<?=$a?>"><?=$a?></input>
					<?php } ?>
					<input type="hidden" class="cq<?=$index?>" value="<?=$correct_answer?>"/>
					 </br>
					<div id="status<?=$index?>"></div>
				</br> <?php
					} ?>
					

                  </div>
			<input type="hidden" value="<?=$index?>" id="noofq"/>
			<button type="button" id="test" 
                     class="btn btn-success btn-fw">See Result</button>
			<h1 id="result"></h1>
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