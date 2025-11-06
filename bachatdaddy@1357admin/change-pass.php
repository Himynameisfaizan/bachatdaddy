<?php
if (!isset($_SESSION)) {
    session_start();
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../config/config.php';
require 'functions/authentication.php';

$auth = new Authentication();
$auth->checkSession();
$message="";
$sucess="";

$user = new ChangePassword();

if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Change Password')  {
  
  $old_pass = $_POST['oldpass'];
  $new_pass = $_POST['newpass'];
  $cnf_pass = $_POST['cnfpass'];

  

  // Validate if new password and confirm password match
  if ($new_pass !== $cnf_pass) {
    $_SESSION['errmsg'] = " New password and Confirm password do not match ..!!";
  } else {
    // Validate the old password
    if ($user->verifyPassword($_SESSION['ADMIN_USER_ID'], $old_pass)) {
      // Change the password
      if ($user->changePassword($_SESSION['ADMIN_USER_ID'], $new_pass)) {
        $_SESSION['msg'] = " Password updated successfully ..!!";
      } else {
        $_SESSION['errmsg'] = " Failed to update password ..!!";
      }
    } else {
        $_SESSION['errmsg'] = " Incorrect old password.";
    }
  }
  header('Location: change-pass.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab">
	<meta name="robots" content="">
	<meta name="keywords" content="school, school admin, education, academy, admin dashboard, college, college management, education management, institute, school management, school management system, student management, teacher management, university, university management">
	<meta name="description" content="Discover Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard">
	<meta property="og:title" content="Akademi : School and Education Management Admin Dashboard Template">
	<meta property="og:description" content="Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard">
	<meta property="og:image" content="https://akademi.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Page Title Here -->
	<title>Bachat Daddy</title>

<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/logo/favicon.png">
	<link href="vendor/wow-master/css/libs/animate.css" rel="stylesheet">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="vendor/bootstrap-select-country/css/bootstrap-select-country.min.css">
	<link rel="stylesheet" href="vendor/jquery-nice-select/css/nice-select.css">
	<link href="vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	
	 <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--swiper-slider-->
	<link rel="stylesheet" href="vendor/swiper/css/swiper-bundle.min.css">
	<!-- Style css -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/toastr/css/toastr.min.css">

    <script type="text/javascript">
    function valiDate() {

      if (document.myForm.oldpass.value == '') {

        alert('Please Provide Old Password !');
        document.myForm.oldpass.focus();
        return false;
      }

      if (document.myForm.newpass.value == '') {

        alert('Please Provide New Password !');
        document.myForm.newpass.focus();
        return false;
      }

      if (document.myForm.cnfpass.value == '') {

        alert('Please Enter Confirm Password !!');
        document.myForm.cnfpass.focus();
        return false;
      }

      if (document.myForm.newpass.value != document.myForm.cnfpass.value) {

        alert('Passwords are not Same. Please re-type Password. !!');
        document.myForm.newpass.value = '';
        document.myForm.cnfpass.value = '';
        document.myForm.newpass.focus();
        return false;
      }

      return true;

    }
  </script>
	
</head>

<body>

   


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		

        <div class="nav-header">
            <a href="home.html" class="navbar-brand d-flex align-items-center ">
                <!-- Image that will be changed -->
                <img id="logoImg" class="img-logo img-fluid logo-1" src="images/logo/logo.jpg" alt="Logo">
            </a>
            <a href="home.html" class="navbar-brand d-flex align-items-center ">
                <!-- Image that will be changed -->
                <img id="logoImg" class="img-logo img-fluid logo-2" src="images/logo/favicon.png" alt="Logo">
            </a>
    
            <div class="nav-control" onclick="changeLogo()">
                <div class="hamburger" >
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                    <svg width="26" height="26" viewbox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="22" y="11" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="11" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="22" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="11" y="11" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="11" y="22" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect y="11" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="22" y="22" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect y="22" width="4" height="4" rx="2" fill="#2A353A"></rect>
                    </svg>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
			
		
        <!--**********************************
            Header start ti-comment-alt
        ***********************************-->
        
		
		<?php require ('include/header.php'); ?>
			<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        
		<?php require ('include/sidebar.php'); ?>
		
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
            <!-- container starts -->
            <div class="container-fluid">
                
                <!-- row -->
                <div>
                    <div>
                        <div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">
                            <div class="row">
                                <!-- Column starts -->
                            </div>
                            <!-- Column ends -->
                            
                            <!-- Column starts -->
                            <div class="col-xl-12">
                                <div class="content pt-5">
                                    <h1>Change Password</h1>
                                    <div class="message" style='color:red'><?php if ($message != "") {
                                                                                echo $message;
                                                                            } ?></div>
                                    <div class="message" style='color:green'><?php if ($sucess != "") {
                                                                                echo $sucess;
                                                                                } ?></div>
                                    <br>
                                    <form action="change-pass.php" name="myForm" id="myForm" method="POST" method="POST">
                                        <div class="row mb-3">
                                            <label for="oldPassword" class="col-sm-5 col-form-label"><strong style="font-size: 16px; color: black;">Old Password</strong></label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control" id="oldPassword" name="oldpass" placeholder="Enter your old password" >
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-sm-5 col-form-label"><strong style="font-size: 16px; color: black;">New Password</strong></label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control" id="newPassword" name="newpass" placeholder="Enter your new password" >
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="confirmPassword" class="col-sm-5 col-form-label"><strong style="font-size: 16px; color: black;">Confirm Password</strong></label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control" id="confirmPassword" name="cnfpass"  placeholder="Confirm your new password" >
                                            </div>
                                        </div>
                                        <div class="text-center mb-5">
                                            <button type="submit" name="submit"  value="Change Password" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            
                            
                            
                        </div>
                    </div>    
                </div>
            </div>
            <!-- container ends -->
        </div>
        
                        
       
        <!--**********************************
            Content body end
        ***********************************-->
		
		<!--**********************************
			Footer start
		***********************************-->
		
		<!--**********************************
			Footer end
		***********************************-->
        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>

    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="path/to/metisMenu.min.js"></script> 
	<script src="js/dlabnav-init.js"></script>
	<script src="js/highlight.min.js"></script>
    <script src="vendor/toastr/js/toastr.min.js"></script>
    <script src="js/plugins-init/toastr-init.js"></script>
    <script src="js/custom.min.js"></script>
	
	<!-- code-highlight -->
	<script src="js/highlight.min.js"></script>
	<script>hljs.highlightAll();
		hljs.configure({ ignoreUnescapedHTML: true })
		
	</script>

	<script>
		document.addEventListener('DOMContentLoaded', (event) => {
			document.querySelectorAll('pre code').forEach((el) => {
				hljs.highlightElement(el);
			});
			});
			
	
			
	</script>
      <script>
        <?php if (isset($_SESSION['msg'])): ?>
        toastr.success("<?php echo $_SESSION['msg']; ?>");
        <?php unset($_SESSION['msg']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['errmsg'])): ?>
        toastr.error("<?php echo $_SESSION['errmsg']; ?>");
        <?php unset($_SESSION['errmsg']); ?>
        <?php endif; ?>
  </script>
    <script>
        // Function to change the logo image source
        function changeLogo() {
            var logo = document.getElementById('logoImg');  // Get the image element by its ID
            // Change the image source to the new one
            if (logo.src.indexOf('logo.jpg') > -1) {
                logo.src = 'images/logo/favicon.png';  // Replace with your new image path
            } else {
                logo.src = 'images/logo/logo.jpg';  // Revert to the original image
            }
        }
    </script>
</body>
</html>