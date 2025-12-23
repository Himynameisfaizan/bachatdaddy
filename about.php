<?php
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
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

<body class="custom-cursor" style="background-color: #f8f9fb;">

    <div class="page-wrapper">

        <!--**********************************
            Header start ti-comment-alt
        ***********************************-->


        <?php require('include/header.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->


        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(images/backgrounds/12375.jpg);">
            </div>

            <div class="container">
                <div class="page-header__inner">
                    <h2>About Us</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><span class="icon-down-arrow"></span></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--About Two Start -->
        <section class="about-two">

            <div class="container">
                <div class="row">
                    <div class="col-xl-6 ">
                        <div class="about-one__left">
                            <div class="about-two__img wow fadeIn" data-wow-delay="100ms"
                                data-wow-duration="900ms">
                                <div class="about-one__img">
                                    <img src="images/resources/214.jpg" alt="">
                                </div>
                                <div class="about-one__img-2">
                                    <img src="images/resources/2150.jpg" alt="">
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 ">
                        <div class="about-two__img wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="about-one__right">
                                <div class="section-title text-left">
                                    <div class="section-title__tagline-box">
                                        <p class="section-title__tagline">KNOW MORE</p>
                                    </div>
                                    <h2 class="section-title__title"> Your Best Partner for Big Savings</h2>
                                </div>
                                <p class="about-one__text"><b>ECOBBACHAT DADDY OPC PRIVATE LIMITED</b> operates the brand <b>BACHAT DADDY.</b> 
                                    We have a special <b>discount card</b> that will save your money 
                                    when you stay at the Finest <b>Hotels, Resorts, Dine at Restaurants, Enjoying 
                                    at Bars, and Shop at Lifestyle</b> Places in India. Our ambition 
                                    is to provide you with excellent offers and make your daily experiences more comfortable and enjoyable.
                                </p>
                                <ul class="about-one__points list-unstyled">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                            <!-- <img src="images/icons/check-circle-svgrepo-com.svg" alt=""> -->
                                        </div>
                                        <div class="text">
                                            <p>Exclusive Discounts on Hotel Bookings and Travel</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Special Savings on Education and Health</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Exclusive Deals on Entertainment Activities</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Special Offers on Fashion and Grooming Products</p>
                                        </div>

                                    </li>
                                </ul>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container" style="background-color: #f8f9fb;">
                <!--------------------------- 
                Recrete Design start 
                ----------------------------->
                <div class="row mt-10">
                    <div class="row">
                        <div class="col-5 about-icon-container">
                            <h5>The Journey and Purpose Behind Bachatdaddy</h5>
                        </div>
                    </div>
                    <div class="row story-mission-container">
                        <div class="col-xl-6 wow fadeIn our-story"  data-wow-delay="100ms"
                            data-wow-duration="600ms">
                            <div class="our-story-mission">
                                <img src="images/icons/vision-svgrepo-com.svg" alt="">
                                <p class="section-title__tagline">Our Vision</p>
                            </div>
                            <p class="text-justify mt-2 mt-lg-4 about-para">
                                Our vision is to build a smart saving culture in India, 
                                where saving money becomes a part of everyday life. 
                                We aim to help every customer save more with every purchase, 
                                while enabling businesses to connect with genuine 
                                customers—without spending heavily on marketing.
                            </p>
                        </div>
                        <div class="col-xl-6 wow fadeIn" data-wow-delay="100ms"
                            data-wow-duration="600ms">
                            <div class="our-story-mission">
                                <img src="images/icons/archery-target-svgrepo-com.svg" alt="">
                                <p class="section-title__tagline">Our Mission</p>
                            </div>
                            <p class="text-justify mt-2 mt-lg-4 about-para">
                                At Bachatdaddy, our goal is to bridge the gap between top brands 
                                and value-conscious customers through a trusted 
                                privilege network that benefits everyone. Customers get to 
                                save more, while brands build loyal and repeat customers.
                                We are on a mission to change the way people enjoy life — helping 
                                them experience more, worry less, and make smarter choices.
                                Because for us, saving isn’t just about money; it’s about freedom, choice, and happiness.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!------------------------------ 
                Recrete Design end
                -------------------------------->
            </div>
        </section>
        <!--About Two End -->

        <!--Process One Start -->
        <section class="process-one process-two pt-90">
            <div class="container">
                <h3 class="section__title-two">Our Work process</h3>
                <div class="process-one__inner">
                    <div class="process-one__shape-1">
                        <img src="images/shapes/process-one-shape-1.png" alt="">
                    </div>
                    <!-------------------------------
                     Re-create Design start
                    --------------------------------->
                    <!--Process One Single Start-->
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-6">
                            <div class="work-process-container">
                                <div class="work-process-count">
                                    <div class="process-one__count"></div>
                                </div>
                                <div class="process-one__single">
                                    <h3 class="process-one__title">Register Yourself</h3>
                                    <p class="process-one__text">Sign up for BACHATDADDY to unlock incredible discounts on
                                        hotels, resorts, medicine, education, and more.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-6">
                            <div class="work-process-container">
                                <div class="work-process-count">
                                    <div class="process-one__count"></div>
                                </div>
                                <div class="process-one__single">
                                    <h3 class="process-one__title">Make Payment & Get Your Discount Card</h3>
                                    <p class="process-one__text">Securely complete the payment process to activate your BACHATDADDY card and access discounts.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-6">
                            <div class="work-process-container">
                                <div class="work-process-count">
                                    <div class="process-one__count"></div>
                                </div>
                                <div class="process-one__single">
                                    <h3 class="process-one__title">Explore Discounts</h3>
                                    <p class="process-one__text">Discover exclusive deals on top hotels, resorts, medical services, educational institutes, and various other categories.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-6">
                            <div class="work-process-container">
                                <div class="work-process-count">
                                    <div class="process-one__count"></div>
                                </div>
                                <div class="process-one__single">
                                    <h3 class="process-one__title">Show Your Card & Enjoy Instant Discounts</h3>
                                    <p class="process-one__text">Present your BACHATDADDY card at participating partners to enjoy instant savings on your purchases.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!------------------------------
                     Re-create Design end
                    -------------------------------->
                </div>
            </div>
        </section>
        <!--Process One End -->









        <!--**********************************
           footer start ti-comment-alt
        ***********************************-->


        <?php require('include/footer.php'); ?>
        <!--**********************************
            footer end ti-comment-alt
        ***********************************-->

    </div><!-- /.page-wrapper -->

    <?php require('include/mobilefooter.php')?>

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