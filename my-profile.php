<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
include 'functions/authentication.php';

$common   = new Common();
$db       = new dbClass();
$industry = $common->getAllIdustry();
$id       = $_SESSION['USERS_USER_ID'];
$user     = new User();
$userdata = $user->getUsersDetails($id);
$auth     = new Authentication();
$auth->checkSession();

/**
 * OFFERS + related tables
 * venderoffer  (id = offer_id, vendor_id, offer, sdate, edate)
 * vendor       (id)
 * vendor_images(offer_id, image)
 * vendermobile (offer_id, mobile)  // assume ab yaha offer_id hai
 * venderemail  (offer_id, email)
 */

$sql = "
    SELECT 
        vo.id              AS offer_id,
        vo.vendor_id,
        v.name             AS vendor_name,
        v.address,
        vo.offer,
        vo.sdate,
        vo.edate,
        GROUP_CONCAT(DISTINCT vm.mobile)  AS mobiles,
        GROUP_CONCAT(DISTINCT ve.email)   AS emails,
        GROUP_CONCAT(DISTINCT vi.image)   AS images
    FROM venderoffer vo
    INNER JOIN vendor v          ON vo.vendor_id = v.id
    LEFT JOIN vendermobile vm    ON vm.offer_id  = vo.id
    LEFT JOIN venderemail ve     ON ve.offer_id  = vo.id
    LEFT JOIN vendor_images vi   ON vi.offer_id  = vo.id
    WHERE v.status = 1
    GROUP BY vo.id
    ORDER BY vo.id DESC
";

$rows = $db->getAllData($sql);

$offers = [];
foreach ($rows as $row) {
    $offers[] = [
        'offer_id'  => $row['offer_id'],
        'vendor_id' => $row['vendor_id'],
        'name'      => $row['vendor_name'],
        'offer'     => $row['offer'],
        'address'   => $row['address'],
        'sdate'     => $row['sdate'],
        'edate'     => $row['edate'],
        'mobiles'   => !empty($row['mobiles']) ? explode(',', $row['mobiles']) : [],
        'emails'    => !empty($row['emails'])  ? explode(',', $row['emails'])  : [],
        'images'    => !empty($row['images'])  ? explode(',', $row['images'])  : [],
    ];
}

function truncateText($text, $limit = 10)
{
    $text = trim($text);
    if (mb_strlen($text, 'UTF-8') <= $limit) {
        return $text;
    }
    return mb_substr($text, 0, $limit, 'UTF-8') . '...';
}


// Offer popup data
$popup_vendor_data = null;

// JS se query string me ?offer_id=ID bhejna hoga
$offer_id = isset($_GET['offer_id']) ? (int)$_GET['offer_id'] : 0;

if ($offer_id > 0) {
    $popup_sql = "
        SELECT 
            vo.id            AS offer_id,
            vo.vendor_id,
            v.name           AS vendor_name,
            v.address,
            vo.offer,
            vo.sdate,
            vo.edate,
            GROUP_CONCAT(DISTINCT vi.image)          AS vendor_images,
            GROUP_CONCAT(DISTINCT vc.condition)      AS vendor_conditions,
            GROUP_CONCAT(DISTINCT vgc.condition)     AS general_conditions,
            GROUP_CONCAT(DISTINCT ve.email)          AS emails,
            GROUP_CONCAT(DISTINCT vm.mobile)         AS mobiles
        FROM venderoffer vo
        INNER JOIN vendor v               ON vo.vendor_id = v.id
        LEFT JOIN vendor_images vi        ON vi.offer_id   = vo.id
        LEFT JOIN venderscondition vc     ON vc.offer_id   = vo.id
        LEFT JOIN vendergcondition vgc    ON vgc.offer_id  = vo.id
        LEFT JOIN venderemail ve          ON ve.offer_id   = vo.id
        LEFT JOIN vendermobile vm         ON vm.offer_id   = vo.id
        WHERE vo.id = $offer_id
        GROUP BY vo.id
        LIMIT 1
    ";

    $popup_rows = $db->getAllData($popup_sql);
    $popup_vendor_data = !empty($popup_rows) ? $popup_rows[0] : null;
}

?>


<!DOCTYPE html>
<html lang="en">
<!-- Your existing head content remains the same -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> BACHATDADDY </title>
<!-- All your existing CSS links -->
<link rel="icon" type="image/png" sizes="50x50" href="images/resources/Asset 3.png">
<meta name="description" content="BACHATDADDY">
<!-- fonts and all other links remain exactly the same -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />
<!-- ... rest of your head content ... -->
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

<body class="custom-cursor" style="position: relative;">
    <div class="page-wrapper">
        <?php require('include/header.php'); ?>

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
                    <?php if (!empty($offers)): ?>
                        <?php foreach ($offers as $offer): ?>
                            <div class="vendors-detail" onclick="showOffer(<?php echo $offer['offer_id']; ?>)">
                                <?php
                                $imagePath = './images/resources/321.jpg';
                                if (!empty($offer['images'])) {
                                    $firstImg  = $offer['images'][0];
                                    $imagePath = 'bachatdaddy@1357admin/adminuploads/images/vendors/' . htmlspecialchars($firstImg);
                                }
                                ?>
                                <img src="<?php echo $imagePath; ?>"
                                    alt="<?php echo htmlspecialchars($offer['name']); ?>">

                                <div class="offer-details">
                                    <div class="offer_name">
                                        <?php echo htmlspecialchars(truncateText($offer['name'], 14)); ?>
                                    </div>

                                    <div class="flat_discount">
                                        <span class="animate__animated animate__bounce animate__delay-2s animate__slower">
                                            <?php echo htmlspecialchars($offer['offer']); ?>
                                        </span>
                                    </div>

                                    <div class="address">
                                        <?php echo htmlspecialchars(truncateText($offer['address'], 20)); ?>
                                    </div>

                                    <div class="mobile-number">
                                        <?php if (!empty($offer['mobiles'])): ?>
                                            <?php foreach ($offer['mobiles'] as $mobile): ?>
                                                <a href="tel:<?php echo htmlspecialchars($mobile); ?>">
                                                    <?php echo htmlspecialchars($mobile); ?>
                                                </a>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <div>No contact number</div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="expiry-date">
                                        exp: <span><?php echo htmlspecialchars($offer['edate']); ?></span>
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

        <!-- Vendors Condition start - DYNAMIC DATA -->
        <div class="info-main-container" id="informationContainer">
            <div class="vendors-main-conditon" id="vendorsCondition">
                <div class="">
                    <h5>Offers Detail <i class="ri-close-fill" onclick="closePopUp()" id="closeIcon"></i></h5>
                    <hr>
                </div>
                <div class="vendors-content-image">
                    <div class="vendors-image">
                        <?php if ($popup_vendor_data && !empty($popup_vendor_data['vendor_images'])): ?>
                            <?php $images = explode(',', $popup_vendor_data['vendor_images']); ?>
                            <?php foreach ($images as $img): ?>
                                <img src="bachatdaddy@1357admin/adminuploads/images/vendors/<?php echo htmlspecialchars(trim($img)); ?>" alt="vendors Image">
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Optional: fallback image -->
                            <img src="images/default-vendor.jpg" alt="">
                        <?php endif; ?>
                    </div>

                    <div class="condition-content">
                        <div class="condition-question">
                            <div class="question">What is the Offer?</div>
                            <div><i class="ri-arrow-right-long-line"></i>
                                <?php echo $popup_vendor_data ? htmlspecialchars($popup_vendor_data['offer']) : ''; ?>
                            </div>
                        </div>

                        <div class="condition-question">
                            <div class="question">How can Anybody Eligibility to Grab the Offers?</div>
                            <div><i class="ri-arrow-right-long-line"></i> Customer must have Bachatdaddy Card.</div>
                        </div>

                        <div class="condition-question">
                            <div class="question">Validity Timeperiod</div>
                            <div><i class="ri-arrow-right-long-line"></i>
                                <span><?php echo $popup_vendor_data ? htmlspecialchars($popup_vendor_data['sdate']) : ''; ?></span> to
                                <span><?php echo $popup_vendor_data ? htmlspecialchars($popup_vendor_data['edate']) : ''; ?></span>
                            </div>
                        </div>

                        <?php if ($popup_vendor_data && !empty($popup_vendor_data['vendor_conditions'])): ?>
                            <?php $conditions = explode(',', $popup_vendor_data['vendor_conditions']); ?>

                            <div class="condition-question">
                                <div class="question">Terms and Condition</div>
                                <div>
                                    <?php foreach ($conditions as $condition): ?>
                                        <div><i class="ri-arrow-right-long-line"></i> <?php echo htmlspecialchars(trim($condition)); ?></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="question">Email:
                            <a href="mailto:<?php echo htmlspecialchars($popup_vendor_data['emails']); ?>">
                                <?php echo $popup_vendor_data ? htmlspecialchars($popup_vendor_data['emails']) : ''; ?>
                            </a>
                        </div>

                        <div class="question">Contact Number:
                            <?php if ($popup_vendor_data && !empty($popup_vendor_data['mobiles'])): ?>
                                <?php $mobiles = explode(',', $popup_vendor_data['mobiles']); ?>
                                <?php foreach ($mobiles as $mobile): ?>
                                    <a href="tel:<?php echo htmlspecialchars(trim($mobile)); ?>">
                                        <?php echo htmlspecialchars(trim($mobile)); ?>
                                    </a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span>+91</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vendors Condition end -->

        <?php require('include/footer.php'); ?>
    </div>

    <!-- Your existing mobile-nav and search-popup sections remain the same -->
    <!-- ... -->

    <!-- Your existing script includes remain the same -->
    <script src="vendors/jquery/jquery-3.6.0.min.js"></script>
    <!-- ... all other scripts ... -->
    <script src="js/bachat-daddy.js"></script>

    <script>
        let informationContainer = document.getElementById("informationContainer");
        let currentVendorId = null;

        const showOffer = (offer_id) => {
            currentVendorId = offer_id;

            // Check if we're already on the vendor page - don't reload
            const urlParams = new URLSearchParams(window.location.search);
            if (!urlParams.has('offer_id') || urlParams.get('offer_id') != offer_id) {
                // Only reload if vendor_id is different or missing
                window.location.href = window.location.pathname + '?offer_id=' + offer_id + '#informationContainer';
            } else {
                // Already on correct page, just show popup
                showPopup();
            }
        }

        function showPopup() {
            informationContainer.style.display = "block";
            informationContainer.style.backgroundColor = "rgba(0, 0, 0, 0.719)";
            document.body.style.overflowY = "hidden";
            window.scroll({
                top: 0,
                behavior: 'smooth'
            });
        }

        const closePopUp = () => {
            informationContainer.style.display = "none";
            informationContainer.style.backgroundColor = "transparent";
            document.body.style.overflowY = "auto";

            // Clear URL parameter
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.delete('offer_id');
            const newUrl = window.location.pathname + (urlParams.toString() ? '?' + urlParams.toString() : '');
            window.history.replaceState({}, document.title, newUrl);
            currentVendorId = null;

            const documentHeight = document.documentElement.scrollHeight;
            const viewportHeight = window.innerHeight;
            const scrollableHeight = documentHeight - viewportHeight;
            const targetScrollPosition = (scrollableHeight * 50) / 100;
            window.scroll({
                top: targetScrollPosition,
                behavior: 'smooth'
            });
        }

        // Auto-show popup if vendor_id exists in URL on page load
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('offer_id')) {
                const offer_id = urlParams.get('offer_id');
                currentVendorId = offer_id;
                showPopup();
            }
        });
    </script>
</body>

</html>