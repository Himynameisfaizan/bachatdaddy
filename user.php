<?php
if (!isset($_SESSION)) {
    session_start();
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

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2-1?family=Inter+Tight:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.rawgit.com/jzaefferer/jquery-validation/1.19.5/dist/jquery.validate.min.js"></script>
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
        <section class="">
        </section>
        <div class="section pt-75 pb-75">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="andro_auth-wrapper d-flex">
                            <div class="andro_auth-form">
                                <h2>Sign Up</h2>
                                <form id="signupForm" method="post" onsubmit="return submitForm(event, 'signupForm');">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="Phone Number" name="phone" id="phone" onchange="checkPhone()">
                                        <div id="phoneError" style="color: red;"></div> <!-- Error message container for phone -->
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" onchange="checkEmail()">
                                        <div id="emailError" style="color: red;"></div> <!-- Error message container for email -->
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <button type="submit" name="submit" class="thm-btn submit-btn btn-p mb-3">Sign Up</button>
                                    <p class="d-flex justify-content-center">Already have an Account? <a href="login.php" class="ml-1">&nbsp;Login</a></p>
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

    </div>
    <!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper ">
        <div class="mobile-nav__overlay mobile-nav__toggler "></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content ">
            <span class="mobile-nav__close mobile-nav__toggler "><i class="fa fa-times "></i></span>

            <div class="logo-box ">
                <a href="index.php " aria-label="logo image "><img src="images/resources/Asset 21-8.png " width="250 " alt=" "></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container "></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled ">
                <li><a href="users-list.php " class=" thm-btn-2 ">Users</a></li>
                <li><a href="login.php " class=" thm-btn-2 ">Login</a></li>
                <li>
                    <i class="fa fa-envelope "></i>
                    <a href="mailto:rahulpaul.190492@gmail.com ">rahulpaul.190492@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt "></i>
                    <a href="tel:+91-9793944469 ">+91-9793944469</a>
                </li>
            </ul>
            <!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top ">
                <div class="mobile-nav__social ">
                    <a href="# " class="fab fa-twitter "></a>
                    <a href="# " class="fab fa-facebook-square "></a>
                    <a href="# " class="fab fa-pinterest-p "></a>
                    <a href="# " class="fab fa-instagram "></a>
                </div>
                <!-- /.mobile-nav__social -->
            </div>
            <!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup ">
        <div class="search-popup__overlay search-toggler "></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content ">
            <form action="# ">
                <label for="search " class="sr-only ">search here</label>
                <!-- /.sr-only -->
                <input type="text " id="search " placeholder="Search Here... ">
                <button type="submit " aria-label="search submit " class="thm-btn ">
                    <i class="icon-magnifying-glass "></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->
    <a href="# " data-target="html " class="scroll-to-target scroll-to-top "><i class="icon-right-arrow "></i></a>

<!-- Load jQuery first -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->


<!-- Load Bootstrap (requires jQuery) -->
<script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Load other jQuery-dependent plugins -->
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

<!-- Load other independent scripts -->
<script src="vendors/timepicker/timePicker.js"></script>
<script src="vendors/circleType/jquery.circleType.js"></script>
<script src="vendors/circleType/jquery.lettering.min.js"></script>
<!-- <script src="js/bachat-daddy.js "></script> -->

<script>
    // Function to check if there are any errors
    function checkSubmitButtonStatus() {
        var submitButton = document.querySelector('button[type="submit"]');
        
        // Check if there are any error messages for phone and email
        var phoneError = document.getElementById("phoneError");
        var emailError = document.getElementById("emailError");

        // If either phone or email has an error message, disable the submit button
        if (phoneError || emailError) {
            submitButton.disabled = true;
        } else {
            submitButton.disabled = false;
        }
    }

    // Function to check the phone number
    function checkPhone() {
        var phone = document.getElementById("phone").value;
        var phoneError = document.getElementById("phoneError");

        // Remove any previous error messages
        if (phoneError) {
            phoneError.remove();
        }

        if (phone != "") {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "checkuser.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText.trim());

                    if (response.status === "error") {
                        // Create an error message element
                        var errorMessage = document.createElement("div");
                        errorMessage.id = "phoneError";
                        errorMessage.style.color = "red";
                        errorMessage.textContent = response.message;

                        // Append error message below the phone input field
                        var phoneField = document.getElementById("phone");
                        phoneField.parentNode.appendChild(errorMessage);
                    }

                    // Check if the submit button should be enabled or disabled
                    checkSubmitButtonStatus();
                }
            };
            xhr.send("check=phone&phone=" + phone);
        }
    }

    // Function to check the email
    function checkEmail() {
        var email = document.getElementById("email").value;
        var emailError = document.getElementById("emailError");

        // Remove any previous error messages
        if (emailError) {
            emailError.remove();
        }

        // Make sure the email is not empty
        if (email != "") {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "checkuser.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText.trim());

                    if (response.status === "error") {
                        // Create an error message element
                        var errorMessage = document.createElement("div");
                        errorMessage.id = "emailError";
                        errorMessage.style.color = "red";
                        errorMessage.textContent = response.message;

                        // Append error message below the email input field
                        var emailField = document.getElementById("email");
                        emailField.parentNode.appendChild(errorMessage);
                    }

                    // Check if the submit button should be enabled or disabled
                    checkSubmitButtonStatus();
                }
            };
            xhr.send("check=email&email=" + email);
        }
    }
</script>




<script>
    function submitForm(event, formName) {
        event.preventDefault(); 

        var form = document.getElementById(formName);

        if ($(form).valid()) {
            var submitButton = form.querySelector('.submit-btn');
            submitButton.disabled = true;
            submitButton.innerHTML = 'Submitting...';

            var formData = new FormData(form);

            $.ajax({
                url: 'user-register.php', 
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {},
                success: function(response) {
                    if (response.status === 'success') {
                        form.reset(); 
                        // alert("Sucess: " + response.message);
                        window.location.href = response.redirect;
                    } else {
                        alert("Error: " + response.message);
                    }

                    submitButton.disabled = false;
                    submitButton.innerHTML = 'Submit'; 
                },
                error: function(xhr, status, error) {
                    alert("AJAX request failed: " + error);
                    submitButton.disabled = false;
                    submitButton.innerHTML = 'Submit';
                }
            });
        }
    }
</script>

    <script>
        $(document).ready(function() {
            $("#signupForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    phone: {
                        required: true,
                        // pattern: /^[+0-9]{10,15}$/,
                        minlength: 10,
                        maxlength:15
                        
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your full name.",
                        minlength: "Your name must be at least 3 characters long."
                    },
                    phone: {
                        required: "Please enter your phone number.",
                        pattern:  "Please digit enter your phone number.",
                        minlength: "Please enter a valid phone number.",
                        maxlength: "Please enter a valid phone number 15 ."
                    },
                    email: {
                        required: "Please enter your email address.",
                        email: "Please enter a valid email address."
                    },
                    password: {
                        required: "Please provide a password.",
                        minlength: "Your password must be at least 6 characters long."
                    }
                },
                submitHandler: function(form) {
                    form.submit(); // submit the form if it passes validation
                }
            });
        });
        </script>
        
    
</body>

</html>