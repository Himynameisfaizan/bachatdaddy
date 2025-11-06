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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
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
        <section class="page-header">
            <div class="page-header__bg-contact" style="background-image: url(images/backgrounds/bg-what.jpg);">
            </div>
            
            <div class="container">
                <div class="page-header__inner">
                    <h2 style="color: #0f0c0c;">Contact <span style="color: #ee8d21;">Us</span></h2>
                    <ul class="thm-breadcrumb list-unstyled" style="color: #0f0c0c;">
                        <li><a href="index.php"style="color: #0f0c0c;">Home</a></li>
                        <li><span class="icon-down-arrow" style="color: #0f0c0c;"></span></li>
                        
                        <li style="color: #0f0c0c;">Contact Us</li>
                    </ul>
                </div>
            </div>
        </section>


        <section class="information-contact">
            <div class="container pt-75 pb-75">
                <div class="row contact-page-two-column">

                    <!-- Second Column: Contact Form -->
                    <div class="col-lg-6 col-md-12 contact-page-first-column">
                        <div class="contact-page__left ">
                            <h3 class="contact-page__title">Get in Touch</h3>
                            
                            <div class="contact-page__form-box">
                                <form id="contactform" class="contact-page__form contact-form-validated" onsubmit="return submitForm(event, 'contactform');">
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
                                                <textarea name="message" placeholder="Write Your Message"></textarea>
                                            </div>
                                            <div class="contact-page__btn-box">
                                                <button type="submit" class="thm-btn contact-page__btn"><span class="fas fa-paper-plane"></span>SEND
                                                    MESSAGE</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End of Second Column -->



                    <!-- First Column: Contact Information (Phone, Email, Address) -->
                    <div class="col-lg-6 col-md-12 contact-page-secound-column">
                        <!-- Information Single Start (Phone) -->
                        <div class="wow fadeInUp  " data-wow-delay="200ms">
                            <h4 class="contact-page-heading">Hi! We are always here to help you</h4>


                            <div class="information__single ">
                                <div class="row">
                                    <div class="col-md-3 col-2">
                                        <div class="information__icon">
                                            <span class="icon-phone"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-10">
                                        <div class="contact-content">
                                            
                                            <h5 class="text-left">Call Us</h5>
                                           
                                            <p><a href="tel:+91-9889769886">+91-9889769886</a></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="information__single ">
                                <div class="row">
                                    <div class="col-md-3 col-2">
                                        <div class="information__icon">
                                            <span class="icon-gmail"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-10">
                                        <div class="contact-content">
                                            <h5 class="text-left">Email</h5>
                                            <p><a href="mailto:support@bachatdaddy.com">support@bachatdaddy.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="information__single ">
                                <div class="row">
                                    <div class="col-md-3 col-2">
                                        <div class="information__icon">
                                            <span class="icon-location-2"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-10">
                                        <div class="contact-content">
                                            <h5 class="text-left">Address</h5>
                                    
                                            <p> 8WQ5+38R, Newada Samogar, Uttar Pradesh 211010</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr style="margin-top: 25px;">
                            
                            <div class="contact-social-icons">
                                <div class="icon-social-contact">
                                    <i class="fa-brands fa-facebook"></i>
                                </div>
                                <div class="icon-social-contact">
                                    <i class="fa-brands fa-youtube"></i>
                                </div>
                                <div class="icon-social-contact">
                                    <i class="fa-brands fa-x-twitter"></i>
                                </div>
                                <div class="icon-social-contact">
                                    <i class="fa-brands fa-instagram"></i>
                                </div>
                            </div>
                          
                        </div>
                        
                    </div>
                    <!-- End of First Column -->
        

                </div>
            </div>
        </section>

        <section class="location-google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3606.0011533682473!2d81.90569067444662!3d25.33774232599551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3985497bf3ba98eb%3A0x36edd536ac16e60!2s8WQ5%2B38R%2C%20Newada%20Samogar%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1760600211391!5m2!1sen!2sin"
                style="border:0; width: 100%; height: 450px;"
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
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
                    <a href="mailto:support@bachatdaddy.com">support@bachatdaddy.com</a>
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

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <script src="vendors/jquery/jquery-3.6.0.min.js"></script> -->
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

    <script>
    function submitForm(event, formName) {
        event.preventDefault(); 

        var form = document.getElementById(formName);

        // Check if form is valid using the jQuery validate plugin
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
                beforeSend: function() {
                    console.log("Sending request to user.php...");
                },
                success: function(response) {
                    console.log("AJAX request sent successfully.");
                    console.log('Raw Response:', response);

                    if (response.status === 'success') {
                        form.reset(); 
                        alert("Thank you for contacting us");
                        window.location.href = response.redirect;
                    } else {
                        alert("Error: " + response.message);
                        // form.reset();
                    }

                    submitButton.disabled = false;
                    submitButton.innerHTML = 'SEND MESSAGE'; 
                },
                error: function(xhr, status, error) {
                    console.log('Error response:', xhr.responseText); 
                    alert("AJAX request failed: " + error);
                    submitButton.disabled = false;
                    submitButton.innerHTML = 'SEND MESSAGE';
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
                }
                // message: {
                //     required: true,
                //     minlength: 10
                // }
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
                }
                // message: {
                //     required: "Please write a message.",
                //     minlength: "Your message must be at least 10 characters long."
                // }
            },
            submitHandler: function(form) {
                form.submit(); // submit the form if it passes validation
            }
        });
    });
</script>

</body>

</html>