<?php
session_start();

include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
include 'functions/authentication.php';

$dbclass = new dbClass();
$common = new Common();

$industry = $common->getAllIdustry();

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
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
        rel="stylesheet" />
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
    <link rel="stylesheet" href="css/virtual-card-vendors.css">
    <link rel="stylesheet" href="css/bachat-daddy-responsive.css">
</head>

<body>
    <?php include('include/header.php') ?>

    <section class="main-detail-container">
        <div class="complete-detail-container">
            <div class="basic-detail-container" id="basicDetail">
                <a href="#basicDetail">
                    <div class="">
                        <span><i class="ri-list-indefinite"></i></span>
                        <span>Basic Detail</span>
                    </div>
                </a>
                <a href="#otherDetail">
                    <div class="">
                        <span><i class="ri-organization-chart"></i></span>
                        <span>Complete Detail</span>
                    </div>
                </a>
            </div>
            <div class="other-detail-container" id="otherDetail">
                <form action="">
                    <div class="">
                        <div class="user-field" >
                            <label for="fullName">Full Name<span>*</span></label>
                            <div class="inputIcon" tabindex="0">
                                <i class="ri-user-3-line"></i>
                                <input type="text" name="" id="fullName" required>
                            </div>
                        </div>
                        <div class="user-field">
                            <label for="emailId">Email-id<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-mail-line"></i>
                                <input type="email" name="" id="emailId" required>
                            </div>
                        </div>
                        <div class="user-field">
                            <label for="contactNo">Contact no.<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-phone-line"></i>
                                <input type="number" name="" id="contactNo" required>
                            </div>
                        </div>
                        <div class="user-field">
                            <label for="contactNo">DOB<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-cake-2-line"></i>
                                <input type="date" name="" id="contactNo" required>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="user-field">
                            <label for="adhar">Aadhar no.</label>
                            <div class="inputIcon">
                                <i class="ri-id-card-line"></i>
                                <input type="text" name="" id="adhar" placeholder="">
                            </div>
                        </div>
                        <div class="user-field">
                            <label for="address">Current Address<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-map-pin-user-line"></i>
                                <input type="text" name="" id="address" required placeholder="">
                            </div>
                        </div>
                        <div class="user-field">
                            <label for="pincode">Pincode<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-map-pin-3-line"></i>
                                <input type="number" name="" id="pincode" required placeholder="">
                            </div>
                        </div>
                        <div class="user-field">
                            <label for="state">State<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-signal-tower-line"></i>
                                <input type="text" name="" id="state" required placeholder="">
                            </div>
                        </div>
                        <div class="user-field">
                            <label for="state">City<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-building-line"></i>
                                <input type="text" name="" id="city" required placeholder="">
                            </div>
                        </div>
                        <div class="user-field">
                            <label for="representative">Representative Name<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-shield-user-line"></i>
                                <input type="text" name="" id="representative" required placeholder="">
                            </div>
                        </div>
                    </div>
                    <button id="apply-btn">Submit</button>
                </form>
            </div>
        </div>
    </section>

    <?php require('include/footer.php'); ?>
    <?php require('include/mobilefooter.php') ?>
</body>

</html>