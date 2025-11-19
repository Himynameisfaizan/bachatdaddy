<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
$common = new Common();
$industry = $common->getAllIdustry();
$subin = $common->getAllSubIn();


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

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100..900&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Montserrat -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Montserrat -->
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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
        <!-- Main Sllider Start -->
        <section class="main-slider">
            <div class="main-slider__carousel owl-carousel owl-theme thm-owl__carousel"
                data-owl-options='{"loop": true, "items": 1, "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"], "margin": 0, "dots": true, "nav": false, "animateOut": "slideOutDown", "animateIn": "fadeIn", "active": true, "smartSpeed": 1000, "autoplay": true, "autoplayTimeout": 7000, "autoplayHoverPause": false}'>

                <!-- <div class="item main-slider__slide-1">
                    <div class="main-slider__bg" style="background-image: url(images/banner/1.jpg);">
                    </div>
                    <div class="container">
                        <div class="main-slider__content">
                            <h3 class="main-slider__title">Smart Savings. <br> Memorable Experiences.</h3>
                            <p class="main-slider__text mb-4">Enjoy exclusive discounts at hotels, restaurants, pubs &
                                more
                                <br> with the Bachat Daddy Privilege Card.
                            </p>

                            <a class="cta-btn " href="javascript:void(0)">Get Your Card</a>

                        </div>
                    </div>
                </div> -->

                <!-- <div class="item main-slider__slide-2">
                    <div class="main-slider__bg" style="background-image: url(images/banner/2.jpg);">
                    </div>

                    <div class="container">
                        <div class="main-slider__content">
                            <h3 class="main-slider__title">Unlock Big Savings on <br> Hotels, Education, Health, <br>
                                Jewellery </h3>
                            <p class="main-slider__text">BACHATDADDY Card helps you save on hotels, education, <br>
                                healthcare, jewellery, and more, making everyday spending <br> more affordable.</p>

                        </div>
                    </div>
                </div> -->

                <!-- Re-create banner start -->
                <section class='hero-container'>
                    <div class='hero-grid-two-part'>
                        <div class="hero-content">
                            <h1>Make Easier Day <br><span>with</span> <br> Our Card</h1>
                            <p>Save big on Hotels, Education, Healthcare, Jewellery, Lifestyle Outlets and more with BACHATDADDY Card – make every purchase smarter and more rewarding!</p>
                            <div class="btn-to-connect">
                                <a href="contact.php"><button>Apply now</button></a>
                                <!-- <a class="cta-btn " href="javascript:void(0)">Get Your Card</a> -->
                            </div>
                        </div>
                        <div class="hero-image">
                            <img src="images/banner/3.png" alt="">
                        </div>
                    </div>
                </section>
                <!-- Re-create banner end -->

            </div>
    </div>
    </section>
    <!--Main Sllider Start -->

    <!--Feature Two Start -->



    <!--Feature Two End -->

    <!--About Three Start -->
    <section class="feature-two ">
        <div class="container">
            <div class="wow fadeInUp" data-wow-delay="100ms">
                <div class="feature-two__single ">
                    <form id="search" method="post" class="search-form "
                        onsubmit="return submitSearchForm(event, 'search');">
                        <!-- State Select Input -->
                        <div class="d-flex" style="gap: 15px;">
                            <!-- State Select Input -->
                            <div class="search-btn">
                                <div class="form-group">
                                    <select id="state" name="state" class="form-control" onchange="updateCities()">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                            </div>

                            <div class="search-btn">
                                <div class="form-group">
                                    <select class="form-control" name="city" id="city">
                                        <option value="">Select City</option>

                                    </select>
                                </div>
                            </div>

                            <div class="search-btn">
                                <div class="form-group">
                                    <select id="category" name="category" class="form-control"
                                        onchange="updateSubcategories()">
                                        <option value="">Select Industry</option>
                                        <?php foreach ($industry as $category): ?>
                                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Subcategory Select Input -->
                            <div class="search-btn">
                                <div class="form-group">
                                    <select id="subcategory" name="subcategory" class="form-control">
                                        <option value="">Select Subcategory</option>
                                        <!-- Subcategories will be populated based on the selected category -->
                                    </select>
                                </div>
                            </div>



                            <!-- Search Button -->
                            <div class="search-btn">
                                <div class="form-group">
                                    <button type="submit" class="thm-btn btn-p">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>


    <!--Portfolio Three Start -->
    <section class="portfolio-three">
        <div class="container">
            <div class="section-title-three text-center">
                <h2 class="section-title-three__title">Industry We Serve</h2>
            </div>

            <div class="portfolio-three__filter-box">
                <ul class="portfolio-three__filter style1 post-filter list-unstyled clearfix ">
                    <li data-filter=".filter-item" class="active"><span class="filter-text">All</span>
                    </li>
                    <?php foreach ($industry as $category): ?>
                        <li data-filter=".<?= $category['id'] ?>"><span class="filter-text"><?= $category['name'] ?></span></li>
                    <?php endforeach; ?>

                </ul>
            </div>

            <div class="row filter-layout">
                <?php foreach ($subin as $subrow) { ?>
                    <div class="filter-item <?php echo $subrow['industry_id']; ?> ">
                        <div class="portfolio-three__single">
                            <div class="portfolio-three__img-box">
                                <div class="portfolio-three__img">
                                   <a href="vendors.php?id=<?php echo base64_encode($subrow['id']); ?>"> <img src="bachatdaddy@1357admin/adminuploads/images/vendor-category/<?php echo $subrow['image']; ?>"
                                    alt=""></a>
                                    <div class="blur-overlap"></div>
                                        <div class="blur-overlay"></div>
                                </div>
                            </div>
                            <div class="portfolio-three__content">
                                <h3 class="portfolio-three__title">
                                    <!-- <a href="vendors.php?id=<#?php echo base64_encode($category['id']); ?>"><#?php echo $category['name']; ?></a> -->
                                   <?php echo $subrow['name']; ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!--Portfolio Three End -->


    <section class="pt-120 pb-75 bg-why-choose-us">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 ">
                    <div class="about-one__left">
                        <div class="about-one__img-box wow fadeIn animated" data-wow-delay="100ms"
                            data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; 
                                animation-name: fadeIn;">
                            <div class="about-one__img">
                                <img src="images/resources/94752.jpg" alt="">
                            </div>
                            <div class="about-one__img-2">
                                <img src="images/resources/321.jpg" alt="">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-one__right mt-5 ">
                        <div class="section-title text-left">
                            <div class="section-title__tagline-box">
                                <p class="section-title__tagline">ABOUT US</p>
                            </div>
                            <h2 class="section-title__title">Your Gateway For Exclusive Discounts</h2>
                        </div>
                        <p class="about-one__text"> Bachat Daddy was born with a simple idea —<b> to make everyday
                                expenses more affordable for everyone. </b>We noticed that people love going out to
                            hotels, restaurants, pubs, and resorts, but high prices often stop them from enjoying
                            freely. That’s why we decided to create a smart solution the Bachat Daddy Privilege
                            Card.</p>

                        <p class="wow fadeIn animated section-title__tagline mt-4 mb-2 text-start">Our Mission</p>
                        <p class="about-one__text">Our mission is clear — to help people save more while enjoying the
                            best services. <b>We partner with top hotels, restaurants, pubs, and lifestyle businesses
                                to bring you exclusive discounts and privileges</b> with Bachatdaddy, you don’t have to
                            compromise between fun and savings.</p>

                        <div class="about-one__btn-box mt-4">
                            <a href="about.php" class="about-one__btn sthm-btn sjoin-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Three End -->



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



    <section class=" bg-counter ">
        <div class=" container counter-one__inner">

            <ul class="counter-one__count-list list-unstyled">
                <li>
                    <div class="counter-one__icon">
                        <span class="icon-icon-years-experience"></span>
                    </div>
                    <div class="counter-one__count count-box counted">
                        <h3 class="count-text" data-stop="10" data-speed="1500">10</h3>
                    </div>
                    <p class="counter-one__text">Years of Experience</p>
                </li>
                <li>
                    <div class="counter-one__icon">
                        <span class="icon-icon-team-members"></span>
                    </div>
                    <div class="counter-one__count count-box counted">
                        <h3 class="count-text" data-stop="89" data-speed="1500">89</h3>
                    </div>
                    <p class="counter-one__text">Team members</p>
                </li>
                <li>
                    <div class="counter-one__icon">
                        <span class="icon-icon-successful-project"></span>
                    </div>
                    <div class="counter-one__count count-box counted">
                        <h3 class="count-text" data-stop="789" data-speed="1500">789</h3>
                        <span>+</span>
                    </div>
                    <p class="counter-one__text">Successful Projects</p>
                </li>
                <li>
                    <div class="counter-one__icon">
                        <!-- <span class="icon-icon-satisfied-clients"></span> -->
                       <span style="margin-top: -25px;"> <img src="images/experience.png" alt=""></span>
                    </div>
                    <div class="counter-one__count count-box counted">
                        <h3 class="count-text" data-stop="650" data-speed="1500">650</h3>
                        <span>+</span>
                    </div>
                    <p class="counter-one__text">Satisfied Clients</p>
                </li>
            </ul>
        </div>
    </section>

    <section class="bachatdaddy-sections pt-75 pb-75 join-panel" style="background-color: #f1f1f1">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 ">
                    <div class="bachatdaddy-joinus-image">
                        <img src="images/AdobeExpress.png">
                    </div>
                </div>
                <div class="col-xl-8 mt-32">
                    <div class="bachatdaddy-join-us">
                        <div class="bachatdaddy-joinus-text-block">
                            <h2 class="bachatdaddy-section-heading">
                                Join BACHATDADDY Now!
                            </h2>
                            <div class="bachatdaddy-joinus-text pb-4">
                                <p>Take control of your happiness with a BACHATDADDY credit card! Interested in
                                    owning one? Click below to unlock a world of opportunities.</p>
                            </div>
                            <div class="about-one__btn-box">
                                <a href="virtual-card.php" class="about-one__btn thm-btn join-btn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-counter">
        <div class="container pt-75 pb-75">
            <h2 class="section__title-two text-center mb-5">Trusted by Top Brands</h2>
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="images/8354.jpg" alt="Brand Logo">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/vector.png" alt="Brand Logo">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/8142.jpg" alt="Brand Logo">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/hand.png" alt="Brand Logo">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/261.jpg" alt="Brand Logo">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/62d1.jpg" alt="Brand Logo">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/diamond.jpg" alt="Brand Logo">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Why Choose Two Start -->
    <section class="why-choose-two bg-why-choose-us text-center">

        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="why-choose-two__left">
                        <div class="section-title-three text-left">
                            <div class="section-title-three__tagline-box">
                                <p class="section-title-three__tagline">Why Choose Us</p>
                            </div>
                            <h2 class="section-title-three__title">Unlock Big Deals and Savings</h2>
                        </div>
                        <!-- <p class="why-choose-two__text">We are the best agency to help you unlock exclusive deals and save big across various services. With BACHATDADDY, you get access to unbeatable discounts on hotel bookings, dining at top restaurants, gym memberships, medicine purchases, and more.</p> -->
                        <div class="why-choose-section ">
                            <div class="section-parent">
                                <div class="section-icon">
                                    <img src="images/salary.png" alt="">
                                </div>
                                <div class="section-content">
                                    <h5>Save Money Instantly</h5>
                                    <p>Unlock immediate savings on hotel bookings, dining at top restaurants, and
                                        exclusive travel deals.</p>
                                </div>
                            </div>
                            <div class="section-parent">
                                <div class="section-icon">
                                    <img src="images/team.png" alt="">
                                </div>
                                <div class="section-content">
                                    <h5>Access to Premium Partners</h5>
                                    <p>Gain exclusive discounts on gym memberships, wellness services, and select healthcare products.</p>
                                </div>
                            </div>
                            <div class="section-parent">
                                <div class="section-icon">
                                    <img src="images/discounts.png" alt="">
                                </div>
                                <div class="section-content">
                                    <h5>Simple & Hassle-free Usage</h5>
                                    <p>Easily apply discounts on everyday purchases like groceries and personal care with a seamless experience.</p>
                                </div>
                            </div>
                            <div class="section-parent">
                                <div class="section-icon">
                                    <img src="images/giftbox.png" alt="">
                                </div>
                                <div class="section-content">
                                    <h5>Special Offers Updated Regularly</h5>
                                    <p>Discover fresh deals weekly on dining, shopping, and entertainment to maximize your savings.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-0 mt-md-5">
                <div class="col-12 col-md-12 ">
                    <div class="contact-page__left">
                        <h3 class="contact-page__title">Get in Touch</h3>
                        <p class="contact-page__sub-title"></p>
                        <div class="contact-page__form-box">
                            <form id="contactform" class="contact-page__form contact-form-validated"
                                onsubmit="return submitContactForm(event, 'contactform');">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="contact-page__input-box">
                                            <input type="text" placeholder="Enter Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-page__input-box">
                                            <input type="text" placeholder="Phone Number" name="Phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box">
                                            <input type="email" placeholder="Enter Email" name="email">
                                        </div>
                                    </div>


                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box text-message-box">
                                            <h3 class="contact-page__input-title">
                                                <textarea name="message"
                                                    placeholder="Write Your Message"></textarea>
                                        </div>
                                        <div class="contact-page__btn-box">
                                            <button type="submit" class="thm-btn contact-page__btn"><span
                                                    class="fas fa-paper-plane"></span>SEND
                                                MESSAGE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose Two End -->

    <!--**********************************
           footer start ti-comment-alt
        ***********************************-->


    <?php require('include/footer.php'); ?>
    <!--**********************************
            footer end ti-comment-alt
        ***********************************-->

    </div><!-- /.page-wrapper -->


    <?php require('include/mobilefooter.php') ?>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>

    <!-- jQuery (must come first) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap (needs jQuery first) -->
    <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core jQuery Plugins -->
    <script src="vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="vendors/jquery-ui/jquery-ui.js"></script>

    <!-- Other Vendor Plugins -->
    <script src="vendors/jarallax/jarallax.min.js"></script>
    <script src="vendors/odometer/odometer.min.js"></script>
    <script src="vendors/wnumb/wNumb.min.js"></script>
    <script src="vendors/wow/wow.js"></script>
    <script src="vendors/isotope/isotope.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="vendors/timepicker/timePicker.js"></script>
    <script src="vendors/circleType/jquery.circleType.js"></script>
    <script src="vendors/circleType/jquery.lettering.min.js"></script>

    <!-- Swiper (modern version via CDN, keep last among plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Custom Scripts (always last) -->
    <script src="js/state.js"></script>
    <script src="js/bachat-daddy.js"></script>


    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 6, // show 6 logos at a time (desktop)
            spaceBetween: 30, // spacing between logos
            loop: true, // infinite loop
            autoplay: {
                delay: 2000, // auto-slide every 2s
                disableOnInteraction: false,
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10
                }, // mobile
                576: {
                    slidesPerView: 3,
                    spaceBetween: 20
                }, // tablets
                768: {
                    slidesPerView: 4,
                    spaceBetween: 20
                }, // small laptops
                992: {
                    slidesPerView: 5,
                    spaceBetween: 25
                }, // desktops
                1200: {
                    slidesPerView: 6,
                    spaceBetween: 30
                } // large desktops
            }
        });
    </script>


    <!-- template js -->


    <script>
        function updateSubcategories() {
            var industryId = jQuery('#category').val();

            if (industryId) {
                jQuery.ajax({
                    type: 'POST',
                    url: 'get-subcategories.php',
                    data: {
                        industry_id: industryId
                    },
                    success: function(response) {
                        var subcategorySelect = jQuery('#subcategory');
                        subcategorySelect.html('<option value="">Select Subcategory</option>');

                        if (response) {
                            subcategorySelect.append(response);
                        } else {
                            subcategorySelect.html('<option value="">No subcategories available</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        jQuery('#subcategory').html('<option>Error loading subcategories</option>');
                    }
                });
            } else {
                jQuery('#subcategory').html('<option value="">Select Industry first</option>');
            }
        }
    </script>

    <script>
        function updateCities() {
            var stateName = jQuery('#state').val();

            if (stateName) {
                jQuery.ajax({
                    type: 'POST',
                    url: 'get-cities.php',
                    data: {
                        state_name: stateName
                    },
                    success: function(response) {
                        var citySelect = jQuery('#city');
                        citySelect.html('<option value="">Select City</option>');

                        if (response) {
                            citySelect.append(response);
                        } else {
                            citySelect.html('<option value="">No cities available</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        jQuery('#city').html('<option>Error loading cities</option>');
                    }
                });
            } else {
                jQuery('#city').html('<option value="">Select State first</option>');
            }
        }
    </script>

    <script>
        function submitContactForm(event, formName) {
            event.preventDefault();

            var form = document.getElementById(formName);

            if ($(form).valid()) {
                var submitButton = form.querySelector('.thm-btn');
                submitButton.disabled = true;
                submitButton.innerHTML = 'Sending...';

                var formData = new FormData(form);

                $.ajax({
                    url: 'contactform.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {},
                    success: function(response) {
                        if (response.status === 'success') {
                            form.reset();
                            alert("Thank you for contacting us");
                            window.location.href = response.redirect;
                        }

                        submitButton.disabled = false;
                        submitButton.innerHTML = 'SEND MESSAGE';
                    },
                    error: function(xhr, status, error) {
                        submitButton.disabled = false;
                        submitButton.innerHTML = 'SEND MESSAGE';
                    }
                });
            }
        }
    </script>


    <script>
        function submitSearchForm(event, formName) {
            event.preventDefault();

            var form = document.getElementById(formName);

            if ($(form).valid()) {
                var formData = new FormData(form);

                var submitButton = form.querySelector('.thm-btn');
                submitButton.disabled = true;
                submitButton.innerHTML = 'Searching...';

                $.ajax({
                    url: 'searchform.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            form.reset();

                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        }

                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Search';
                    },
                    error: function(xhr, status, error) {
                        alert("AJAX request failed: " + error);
                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Search';
                    }
                });
            }
        }
    </script>






    <script>
        $(document).ready(function() {
            $("#contactform").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    Phone: {
                        required: true,
                        // pattern: /^[+0-9]{10,15}$/,
                        minlength: 10,
                        maxlength: 15
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true,
                        minlength: 10
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your full name.",
                        minlength: "Your name must be at least 3 characters long."
                    },
                    Phone: {
                        required: "Please enter your phone number.",
                        // pattern: "Please enter a valid phone number.",
                        minlength: "Your phone number must be at least 10 digits long.",
                        maxlength: "Your phone number cannot exceed 15 digits."
                    },
                    email: {
                        required: "Please enter your email address.",
                        email: "Please enter a valid email address."
                    },
                    message: {
                        required: "Please write a message.",
                        minlength: "Your message must be at least 10 characters long."
                    }
                },
                submitHandler: function(form) {
                    form.submit(); // submit the form if it passes validation
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Apply validation to the search form
            $("#search").validate({
                rules: {
                    state: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    category: {
                        required: true
                    },
                    subcategory: {
                        required: true
                    }
                },
                messages: {
                    state: {
                        required: "Please select a state."
                    },
                    city: {
                        required: "Please select a city."
                    },
                    category: {
                        required: "Please select an industry category."
                    },
                    subcategory: {
                        required: "Please select a subcategory."
                    }
                },
                submitHandler: function(form) {
                    form.submit(); // Submit the form if it passes validation
                }
            });
        });
    </script>



</body>

</html>