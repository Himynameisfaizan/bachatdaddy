<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
include 'functions/authentication.php';

$common = new Common();
$db     = new dbClass();
$industry = $common->getAllIdustry();
$id       = $_SESSION['USERS_USER_ID'];
$user     = new User();
$userdata = $user->getUsersDetails($id);
$auth     = new Authentication();
$auth->checkSession();

$sql = "SELECT v.id,
               v.name,
               v.offer,
               v.address,
               v.image,
               v.edate,
               vm.mobile
        FROM vendor v
        LEFT JOIN vendermobile vm ON v.id = vm.vendor_id
        WHERE v.status = 1
        ORDER BY v.id DESC, vm.vendor_id";

$rows = $db->getAllData($sql);

/* group by vendor id so each vendor has its own mobiles */
$vendors = [];
foreach ($rows as $row) {
    $vid = $row['id'];
    if (!isset($vendors[$vid])) {
        $vendors[$vid] = [
            'id'      => $row['id'],
            'name'    => $row['name'],
            'offer'   => $row['offer'],
            'address' => $row['address'],
            'image'   => $row['image'],
            'edate'   => $row['edate'],
            'mobiles' => []
        ];
    }
    if (!empty($row['mobile'])) {
        $vendors[$vid]['mobiles'][] = $row['mobile'];
    }
}

function truncateText($text, $limit = 10)
{
    $text = trim($text);
    if (mb_strlen($text, 'UTF-8') <= $limit) {
        return $text;
    }
    return mb_substr($text, 0, $limit, 'UTF-8') . '...';
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

    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
        rel="stylesheet" />
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
                            <h4 class="dashboard-heading">Welcome <span><?php echo $userdata['name']; ?></span></h4>
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

        <!-- Vendors Benefits start -->
        <section class="vendors-offer">
            <div class="vendors-content">
                <h4>Grab the Vendor's Offers</h4>
                <div class="vendors-detail-container">
                    <?php if (!empty($vendors)): ?>
                        <?php foreach ($vendors as $vendor): ?>
                            <div class="vendors-detail" onclick="showOffer()">
                                <img src="<?php echo !empty($vendor['image'])
                                                ? 'bachatdaddy@1357admin/adminuploads/images/vendors/' . htmlspecialchars($vendor['image'])
                                                : './images/resources/321.jpg'; ?>"
                                    alt="<?php echo htmlspecialchars($vendor['name']); ?>">

                                <div class="offer-details">
                                    <div class="offer_name">
                                        <?php echo htmlspecialchars(truncateText($vendor['name'], 14)); ?>
                                    </div>

                                    <div class="flat_discount">
                                        <span class="animate__animated animate__bounce animate__delay-2s animate__slower">
                                            <?php echo htmlspecialchars($vendor['offer']); ?> off
                                        </span>
                                    </div>

                                    <div class="address">
                                        <?php echo htmlspecialchars(truncateText($vendor['address'], 20)); ?>
                                    </div>
                                    
                                    <div class="mobile-number">
                                        <?php if (!empty($vendor['mobiles'])): ?>
                                            <?php foreach ($vendor['mobiles'] as $mobile): ?>
                                                <a href="tel:<?php echo htmlspecialchars_decode($mobile)?>"><?php echo htmlspecialchars($mobile); ?></a>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <div>No contact number</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="expiry-date">
                                        exp: <span><?php echo htmlspecialchars($vendor['edate']); ?></span>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No vendor offers available right now.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Vendors Benefits end -->
 
        <!-- Vendors Condition start -->
        <div class="vendors-main-conditon" id="vendorsCondition">
            <div class="">
                <h5>Offers Detail <i class="ri-close-fill" onclick="closePopUp()" id="closeIcon"></i></h5>
                <hr>
            </div>
            <div class="condition-content">
                <div class="condition-question">
                    <div class="">What is the Offer?</div>
                    <div class=""><i class="ri-arrow-right-long-line"></i> 50% off</div>
                </div>
                <div class="condition-question">
                    <div class="">How can Anybody Eligibility to Grab the Offers?</div>
                    <div><i class="ri-arrow-right-long-line"></i> Customer must have Bachatdaddy Card.</div>
                </div>
                <div class="">Email: <span>happynegi@gmail.com</span></div>
                <div class="">Contact Number: <span>4546546546</span></div>
                <div class="condition-question">
                    <div class="">Validity Timeperiod</div>
                    <div class=""><i class="ri-arrow-right-long-line"></i> <span>2025-5-15</span> to <span>2025-6-30</span></div>
                </div>
                <div class="condition-question">
                    <div class="">Terms and Condition</div> 
                    <div><i class="ri-arrow-right-long-line"></i> 18+ Age required</div>
                </div>
            </div>
        </div>
        <!-- Vendors Condition end -->


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
    <script>
        const showOffer = () => {
            let vendorsCondition = document.getElementById("vendorsCondition");
            vendorsCondition.style.display = "block";
            document.body.style.backgroundColor = "rgba(0, 0, 0, 0.719)";
            document.body.style.overflowY = "hidden";
        }
        const closePopUp = () =>{
            let closeIcon = document.getElementById("closeIcon");
            vendorsCondition.style.display = "none";
            document.body.style.backgroundColor = "transparent";
            document.body.style.overflowY = "auto";
        }
    </script>
</body>

</html>