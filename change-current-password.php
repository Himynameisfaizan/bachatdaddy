<?php
if (!isset($_SESSION)) {
    session_start();
}
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include 'config/config.php';
    include 'functions/authentication.php';
    include 'functions/bachatdaddyfunctions.php';
    $common = new Common();
    $industry=$common->getAllIdustry();
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
    if ($user->verifyPassword($_SESSION['USERS_USER_ID'], $old_pass)) {
      // Change the password
      if ($user->changePassword($_SESSION['USERS_USER_ID'], $new_pass)) {
        $_SESSION['msg'] = " Password updated successfully ..!!";
      } else {
        $_SESSION['errmsg'] = " Failed to update password ..!!";
      }
    } else {
        $_SESSION['errmsg'] = " Incorrect old password.";
    }
  }
  header('Location: change-current-password.php');
  exit();
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> BACHATDADDY </title>
    <!-- favicons Icons -->
    <link rel="icon" type="image/png" sizes="50x50" href="images/resources/Asset 3.png">
    <meta name="description" content="BACHATDADDY">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2-1?family=Inter+Tight:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/animate/animate.min.css">
    <link rel="stylesheet" href="vendors/animate/custom-animate.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/jarallax/jarallax.css">
    <link rel="stylesheet" href="vendors/jquery-magnific-popup/jquery.magnific-popup.css">
    <link rel="stylesheet" href="vendors/odometer/odometer.min.css">
    <link rel="stylesheet" href="vendors/swiper/swiper.min.css">
    <link rel="stylesheet" href="vendors/bachat-daddy-icons/style.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendors/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="vendors/timepicker/timePicker.css">

    <!-- template styles -->
    <link rel="stylesheet" href="css/bachat-daddy.css">
    <link rel="stylesheet" href="css/bachat-daddy-responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body class="custom-cursor">






    
 


    <div class="page-wrapper">
<!--**********************************
            Header start ti-comment-alt
        ***********************************-->
        
		
		<?php require ('include/header.php'); ?>
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->     

        <div class="section pt-75 pb-75 mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="andro_auth-wrapper d-flex">
                            <div class="andro_auth-form">
                                <h2>Change Password</h2>
                                <form action="change-current-password.php" name="myForm" id="myForm" method="POST" method="POST">
                                        <div class="row mb-3">
                                            <label for="oldPassword" class="col-sm-5 col-form-label"><strong style="font-size: 16px; color: black;">Current Password</strong></label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control" id="oldPassword" name="oldpass" placeholder="Enter your current password" >
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
        

         <!--**********************************
           footer start ti-comment-alt
        ***********************************-->
        
		
		<?php require ('include/footer.php'); ?>
		<!--**********************************
            footer end ti-comment-alt
        ***********************************-->

    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.php" aria-label="logo image"><img src="images/resources/Asset 21-8.png" width="250"
                        alt=""></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled ">
                <li><a href="users-list.php" class=" thm-btn-2  ">Users</a></li>
                <li><a href="login.php" class=" thm-btn-2   ">Login</a></li>
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:rahulpaul.190492@gmail.com">rahulpaul.190492@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+91-9793944469">+91-9793944469</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here...">
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>


    <script src="vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendors/jarallax/jarallax.min.js"></script>
    <script src="vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="vendors/odometer/odometer.min.js"></script>
    <script src="vendors/swiper/swiper.min.js"></script>
    <script src="vendors/wnumb/wNumb.min.js"></script>
    <script src="vendors/wow/wow.js"></script>
    <script src="vendors/isotope/isotope.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="vendors/jquery-ui/jquery-ui.js"></script>
    <script src="vendors/timepicker/timePicker.js"></script>
    <script src="vendors/circleType/jquery.circleType.js"></script>
    <script src="vendors/circleType/jquery.lettering.min.js"></script>




    <!-- template js -->
    <script src="js/bachat-daddy.js"></script>
    <script>
        function redirectToLogin(event) {
            event.preventDefault(); // Prevents the form from actually submitting
            // Perform validation or other logic here if needed
            window.location.href = "login.php"; // Redirects to login page
        }
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
$(document).ready(function() {
    $("#myForm").validate({
        rules: {
            oldpass: {
                required: true
                // minlength: 6
            },
            newpass: {
                required: true,
                minlength: 6
            },
            cnfpass: {
                required: true,
                minlength: 6,
                equalTo: "#newPassword"  // Ensure the confirm password matches new password
            }
        },
        messages: {
            oldpass: {
                required: "Please enter your current password"
                // minlength: "Password must be at least 6 characters long"
            },
            newpass: {
                required: "Please enter your new password",
                minlength: "Password must be at least 6 characters long"
            },
            cnfpass: {
                required: "Please confirm your new password",
                minlength: "Password must be at least 6 characters long",
                equalTo: "Confirm password does not match the new password"
            }
        },
        submitHandler: function(form) {
            form.submit(); // Form will be submitted if validation passes
        }
    });
});
</script>
</body>

</html>