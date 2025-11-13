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
                        <button type="button" onclick="moveSroll()">
                            Connect with
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
        <h2>How Vendors Gain Value</h2>
        <div class="vendors-benefits-container">
            <div class="vendors-benefits-content">
                <h5><i class="ri-door-closed-line"></i> No Financial Investment</h5>
                <p>
                    You only provide a discount when a customer actually visits and makes a purchase—no upfront risk, just pure gain.
                </p>
                <ul>
                    <li>No setup charges</li>
                    <li>No marketing fees</li>
                    <li>No subscription cost</li>
                </ul>
            </div>
            <div class="vendors-benefits-content">
                <h5><i class="ri-phone-line"></i> More Revenue, Not Discount Loss</h5>
                <p>
                    With Bachat Daddy, your profits stay strong while you attract more customers.
                </p>
                <ul>
                    <li>Only select items or parts of the bill are discounted</li>
                    <li>The rest—food, drinks, and add-ons—are billed at full price</li>
                    <li>Margins stay healthy, and new customers keep coming in</li>
                </ul>
            </div>
            <div class="vendors-benefits-content">
                <h5><i class="ri-group-3-line"></i> Targeted Premium Customers</h5>
                <p>
                    Bachatdaddy members are quality spenders, not bargain seekers.
                    They often visit with family, friends, and groups—leading to:
                </p>
                <ul>
                    <li>Higher average bills</li>
                    <li>More add-ons like starters, desserts, and beverages</li>
                </ul>
                <p>Your business earns more from every visit.</p>
            </div>
            <div class="vendors-benefits-content">
                <h5><i class="ri-seo-line"></i> Free marketing support</h5>
                <p>                  
                    Our dedicated on-ground sales team markets your outlet directly 
                    across malls, offices, and busy events to attract a steady stream of customers.
                </p>
            </div>
            <div class="vendors-benefits-content">
                <h5><i class="ri-user-3-line"></i> Build long-term customer loyalty</h5>
                <p>
                    Membership lasts one full year, encouraging customers to visit again and again.
                    Our members choose Bachat Daddy partners over others, helping you build lasting loyalty and grow your brand.
                </p>
            </div>
            <div class="vendors-benefits-content">
                <h5><i class="ri-footprint-line"></i> 100% Transparent Collaboration</h5>
                <ul>
                    <li>No commissions</li>
                    <li>No revenue sharing</li>
                    <li>No lock-in contracts</li>
                </ul>
                <p>Simple model. Big impact</p>
            </div>
        </div>
    </section>

    <section class="vendors-benefits-section">
        <h2>What We Deliver</h2>
        <div class="our-work-container">
            <div class="our-work-content">
                <h5><i class="ri-team-line"></i> Premium partnerships across india</h5>
                <p>At <b>BACHATDADDY,</b> we collaborate exclusively with top hotels, resorts, restaurants, bars, and lifestyle outlets all over India. Our carefully curated partnerships
                ensure that our members enjoy world-class experiences with unbeatable discounts and benefits wherever they go.</p>
            </div>
            <div class="our-work-content">
                <h5><i class="ri-pushpin-2-line"></i> Exclusive privileges for our members</h5>
                <p>Our Privilege Card offers members access to elite deals and special offers not available anywhere else. Whether it’s a luxury stay, 
                    fine dining, or a leisure outing, members save smartly while enjoying premium lifestyle perks.</p>
            </div>
            <div class="our-work-content">
                <h5><i class="ri-pushpin-2-line"></i> Making luxury affordable for all</h5>
                <p>We believe luxury should be accessible, not just a privilege for a few. BACHATDADDY opens the doors to premium 
                    experiences at budget-friendly rates, empowering our members to live richly without compromising their savings.</p>
            </div>
            <div class="our-work-content">
                <h5><i class="ri-user-community-line"></i> A trusted network that rewards both sides</h5>
                <p>We connect value-conscious customers with premier brands in a trusted ecosystem. 
                    This collaboration builds loyal repeat clientele for our vendors, while members benefit from substantial discounts and unmatched value.</p>
            </div>
            <div class="our-work-content">
                <h5><i class="ri-hand-coin-line"></i> Smart savings that enhance your lifestyle</h5>
                <p>Our mission goes beyond just discounts. We enable members to experience more, worry less, and enjoy the freedom of choice
                     with <b>BACHATDADDY,</b> saving money means gaining happiness and lifestyle freedom.</p>
            </div>
            <div class="our-work-content">
                <h5><i class="ri-lightbulb-ai-line"></i> Innovative digital experience</h5>
                <p><b>BACHATDADDY</b> harnesses advanced digital technology to deliver a seamless and intuitive experience for every member. From an easy-to-use mobile platform to contactless 
                    privilege card solutions, we make discovering, redeeming, and tracking offers effortless and secure.</p>
            </div>
        </div>
    </section>

    <section class="vendors-benefits-section">
        <h2>Frequently Asked Questions</h2>
        <div class="accordian-container">
            <div class="accordian-content">
                <div class="question" id="one" onclick="accordian(this)">Q1. How do I get started?
                    <i  class="icon ri-add-line" style="float: right"></i></div>
                <div class="answer"><i class="ri-arrow-right-long-line" style="color: #ee8d21"></i> You simply join Bachat Daddy as a partner—it’s quick, easy, and completely free.</div>
            </div>
            <div class="accordian-content">
                <div class="question" id="two" onclick="accordian(this)">Q2. Can I decide my own offer? 
                    <i  class="icon ri-add-line" style="float: right"></i></div>
                <div class="answer"><i class="ri-arrow-right-long-line" style="color: #ee8d21"></i> Yes. You have full flexibility to choose your own discount or offer based on your business preferences.</div>
            </div>
            <div class="accordian-content">
                <div class="question" id="three" onclick="accordian(this)">Q3. How will my business be promoted?
                    <i  class="icon ri-add-line" style="float: right"></i>
                </div>
                <div class="answer"><i class="ri-arrow-right-long-line" style="color: #ee8d21"></i> Once you join, we list your business on the 
                    Bachatdaddy platform and promote it to our active members through our channels.</div>
            </div>
            <div class="accordian-content">
                <div class="question" id="four" onclick="accordian(this)">Q4. How do customers redeem the offer?
                    <i  class="icon ri-add-line" style="float: right"></i>
                </div>
                <div class="answer"><i class="ri-arrow-right-long-line" style="color: #ee8d21"></i> When customers visit, they show their Bachatdaddy membership card before billing to claim the offer.</div>
            </div>
            <div class="accordian-content">
                <div class="question" id="five" onclick="accordian(this)">Q5. What happens next?
                    <i  class="icon ri-add-line" style="float: right"></i>
                </div>
                <div class="answer"><i class="ri-arrow-right-long-line" style="color: #ee8d21"></i> You verify their membership and apply the offer. 
                    The sale is completed instantly, and you’ve gained a new loyal customer.</div>
            </div>
        </div>
    </section>

    <section id="detail" class="vendors-benefits-section">
        <h2>Location & Contact Information</h2>
        <div class="location-container">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3606.0011533682473!2d81.90569067444662!3d25.33774232599551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3985497bf3ba98eb%3A0x36edd536ac16e60!2s8WQ5%2B38R%2C%20Newada%20Samogar%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1760600211391!5m2!1sen!2sin"
                style="border:0; width: 100%; height: 100%"
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
            <div class="contact-information">
                <p><b>Address:</b> Newada Samogar, Naini Industrial Area, Prayagraj, Uttar Pradesh-211010</p>
                <p><b>Phone:</b><a href="tel:9889769886"> +91-9889769886</a></p>
                <p><b>Email:</b><a href="mailto:daddybachat@gmail.com"> daddybachat@gmail.com</a></p>
            </div>
        </div>
    </section>

        
    </div>  
    <script src="js/vendorshome.js"></script>
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