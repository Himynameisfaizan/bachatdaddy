<?php
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

        <section class="services-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h3 class="services-details__title-1">Terms and Conditions Policy</h3>
                        <p class="services-details__text-1">Welcome to BACHATDADDY! These Terms and Conditions govern your use of our website and services. By registering and using the BACHATDADDY Card, you agree to these terms.
                        </p>
                        <div class="services-details__right">

                            <div class="conditions-grid-content">
                                <h3 class="process-one__title">Eligibility</h3>
                                <ul>
                                    <li>You must be at least 16 years old to register and use our services. </li>
                                    <li>By signing up, you confirm that the information provided is accurate and complete.</li>
                                </ul>
                            </div>

                            <div class="conditions-grid-content">
                                <h3 class="process-one__title">Membership</h3>
                                <ul>
                                    <li>The BACHATDADDY Card is non-transferable and can only be used by the registered member. </li>
                                    <li>Membership validity as per the plan purchased, starting from the activation date.</li>
                                </ul>
                            </div>

                            <div class="conditions-grid-content">
                                <h3 class="process-one__title">Payment Terms</h3>
                                <ul>
                                    <li>All payments made for the BACHATDADDY Card are final and non-refundable once activated. </li>
                                    <li>You are responsible for ensuring your payment method has sufficient funds.</li>
                                </ul>
                            </div>

                             <div class="conditions-grid-content">
                                <h3 class="process-one__title">Termination</h3>
                                <p>We reserve the right to terminate your membership if any fraudulent activity or misuse of discounts is detected.</p>
                            </div>

                            <div class="conditions-grid-content">
                                <h3 class="process-one__title">Usage of Discounts</h3>
                                <ul>
                                    <li>Discounts are subject to terms and conditions imposed by partnering vendors. </li>
                                    <li>Offers are non-combinable and cannot be exchanged for cash.</li>
                                </ul>
                            </div>

                            <div class="conditions-grid-content">
                                <h3 class="process-one__title">Limitation of Liability</h3>
                                <p>BACHATDADDY is not responsible for any losses incurred due to misuse or unavailability of discounts at partner outlets.</p>
                            </div>

                            <div class="conditions-grid-content">
                                <h3 class="process-one__title">Changes to Terms</h3>
                                <p>We may update these terms from time to time. Continued use of our services signifies acceptance of any changes.</p>
                                <p>For questions or concerns, reach out to us at <a href="mailto:rahulpaul.190492@gmail.com">rahulpaul.190492@gmail.com</a>.</p>
                            </div>

                               
                        </div>
                    </div>
                </div>
            </div>
        </section>

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