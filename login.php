<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if it hasn't started already
}
    include 'config/config.php';
    include 'functions/bachatdaddyfunctions.php';
    $common = new Common();
    $industry=$common->getAllIdustry();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> BACHATDADDY </title>
    <!-- favicons Icons -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/resources/logo.jpg">

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
    <script src="js/bachat-daddy.js"></script>
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
        <!--Page Header Start-->
        <!-- <section class="page-header">
            <div class="page-header__bg" style="background-image: url(images/backgrounds/page-header-bg.jpg);">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Login</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><span class="icon-down-arrow"></span></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </section> -->
        <div class="section">
            <div class="login-container">
                <div class="row login-row">

                    <div class="col-lg-6  login-content">
                        <div class="andro_auth-wrapper d-flex">
                            <div class="andro_auth-form">
                                <h2>Login</h2>
                                <form id="loginForm" method="post" onsubmit="return submitForm('loginForm')" novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="option1">user</label>
                                        <input type="radio" id="option1" name="options" value="user">

                                        <label for="option2">Vendor</label>
                                        <input type="radio" id="option2" name="options" value="vendor">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="userId" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                    <div class="form-group text-right">
                                        <a href="forget.php" class="forgot-password">Forgot Password?</a>
                                    </div>
                                    <button type="submit" name="submit" class="thm-btn btn-p mb-3">Login</button>                
                                    <p class="d-flex justify-content-center">Don’t have an account? <a href="user.php" class="ml-1">&nbsp;Create</a></p>
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

    <?php require ('include/mobilefooter.php')?>
    
    <script src="vendors/jquery/jquery-3.6.0.min.js"></script>
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
    
<script>
       
    function validateForm(formName) {
        var form = $('#' + formName);
        
        // Initialize jQuery Validation
        form.validate({
            rules: {
                userId: {
                    required: true,  // User ID is required
                },
                password: {
                    required: true,  // Password is required
                }
            },
            messages: {
                userId: {
                    required: "Please enter your User ID."  // Error message for User ID
                },
                password: {
                    required: "Please enter your password."  // Error message for Password
                }
            },
            // Stop the form submission if validation fails
            submitHandler: function() {
                return true;  // Validation passed, return true to submit the form
            }
        });

        // Check if form is valid before submitting
        return form.valid();  // Return true if form is valid
    }


    function submitForm(formName) {
        var form = document.getElementById(formName);
        
        if (validateForm(formName)) {
            var formData = new FormData(form);
            
            // Disable submit button to prevent multiple submissions
            var submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            // submitButton.textContent = 'Submitting...';
            
            // Perform AJAX request to submit the form
            $.ajax({
                url: 'login-user.php',  // Update with the appropriate server-side script
                type: 'POST',
                data: formData,
                contentType: false, 
                processData: false,
                beforeSend: function() {
                        console.log("Sending request to user.php...");
                    },
                    success: function(response) {
                        console.log("AJAX request sent successfully.");
                        console.log('Raw Response:', response);
        
                        if (response.status === 'success') {
                            form.reset(); 
                            window.location.href = response.redirect;
                        } else {
                            alert("Error: " + response.message);
                            form.reset();
                        }
        
                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Submit'; 
                    },
                    error: function(xhr, status, error) {
                        console.log('Error response:', xhr.responseText); 
                        alert("AJAX request failed: " + error);
                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Submit';
                    }
            });
        }
        return false;  // Prevent form from submitting normally
    }

</script>
    <script>
        window.onload = function() {
            const userRadio = document.getElementById('option1');
            const vendorRadio = document.getElementById('option2');
            
            if (!userRadio.checked) {
                userRadio.checked = true;
            }
            
            userRadio.addEventListener('change', function() {
                if (userRadio.checked) {
                    console.log('User selected');
                }
            });
            
            vendorRadio.addEventListener('change', function() {
                if (vendorRadio.checked) {
                    console.log('Vendor selected');
                }
            });
        }
    </script>



</body>

</html>