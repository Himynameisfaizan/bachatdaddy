<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    
    include 'config/config.php';
    include 'functions/bachatdaddyfunctions.php';
    $vendor=new Vendor();
    $common = new Common();
    $industry=$common->getAllIdustry();

    $Id =  isset($_REQUEST['id']) ? base64_decode($_REQUEST['id']) : NULL;
    if(isset($Id)){
        // $subindustryone=$common->getsubIdustry($Id);
        // $inid=$subindustryone['industry_id'];
        // $editdata=$common->getIdustryBySub($inid);
        $vendorsdata=$vendor->getVendorById($Id);
        // var_dump($vendorsdata);
    }
    if (!empty($Id)) {
        $iov = $vendor->getAllImages($Id);
        $sov = $vendor->getAllVendorSconditions($Id);
        $gov = $vendor->getAllVendorGconditions($Id);
        $fov = $vendor->getAllVendorOffers($Id);
        $pov = $vendor->getAllVendorPhones($Id);
        $eov = $vendor->getAllVendorEmails($Id);
    }
    if(!isset($_REQUEST['id'])||empty($_REQUEST['id'])){
        header('Location: index.php');
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <style>
        ul{
            list-style-type: none;
        }
    </style>
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


        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(images/backgrounds/bg-what.jpg); opacity: 0.1">
            </div>

            <div class="container">
                <div class="page-header__inner page-header__inner-color">
                    <h2><?= $vendorsdata[0]['vendor_name']?></h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><span class="icon-down-arrow"></span></li>
                        <li><?= $vendorsdata[0]['vendor_name']?></li>
                    </ul>
                </div>
            </div>
        </section>

        <!--Profile Start-->
        <section class="team-details">
            <div class="container">
                <div class="team-details__inner" >
                    <div class="row vendor-column-width">
                        <div class="col-xl-5 col-lg-5 ">
                            <div class="sticky-img vendor-first-column">
                            <div class="team-details__left ">
                                <div class="team-details__img ">
                                    <img class="rounded-2" src="bachatdaddy@1357admin/adminuploads/images/vendors/<?php echo $vendorsdata[0]['image'];?>" alt="">
                                </div>
                                <div class="vendor-info">
                                    <?php if($pov !="" && $pov !=null && $pov != '0'):?>
                                        <!-- <p><strong>Resevations : </strong></p> -->
                                        <ul class="">
                                            <li>
                                                <div class="icon vendor-icon">
                                                    <span class="icon-phone"></span>
                                                </div>
                                                <?php 
                                                $totalOffers = count($pov); // Count the total number of offers (mobiles)
                                                foreach ($pov as $index => $offer) {
                                                    echo '<a href="tel:' . $offer['mobile'] . '">' . $offer['mobile'] . '</a>';
                                                    if ($index < $totalOffers - 1) {
                                                        echo '\\'; // Backslash separator
                                                    }
                                                }
                                                ?>
                                            </li>
                                            <div class="seprator"></div>
                                            
                                            <li>
                                                <div class="icon vendor-icon">
                                                    <span class="icon-envelope"></span>
                                                </div>
                                                <?php 
                                                $totalOffers = count($eov); 
                                                $first = true; 
                                                
                                                foreach ($eov as $index => $offer) {
                                                    if (!$first) {
                                                        echo '\\';
                                                    }
                                                    echo '<a href="mailto:' . $offer['email'] . '">' . $offer['email'] . '</a>';
                                                    $first = false;
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                    <?php endif;?>
                                </div>

                            </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 vendor-secound-column">
                            <div class="team-details__right">
                                <?php if($vendorsdata[0]['offer'] !="" && $vendorsdata[0]['offer'] !=null && $vendorsdata[0]['offer'] != '0'):?>
                            <h3 class="team-details__title-1 mb-2" style="text-transform: capitalize;
                             color: rgb(7, 7, 7);"><?= $vendorsdata[0]['offer']?></h3><?php endif;?>
                                <div class="main-slider__carousel owl-carousel owl-theme thm-owl__carousel"
                                    data-owl-options='{"loop": true, "items": 1, "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"], "margin": 0, "dots": true, "nav": false, "animateOut": "slideOutDown", "animateIn": "fadeIn", "active": true, "smartSpeed": 1000, "autoplay": true, "autoplayTimeout": 7000, "autoplayHoverPause": false}'>
                                    <?php foreach($iov as $offer):?>
                                        <div class="item main-slider__slide-1">
                                            <img src="bachatdaddy@1357admin/adminuploads/images/vendors/<?php echo $offer['image'];?>" alt="">
                                        </div>
                                    <?php endforeach; ?>                                    
                                </div>                                
                                <div class="vendor-profile-details">
                                    <?php if($fov !="" && $fov !=null && $fov != '0'):?>
                                    <p class=""><strong>Offers :</strong></p>
                                    <ul class="ul-padding">
                                        <?php foreach($fov as $offer):?>
                                        <li><div class="icon "><?= $offer['offer']?></li>
                                        <?php endforeach; ?>
                                    
                                    </ul><?php endif;?>
                                </div>

                                <div class="vendor-profile-details">
                                    <?php if($vendorsdata[0]['sdate'] !="" && $vendorsdata[0]['sdate'] !=null && $vendorsdata[0]['sdate'] != '0'):?>
                                        <p class=""><strong>Validity Period : </strong> <?php echo $vendorsdata[0]['sdate'];?> to <?php echo $vendorsdata[0]['edate'];?></p>
                                    <?php endif;?>
                                </div>

                                <div class="vendor-profile-details">
                                    <p class=""><strong>Eligibility : </strong> Bachat Daddy Card Holder</p>
                                </div>
                                
                                <div class="vendor-profile-details">
                                    <?php if($sov !="" && $sov !=null && $sov != '0'):?>
                                        <p><strong>Special terms and conditions : </strong></p>
                                        <ul class="ul-padding">
                                            <?php foreach($sov as $offer):?>
                                                <li><div class="icon "><?= $offer['condition']?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif;?>
                                </div>

                                <div class="vendor-profile-details">
                                    <?php if($gov !="" && $gov !=null && $gov != '0'):?>
                                        <p><strong>General Terms and Conditions : </strong></p>
                                        <ul class="ul-padding">
                                            <?php foreach($gov as $offer):?>
                                                <li><div class="icon "></i><?= $offer['condition']?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif;?>
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