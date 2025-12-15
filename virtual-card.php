<?php

use Dotenv\Parser\Value;

session_start();

include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
include 'functions/authentication.php';

$dbclass = new dbClass();
$common = new Common();
$industry = $common->getAllIdustry();
$user = new User();
$auth = new Authentication();
$errorMsg = '';

$query  = "SELECT userEmail FROM cardnumber";
$cardRow = $dbclass->getAllData($query);
$cardEmails = array_column($cardRow, 'userEmail'); // Extract all emails from cardnumber table
$currentUserEmail = null;
$hasCard = false;

if (isset($auth) && method_exists($auth, 'Isloggedin') && $auth->Isloggedin()) {
    $userdetail = $user->getUsersDetails($_SESSION['USERS_USER_ID']);
    $currentUserEmail = $userdetail['email'];
    $hasCard = in_array($currentUserEmail, $cardEmails);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userdetail = $user->getUsersDetails($_SESSION['USERS_USER_ID']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($userdetail['email'] === $email && $userdetail['password'] === $password) {
        $_SESSION['CAN_ACCESS_APPLY_CARD'] = true;
        header("Location: apply-virtual-card.php");
        exit();
    } else {
        $_SESSION['LOGIN'] = "false";
        $errorMsg = "Invalid email or password."; ?>
        <script>
            alert("Please enter right email and password");
        </script>


<?php  }
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
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
        rel="stylesheet" />
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
    <link rel="stylesheet" href="css/virtual-card-vendors.css">
    <link rel="stylesheet" href="css/bachat-daddy-responsive.css">
</head>

<body>
    <div id="main-container-apply">
        <?php include('include/header.php') ?>

        <!-- landing page start -->
        <section class='virtual-container'>
            <div class='virtual-grid-two-part'>
                <div class="virtual-content">
                    <h1>Where simplicity <br>meets financial <span>power</span></h1>
                </div>
                <div class="virtual-content">
                    <p>
                        Unlock more joy and savings—We brings you exclusive privileges at top hotels, restaurants,
                        and lifestyle spots, so you never have to choose between fun and smart spending.
                    </p>
                </div>
                <form action="" method="post">
                    <div class="cta">
                        <?php if ($hasCard) { ?>
                            <a href="my-profile.php">Show card <i class="ri-arrow-right-line"></i></a>
                        <?php } elseif (isset($auth) && method_exists($auth, 'Isloggedin') && $auth->Isloggedin()) { ?>
                            <a href="#" onclick="applyCard()">Apply now <i class="ri-arrow-right-line"></i></a>
                        <?php } else { ?>
                            <a href="login.php">Apply now <i class="ri-arrow-right-line"></i></a>
                        <?php } ?>
                    </div>
                </form>
                <div class="virtual-image">
                    <img src="images/AdobeExpress.png" alt="virtual card">
                    <div class="client first">
                        <h6>
                            <span><i class="ri-user-3-fill"></i></span>
                            Manish Sharma
                        </h6>
                        <p>Very useful! I am happy with bachatdaddy</p>
                    </div>
                    <div class="client secound">
                        <h6>
                            <span><i class="ri-user-3-fill"></i></span>
                            Kanika Yadav
                        </h6>
                        <p>This card is awesome</p>
                    </div>
                    <div class="client third">
                        <h6>
                            <span><i class="ri-user-3-fill"></i></span>
                            Sunny Gautam
                        </h6>
                        <img src="./images/rating.png" alt="rating">
                    </div>
                </div>
            </div>
        </section>

        <!-- landing page end -->
        <section class="feature-card">
            <div class="feature1">
                <h2>Experience smarter spending with india’s most rewarding <span>discount card</span></h2>
                <p>
                    Bachatdaddy discount card brings you effortless
                    savings at top waterparks, hotels, restaurants, and more with instant
                    discounts, verified partners, easy application
                    and customer support always ready, your smart card
                    makes every spend simpler and more rewarding
                </p>
            </div>
            <div class="feature2">
                <div class="card-detail1">
                    <div class="icon">
                        <i class="ri-verified-badge-line"></i>
                        <h2>Verified Partners</h2>
                    </div>
                    <div class="desc">
                        <h4>Get exclusive discounts at top waterparks, hotels, restaurants, and real estate brands—all trusted partners working with BachatDaddy.</h4>
                    </div>
                </div>
                <div class="card-detail1">
                    <div class="icon">
                        <i class="ri-discount-percent-line"></i>
                        <h2>Instant Discounts</h2>
                    </div>
                    <div class="desc">
                        <h4>Just show your card and enjoy special savings instantly, no extra steps or coupons needed.</h4>
                    </div>
                </div>
                <div class="card-detail1">
                    <div class="icon">
                        <i class="ri-timer-line"></i>
                        <h2>24/7 Customer Support</h2>
                    </div>
                    <div class="desc">
                        <h4>We’re always here to help—connect anytime for queries or assistance regarding your card benefits.</h4>
                    </div>
                </div>
                <div class="card-detail1">
                    <div class="icon">
                        <i class="ri-gift-2-line"></i>
                        <h2>Transparent Benefits</h2>
                    </div>
                    <div class="desc">
                        <h4>All offers and discounts are clearly listed, with no hidden charges or surprises.</h4>
                    </div>
                </div>
            </div>
        </section>

        <section class="apply-section" id="card_apply">
            <div class="apply-container">
                <i class="ri-close-fill" style="float: right; cursor: pointer" onclick="closeIcon()"></i>
                <h3>Apply Now! Get Your Discount</h3>
                <?php if (!empty($errorMsg)) : ?>
                    <div style="color: red; margin-bottom: 10px;"><?= htmlspecialchars($errorMsg) ?></div>
                <?php endif; ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="apply-form">
                    <input type="hidden" name="from_virtual_card" value="1">
                    <div class="">
                        <input type="email" name="email" id="email" placeholder="Email-Id" required>
                    </div>
                    <div class="">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <button id="apply-btn" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </section>
        <?php require('include/footer.php'); ?>
        <?php require('include/mobilefooter.php') ?>
    </div>

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
    <script src="js/bachat-daddy.js"></script>
    <script>
        function Needtologin() {
            alert("You need to login")
        }

        const applyCard = () => {
            let card_apply = document.getElementById("card_apply");
            document.body.style.overflowY = "hidden";
            card_apply.classList.add("visible");
        }
        const closeIcon = () => {
            let card_apply = document.getElementById("card_apply");
            card_apply.classList.remove("visible");
            document.body.style.overflowY = "auto";
        }
    </script>

</body>

</html>