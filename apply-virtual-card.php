<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    
  include 'config/config.php';
    include 'functions/bachatdaddyfunctions.php';
    include 'functions/authentication.php';
    $common = new Common();
    $user= new User();

    $userdetail=$user->getUsersDetails($_SESSION['USERS_USER_ID']);
    $industry=$common->getAllIdustry();
    $db = new dbClass();
    $auth = new Authentication();

    $auth->checkSession();
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.rawgit.com/jzaefferer/jquery-validation/1.19.5/dist/jquery.validate.min.js"></script>
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
            
            <div class="container">
                <div class="page-header__inner">
                    <h2><?php echo !empty( $userdetail['adhar']) ? 'Edit Profile'  : 'Complete Profile'; ?></h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><span class="icon-down-arrow"></span></li>
                        
                        <li><?php echo !empty( $userdetail['adhar']) ? 'Edit Profile'  : 'Complete Profile'; ?></li>
                    </ul>
                </div>
            </div>
        </section> -->

        <div class="section pt-75 pb-75">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="andro_auth-wrapper d-flex">
                            <div class="andro_auth-form form-1 w-100">
                                <h2><?php echo !empty( $userdetail['adhar']) ? 'Edit Profile'  : 'Complete Profile'; ?></h2>
                            <form id="profileForm" method="post" onsubmit="return submitForm(event, 'profileForm');">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Profile Image</label>
                                        <input type="file" class="form-control" placeholder="Profile Image" name="image" id="image" accept="image/*">
                                    </div>

                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" value="<?= $userdetail['name']; ?>" placeholder="Full Name" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" value="<?= $userdetail['email']; ?>" placeholder="Email" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="tel" class="form-control" value="<?= $userdetail['phone']; ?>" placeholder="Phone Number" name="phone" id="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="adhar_no">Aadhar Number</label>
                                            <input type="text" class="form-control" value="<?= $userdetail['adhar'] ?? ''; ?>" placeholder="Aadhar Number" name="adhar_no" id="adhar_no">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="representative_name">Representative's Name</label>
                                            <input type="text" class="form-control" value="<?= $userdetail['representative_name'] ?? ''; ?>" placeholder="Representative's Name" name="representative_name" id="representative_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="birthday">Birthday</label>
                                            <input type="date" class="form-control" value="<?= $userdetail['birthday'] ?? ''; ?>" name="birthday" id="birthday">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="anniversary">Anniversary</label>
                                            <input type="date" class="form-control" value="<?= $userdetail['anniversary'] ?? ''; ?>" name="anniversary" id="anniversary">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <select class="form-control" name="state" id="state"  >
                                                <option value="<?php echo $userdetail['state']; ?>" selected><?php echo $userdetail['state']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" value="<?= $userdetail['city'] ?? ''; ?>" placeholder="City" name="city" id="city">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pincode">Pincode</label>
                                            <input type="text" class="form-control" value="<?= $userdetail['pincode'] ?? ''; ?>" placeholder="Pincode" name="pincode" id="pincode">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" placeholder="Address" name="address" id="address" rows="3"><?= $userdetail['address'] ?? ''; ?></textarea>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-12 text-center">
                                        <input type="hidden" class="form-control" value="<?= $userdetail['id']; ?>" name="id" id="user_id">
                                        <button type="submit" name="submit" class="thm-btn btn-p mb-3" id="submitButton">Submit</button>
                                    </div>
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


    <!-- <script src="vendors/jquery-validate/jquery.validate.min.js"></script> You have this twice, so remove one instance -->

    <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="vendors/jquery-ui/jquery-ui.js"></script>

    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/swiper/swiper.min.js"></script>
    <script src="vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="vendors/wow/wow.js"></script>
    <script src="vendors/jarallax/jarallax.min.js"></script>

    <script src="vendors/odometer/odometer.min.js"></script>
    <script src="vendors/wnumb/wNumb.min.js"></script>
    <script src="vendors/circleType/jquery.lettering.min.js"></script>
    <script src="vendors/circleType/jquery.circleType.js"></script>
    <script src="vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>

    <script src="vendors/isotope/isotope.js"></script>
    <script src="vendors/timepicker/timePicker.js"></script>
    <script src="js/state.js"></script>



   <script>
    // Function to validate the form
    function validateForm(formName) {
        var form = $('#' + formName);
        
        // Initialize jQuery Validation
        form.validate({
            rules: {
                name: {
                    required: true, 
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    // phoneUS: true 
                },
                birthday: {
                    required: true,
                    date: true
                },
                adhar_no: {
                    required: true,
                    digits:true,
                    minlength: 12,
                    maxlength: 12  
                },
                state: {
                    required: true,
                    notEmptyOrWhitespace: true
                },
                city: {
                    required: true,
                    minlength: 2
                },
                pincode: {
                    required: true,
                    digits: true,
                    minlength: 6,
                    maxlength: 6
                },
                address: {
                    required: true,
                    minlength: 10
                },
                representative_name: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                name: {
                    required: "Please enter your full name",
                    minlength: "Your name must be at least 3 characters long"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                },
                phone: {
                    required: "Please enter your phone number",
                    phoneUS: "Please enter a valid phone number" // Modify for international format if needed
                },
                birthday: {
                    required: "Please select your birthday",
                    date: "Please enter a valid date"
                },
                adhar_no: {
                    required: "Please enter your Aadhar Number",
                    digits: "Please enter a valid Aadhar Number",
                    minlength: "Aadhar Number must be 12 digits long",
                    maxlength: "Aadhar Number must be 12 digits long"
                },
                state: {
                    required: "Please enter your state",
                    notEmptyOrWhitespace: "Please Select a State"
                },
                city: {
                    required: "Please enter your city",
                    minlength: "City must be at least 2 characters long"
                },
                pincode: {
                    required: "Please enter your pincode",
                    digits: "Please enter a valid pincode",
                    minlength: "Pincode must be 6 digits long",
                    maxlength: "Pincode must be 6 digits long"
                },
                address: {
                    required: "Please enter your address",
                    minlength: "Address must be at least 10 characters long"
                },
                representative_name: {
                    required: "Please enter the representative's name",
                    minlength: "Representative's name must be at least 3 characters long"
                }
            },
            submitHandler: function() {
                return true;  // Validation passed, return true to submit the form
            }
        });
            $.validator.addMethod("notEmptyOrWhitespace", function(value, element) {
            return value.trim().length > 0; // Returns true if the trimmed value has a length greater than 0
        });

        // Check if form is valid before submitting
        return form.valid();  // Return true if form is valid
    }

    // Function to handle the form submission
    function submitForm(event, formName) {
        event.preventDefault();  // Prevent default form submission

        var form = document.getElementById(formName);
        var submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = true;  // Disable the submit button to prevent multiple submissions
        submitButton.innerHTML = 'Submitting...';

        if (validateForm(formName)) {
            var formData = new FormData(form);
            
            // Debugging: Log FormData content to check what is being sent
            console.log("Form Data:");
            for (var [key, value] of formData.entries()) {
                console.log(key + ": " + value);
            }

            // Perform AJAX request to submit the form
            $.ajax({
                url: 'user-com-profile.php',  // The AJAX request path remains unchanged
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    console.log("Sending request to user-com-profile.php...");
                },
                success: function(response) {
                    console.log("AJAX request sent successfully.");
                    console.log('Raw Response:', response);
        
                    if (response.status === 'success') {
                        form.reset();  // Reset form if successful
                        window.location.href = response.redirect;  // Redirect to the new page
                    } else {
                        alert("Error: " + response.message);  // Alert the error message
                        form.reset();  // Reset form if there is an error
                    }

                    submitButton.disabled = false;  // Re-enable the submit button
                    submitButton.innerHTML = 'Submit';  // Change button text back to 'Submit'
                },
                error: function(xhr, status, error) {
                    console.log('Error response:', xhr.responseText); 
                    alert("AJAX request failed: " + error);
                    submitButton.disabled = false;  // Re-enable the submit button
                    submitButton.innerHTML = 'Submit';  // Change button text back to 'Submit'
                }
            });
        } else {
            submitButton.disabled = false;  // Re-enable the submit button if validation fails
            submitButton.innerHTML = 'Submit';  // Change button text back to 'Submit'
        }

        return false;  
    }
</script>
</body>

</html>