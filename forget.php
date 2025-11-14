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
                                <h2>Enter Your Email</h2>
                                <form id="emailForm" method="post" novalidate="novalidate" onsubmit="redirectToOtpPage(event)">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                    <button type="submit" name="submit" class="thm-btn btn-p mb-3">Send OTP</button>
                                    <p class="d-flex justify-content-center">Don’t have an account? <a href="user.php" class="ml-1">&nbsp;Create</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        


     


        

        

        

        

          <!--Site Footer Three Start-->
          <footer class="site-footer-three">
          
            <div class="container">
                <div class="site-footer-three__middle">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget-three__column footer-widget-three__about">
                                <div class="footer-widget-two__logo">
                                    <a href="index.php"><img src="images/resources/logo-1.jpg"
                                            alt=""></a>
                                </div>
                                <p class="footer-widget-three__about-text">
                                    BACHATDADDY Card helps you save with exclusive discounts on hotels, education, healthcare,  jewellery, and more, making everyday spending more affordable and enhancing your lifestyle.</p>
                                
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget-three__column footer-widget-three__company">
                                <div class="footer-widget-three__title-box">
                                    <h3 class="footer-widget-three__title">Quick Link</h3>
                                </div>
                                <ul class="footer-widget-three__company-list list-unstyled">
                                    <li><a href="#0">About</a></li>
                                    <li><a href="#0">What we Do </a></li>    
                                    <li><a href="#0">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget-three__column footer-widget-three__company">
                                <div class="footer-widget-three__title-box">
                                    <h3 class="footer-widget-three__title">Industry we Serve</h3>
                                </div>
                                <ul class="footer-widget-three__company-list list-unstyled">
                                    <li><a href="#0">Hospitality
                                        </a></li>
                                    <li><a href="#0">Education
                                        </a></li>
                                    <li><a href="#0">Health
                                        </a></li>
                                    <li><a href="#0">Fashion & Grooming
                                        </a></li>
                                    <li><a href="#0">Waterpark</a></li>
                                </ul>
                            </div>
                        </div>
                       
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget-three__column footer-widget-three__subscribe">
                                <div class="footer-widget-three__title-box text-center">
                                    <h3 class="footer-widget-three__title">Contact Us</h3>
                                </div>
                                <ul class="px-0">
                                    <li class="mb-20">
                                        <div class="site-footer-three__contact-list-single">
                                            <div class="icon">
                                                <span class="icon-location-1"></span>
                                            </div>
                                            <div class="content">
                                                <h3>Office Location</h3>
                                                <p>Rahul Pal <br> Abhishek Singh<br>BACHATDADDY, Prayagraj 211008</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-20">
                                        <div class="site-footer-three__contact-list-single">
                                            <div class="icon">
                                                <span class="icon-phone"></span>
                                            </div>
                                            <div class="content">
                                                <h3>Call</h3>
                                                <p><a href="tel:+91-9793944469">+91-9793944469</a></p>
                                                <p><a href="tel:+91-9889769886">+91-9889769886</a></p>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-20">
                                        <div class="site-footer-three__contact-list-single">
                                            <div class="icon">
                                                <span class="icon-envelope"></span>
                                            </div>
                                            <div class="content">
                                                <h3>Email</h3>
                                                <p><a href="mailto:rahulpaul.190492@gmail.com">rahulpaul.190492@gmail.com</a></p>
                                            </div>
                                        </div>
                                    </li>
                            
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer-three__bottom">
                <div class="container">
                    <div class="site-footer-three__bottom-inner">
                        <p class="site-footer-three__bottom-text">© Copyright 2024 ECOBBACHAT DADDY (OPC) PVT LTD?
                        </p>
                        <div class="site-footer-three__bottom-text">
                            <a href="#">Designed By Aws</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Three Footer End-->


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
    <script>
        function redirectToOtpPage(event) {
            event.preventDefault(); // Prevents the form from submitting normally
            // You can add email validation or other logic here before redirecting if needed
            window.location.href = "otp.php"; // Redirects to the OTP page
        }
    </script>
    <script src="js/bachat-daddy.js"></script>
</body>

</html>