<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
include 'functions/authentication.php';
$common = new Common();
$industry = $common->getAllIdustry();
$id = $_SESSION['USERS_USER_ID'];
$user = new User();
$userdata = $user->getUsersDetails($id);
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

    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
    rel="stylesheet"
    />
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
</head>

<body class="custom-cursor">

    <div class="page-wrapper">
        <!--**********************************
            Header start ti-comment-alt
        ***********************************-->


        <?php require('include/header.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--Profile Start-->
        <section class="team-details">
            <div class="container">
                <div class="team-details__inner">
                    <div class="row dashboard-row">
                        <div class="col-12">
                            <h4 class="dashboard-heading">Welcome to <span><?php echo $userdata['name'];?></span></h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-5">
                                <div class="team-details__left">
                                    <div class="team-details__img">
                                        <img src="<?php echo !empty($userdata['image']) ? 'bachatdaddy@1357admin/adminuploads/images/users/' . $userdata['image'] : 'images/services/male-avatar.jpg'; ?>" alt="">
    
                                    </div>

                                    <div class="team-details__contact-box">
                                        <ul class="team-details__contact-list list-unstyled">
                                            <li>
                                                <div class="icon">
                                                    <i class="ri-file-edit-line"></i>
                                                </div>
                                                <p><a href="complete-profile.php">Edit Profile</a></p>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <i class="ri-edit-2-line"></i>
                                                </div>
                                                <p><a href="change-current-password.php">Change Password</a></p>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <i class="ri-shut-down-line"></i>
                                                </div>
                                                <p><a href="signout.php">Logout</a></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-6 col-lg-7 dashboard-detail">
                                <div class="team-details__right">
                                    <!-- <h3 class="team-details__title-1"><?php echo $userdata['name']; ?></h3> -->
                                    <div class="d-block d-md-flex gap-2 ">
                                        <p class="key">Email :</p>
                                        <p class="value"><?php echo $userdata['email']; ?></p>
                                    </div>
                                    <div class="d-block d-sm-flex gap-2 ">
                                        <p class="key">Contact No :</p>
                                        <p class="value"><?php echo $userdata['phone']; ?></p>
                                    </div>
                                    <div class="d-block d-sm-flex gap-2 ">
                                        <p class="key">Aadhar No :</p>
                                        <p class="value"><?php echo $userdata['adhar']; ?></p>
                                    </div>
                                    <div class="d-block d-sm-flex gap-2 ">
                                        <p class="key">Date of birth :</p>
                                        <p class="value"><?php echo $userdata['birthday']; ?></p>
                                    </div>
                                    <div class="d-block d-sm-flex gap-2 ">
                                        <p class="key">Anniversary :</p>
                                        <p class="value"><?php echo $userdata['anniversary']; ?></p>
                                    </div>
                                    <div class="d-block d-sm-flex gap-2 ">
                                        <p class="key">Address :</p>
                                        <p class="value"><?php echo $userdata['address'] . ", " . $userdata['city'] . ", " . $userdata['pincode'] . ", " . $userdata['state']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--Profile End-->

        <!--**********************************
           footer start ti-comment-alt
        ***********************************-->


        <?php require('include/footer.php'); ?>
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
</body>

</html>