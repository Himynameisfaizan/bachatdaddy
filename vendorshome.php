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
    <link rel="icon" type="image/png" sizes="100x100" href="images/resources/logo1.png">

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
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
    rel="stylesheet"
    />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="css/bachat-daddy.css">
    <link rel="stylesheet" href="css/bachat-daddy-responsive.css">
    <link rel="stylesheet" href="css/virtual-card-vendors.css">
</head>

<body>
    <div>
        <?php include('include/vendor_header.php') ?>

        <section class="vendorshome-bg">
            <section class="vendors-container">
                <div class="vendors-grid-content">
                    <div class="vendors-content">
                        <h1>Attract more customers without expensive <span class="highlight">advertising</span></h1>
                    </div>
                    <div class="vendors-content">
                        <p>
                            Join now hundreds of vendors using our discount card platform to grow their 
                            customer base effortlessly and boost sales with zero upfront costs
                        </p>
                    </div>
                    <div class="cta">
                        <button>
                            Apply now
                            <i class="ri-arrow-right-line"></i>
                        </button>
                    </div>
                </div>
    
            </section>

            <hr>

            <section class="bg-counter">
            <div class="container pt-75 pb-75">
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
    </section>

    <section class="vendors-benefits-section">
        <h2>Vendors Benefits</h2>
        <div class="vendors-benefits-container">
            <div class="vendors-benefits-content">
                <h5><i class="ri-seo-line"></i> Free marketing support</h5>
                <p>                  
                    Our dedicated on-ground sales team markets your outlet directly 
                    across malls, offices, and busy events to attract a steady stream of customers.
                </p>
            </div>
            <div class="vendors-benefits-content">
                <h5><i class="ri-door-closed-line"></i> Bring new customers to your door</h5>
                <p>
                    Expand your customer base effortlessly through our exclusive Privilege Card program.
                    
                </p>
            </div>
            <div class="vendors-benefits-content">
                <h5><i class="ri-phone-line"></i> Increase your sales without risk</h5>
                <p>
                    Boost your revenue with zero upfront costs or financial risk.
                </p>
            </div>
            <div class="vendors-benefits-content">
                <h5>Personalized outreach that works</h5>
                <p>
                    Our face-to-face engagement with customers ensures your business gets noticed by the right audience.
                </p>
            </div>
            <div class="vendors-benefits-content">
                <h5><i class="ri-user-3-line"></i> Build long-term customer loyalty</h5>
                <p>
                    Our platform helps you build lasting relationships that drive repeat business and sustained growth.
                </p>
            </div>
            <div class="vendors-benefits-content">
                <h5><i class="ri-footprint-line"></i> Dedicated support every step of the way</h5>
                <p>
                    From onboarding to ongoing marketing, 
                    we provide personalized support to ensure you maximize the benefits of the BachatDaddy platform.
                </p>
            </div>
        </div>
    </section>

        <?php require('include/mobilefooter.php');  ?>
        <?php require('include/footer.php'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 6,
      spaceBetween: 30,
       autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>
</body>

</html>