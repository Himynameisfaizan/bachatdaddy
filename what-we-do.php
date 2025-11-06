<?php
    include 'config/config.php';
    include 'functions/bachatdaddyfunctions.php';
    $common = new Common();
    $industry=$common->getAllIdustry();
?><!DOCTYPE html>
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


        <!--Page Header Start-->
        <section class="page-header-what-we">
            <div class="page-header__bg-what-we" style="background-image: url(images/backgrounds/bg-what.jpg);">
            </div>
            
            <div class="container">
                <div class="page-header__inner">
                    <h2 style="color: #0f0c0c">What <span style="color: #ee8d21">We</span> <span>Do</span></h2>
                    <p style="margin: 10px 0px 20px 0px">With the BACHATDADDY Card, every spend turns into an opportunity to save smartly while enjoying premium services. 
                        It’s the perfect companion for a lifestyle that values quality, convenience, and affordability.</p>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php" style="color: #0f0c0c">Home</a></li>
                        <li><span class="icon-down-arrow" style="color: #0f0c0c"></span></li>
                        
                        <li style="color: #0f0c0c">What We Do</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="services-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="services-details__right">

                            <div class="services-details__img-and-feature">
                                <div class="services-details__feature">
                                    <ul class="services-details__feature-points list-unstyled">
                                        <li>
                                            <div class="icon">
                                                <img src="images/deal.png" alt="">
                                                <!-- <span class="icon-icon-business-consulting"></span> -->
                                            </div>
                                            <div class="content">
                                                <h3>Exclusive Partnerships</h3>
                                                <p>
                                                    Access special deals from top hotels, restaurants, and lifestyle brands through BACHATDADDY’s exclusive tie-ups.
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <img src="images/profit.png" alt="">
                                                <!-- <span class="icon-icon-customer-support"></span> -->
                                            </div>
                                            <div class="content">
                                                <h3>Real Savings, Premium Benefits</h3>
                                                <p>
                                                    Enjoy genuine savings and premium rewards on every purchase without compromising on quality.
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="what-we-do-content">
                                <h3 class="services-details__title-1">What We Do</h3>
                                <p class="services-details__text-1">
                                    The BACHATDADDY Card is your key to exclusive 
                                    discounts across a broad range of categories, 
                                    including hotel bookings, restaurant dining, resorts, 
                                    educational services, health products, gym memberships, 
                                    salon treatments, and more. With BACHATDADDY, you unlock 
                                    premium savings on essentials and lifestyle purchases, 
                                    allowing you to enjoy quality services and experiences 
                                    without breaking the bank. From everyday needs to special 
                                    occasions, BACHATDADDY empowers you to save more and live 
                                    better with every swipe.
                                </p>
                            </div>

                            <div class="services-details__img-and-feature">
                                <div class="services-details__feature">
                                    <ul class="services-details__feature-points list-unstyled">
                                        <li>
                                            <div class="icon">
                                                <img src="images/dependencies.png" alt="">
                                                <!-- <span class="icon-icon-business-consulting"></span> -->
                                            </div>
                                            <div class="content">
                                                <h3>Trusted Network & Transparent Privileges</h3>
                                                <p>
                                                Benefit from a trusted partner network offering clear, reliable, and valuable privileges every time.
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <img src="images/satisfaction.png" alt="">
                                                <!-- <span class="icon-icon-customer-support"></span> -->
                                            </div>
                                            <div class="content">
                                                <h3>Smarter Living, Better Lifestyle</h3>
                                                <p>
                                                    Save more and enjoy premium experiences that make everyday living smarter and more rewarding.
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row mt-10">
                    <div class="col-lg-12">
                        <h3 class="services-details__title-2">Benefits With Our Service</h3>
                        <p class="services-details__text-2">Enjoy exclusive discounts, seamless redemption, and 24/7 support, making every experience more rewarding with BACHATDADDY Card.</p>
                        <ul class="services-details__points list-unstyled">
                            <li>
                                <img src="images/discount.png" class="what-we-do-icon" alt="discount-icon">
                                <h5>Exclusive Discounts</h5>
                                <p>
                                    Unlock special offers on top hotels, restaurants, and resorts to make every outing more affordable.
                                </p>
                            </li>
                            <li>
                                <img src="images/save-money.png" class="what-we-do-icon" alt="save-money-icon">
                                <h5>Smart Savings</h5>
                                <p>
                                    Enjoy unbeatable savings on education, healthcare, and fitness services that add value to your lifestyle.
                                </p>
                            </li>
                            <li>
                                <img src="images/easy.png" class="what-we-do-icon" alt="easy-icon">
                                <h5>Easy Redemption</h5>
                                <p>
                                    Use your card effortlessly at trusted partner outlets for instant access to benefits and rewards.
                                </p>
                            </li>
                            <li>
                                <img src="images/clock.png" class="what-we-do-icon" alt="clock-icon">
                                <h5>24/7 Support</h5>
                                <p>
                                    Get round-the-clock customer assistance to resolve your queries anytime, anywhere.
                                </p>
                            </li>
                            <li>
                                <img src="images/keycard.png" class="what-we-do-icon" alt="keycard-icon">
                                <h5>Hassle-Free Access</h5>
                                <p>
                                    Experience smooth and easy access to exclusive premium deals without any complications.
                                </p>
                            </li>
                            <li>
                                <!-- <img src="images/needs.png" class="what-we-do-icon" alt="needs-icon"> -->
                                <img src="images/standardquality.png" class="what-we-do-icon" alt="needs-icon">
                                <h5>Affordable Lifestyle</h5>
                                <p>
                                    Discover quality lifestyle products and services designed to fit every budget.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <!-- FAQ start -->
        <section class="pb-75">
            <div class="container">
                <h3 class="services-details__title-4">Frequently Asked Questions</h3>
                <div class="services-details__faq">
                    <div class="accrodion-grp" data-grp-name="services-details-accrodion">
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h4><span>Q1.</span> What is the BACHATDADDY Card?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>The BACHATDADDY Card offers exclusive discounts across various categories such as hotels, dining, education, health, and more.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion active">
                            <div class="accrodion-title">
                                <h4><span>Q2.</span> How can I redeem my discounts?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Simply present your BACHATDADDY Card at participating outlets to instantly enjoy discounts on your purchases.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h4><span>Q3.</span> Is there a membership fee for the BACHATDADDY Card?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Yes, there is a nominal fee for the card. For details, please refer to our pricing page.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h4><span>Q4.</span> Can I use the card for online purchases?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>The card can be used for discounts at partner outlets both in-store and online, depending on the vendor.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h4><span>Q5.</span> What if I need help with my card?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Our customer support team is available 24/7 to assist with any issues or inquiries you may have.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQ end -->
        


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