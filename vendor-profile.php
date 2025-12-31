<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';

$vendor  = new Vendor();
$common  = new Common();
$industry = $common->getAllIdustry();


if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: vendor-profile.php');
    exit;
}

$Id = base64_decode($_GET['id']);
if (empty($Id)) {
    header('Location: index.php');
    exit;
}

$vendorRow = $vendor->getVendorById($Id);
// echo '<pre>';
// print_r($vendorRow);
// exit;

if (!empty($vendorRow[0])) {
    $vendorInfo = $vendorRow[0];
} else {
    header('Location: index.php');
    exit;
}


$iov = $vendor->getAllImages($Id);
$sov = $vendor->getAllVendorSconditions($Id);
$gov = $vendor->getAllVendorGconditions($Id);
// $fov = $vendor->getAllVendorOffers($Id);
$pov = $vendor->getAllVendorPhones($Id);
$eov = $vendor->getAllVendorEmails($Id);
$fov = $vendor->getAllVendorOffers($Id);

$offers = [];
$offerIds = [];
foreach ($fov as $of) {
    $offerId = $of['id'];
    $offerIds[] = $offerId;
    $offers[$offerId] = $of;
    $offers[$offerId]['images'] = [];
    $offers[$offerId]['mobiles'] = [];
    $offers[$offerId]['emails'] = [];
    $offers[$offerId]['sconditions'] = [];
    $offers[$offerId]['gconditions'] = [];
}

if (!empty($offerIds)) {
    // Images
    $iov = $vendor->getImagesByOfferIds($offerIds);
    foreach ($iov as $img) {
        if (isset($offers[$img['offer_id']])) {
            $offers[$img['offer_id']]['images'][] = $img['image'];
        }
    }

    // Mobiles
    $pov = $vendor->getMobilesByOfferIds($offerIds);
    foreach ($pov as $phone) {
        if (isset($offers[$phone['offer_id']])) {
            $offers[$phone['offer_id']]['mobiles'][] = $phone['mobile'];
        }
    }

    // Emails
    $eov = $vendor->getEmailsByOfferIds($offerIds);
    foreach ($eov as $email) {
        if (isset($offers[$email['offer_id']])) {
            $offers[$email['offer_id']]['emails'][] = $email['email'];
        }
    }

    // Special Conditions
    $sov = $vendor->getSconditionsByOfferIds($offerIds);
    foreach ($sov as $scond) {
        if (isset($offers[$scond['offer_id']])) {
            $offers[$scond['offer_id']]['sconditions'][] = $scond['condition'];
        }
    }

    // General Conditions
    $gov = $vendor->getGconditionsByOfferIds($offerIds);
    foreach ($gov as $gcond) {
        if (isset($offers[$gcond['offer_id']])) {
            $offers[$gcond['offer_id']]['gconditions'][] = $gcond['condition'];
        }
    }
}



function truncateText($text, $length)
{
    if (strlen($text) <= $length) return $text;
    return mb_substr($text, 0, $length) . '...';
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
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
        rel="stylesheet" />
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
        ul {
            list-style-type: none;
        }
    </style>
</head>

<body class="custom-cursor">



    <div class="page-wrapper">
        <!--**********************************
            Header start ti-comment-alt
        ***********************************-->


        <?php require('include/vendor_header.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--Profile Start-->
        <section class="team-details">
            <div class="container">
                <div class="team-details__inner">
                    <div class="row vendor-column-width">
                        <div class="col-12 text-center text-capitalize">
                            <h3>Welcome <?= htmlspecialchars($vendorInfo['vendor_name']); ?></h3>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-lg-5 ">
                                <div class="sticky-img vendor-first-column">
                                    <div class="team-details__left ">
                                        <div class="team-details__img">
                                            <img class="rounded-2"
                                                src="bachatdaddy@1357admin/adminuploads/images/vendors/<?=
                                                                                                        htmlspecialchars($vendorInfo['image']); ?>"
                                                alt="<?= htmlspecialchars($vendorInfo['vendor_name']); ?>">
                                        </div>

                                        <div class="vendor-info">
                                            <ul class="">
                                                <li>
                                                    <div class="icon vendor-icon">
                                                        <span class="icon-envelope"></span>
                                                    </div>
                                                    <a href="mailto:<?= htmlspecialchars($vendorInfo['email']); ?>">
                                                        <?= htmlspecialchars($vendorInfo['email']); ?>
                                                    </a>
                                                </li>

                                                <li>
                                                    <div class="icon vendor-icon">
                                                        <span class="icon-location"></span>
                                                    </div>
                                                    <span><?= htmlspecialchars($vendorInfo['vendor_address']); ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- right side abhi blank/chhod sakte ho; baad me offers add karenge -->

                            <div class="col-xl-6 col-lg-7 vendor-secound-column">
                                <div class="team-details__right">

                                    <div class="main-slider__carousel owl-carousel owl-theme thm-owl__carousel"
                                        data-owl-options='{"loop": true, "items": 1, "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"], "margin": 0, "dots": true, "nav": false, "animateOut": "slideOutDown", "animateIn": "fadeIn", "active": true, "smartSpeed": 1000, "autoplay": true, "autoplayTimeout": 7000, "autoplayHoverPause": false}'>
                                        <?php foreach ($iov as $offer): ?>
                                            <div class="item main-slider__slide-1">
                                                <img src="bachatdaddy@1357admin/adminuploads/images/vendors/<?php echo $offer['image']; ?>" alt="">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="vendor-profile-details">
                                        <p class=""><strong>Eligibility : </strong> Bachatdaddy Card Holder</p>
                                    </div>
                                    <div class="vendor-profile-details">
                                        <?php if ($sov != "" && $sov != null && $sov != '0'): ?>
                                            <p><strong>Address : </strong></p>
                                            <ul class="ul-padding">
                                                <li>
                                                    <?= htmlspecialchars($vendorInfo['vendor_address']); ?>
                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                    <div class="vendor-profile-details">
                                        <?php if ($gov != "" && $gov != null && $gov != '0'): ?>
                                            <p><strong>Mobile Number : </strong></p>
                                            <ul class="ul-padding">
                                                <li>
                                                    <?= htmlspecialchars($vendorInfo['mobile']); ?>
                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Profile End-->
        <section>
            <h3 class="text-center text-capitalize" style="margin-bottom: 50px;">Current offers</h3>
            <section class="vendors-offer">
                <div class="vendors-content">
                    <div class="vendors-detail-container">
                        <?php if (!empty($offers)): ?>
                            <?php foreach ($offers as $offer): ?>
                                <div class="vendors-detail" onclick="showOffer(<?php echo (int)$offer['id']; ?>)">
                                    <!-- Image -->
                                    <?php
                                    $img = !empty($offer['images']) ? $offer['images'][0] : null;
                                    $src = $img
                                        ? 'bachatdaddy@1357admin/adminuploads/images/vendors/' . htmlspecialchars($img)
                                        : './images/resources/321.jpg';
                                    ?>
                                    <img src="<?= $src ?>" alt="Offer image">
                                    <div class="vendor-offer-details">
                                        <div class="offer-edit">
                                            <div class="offer_name">
                                                Offer: <?= htmlspecialchars($offer['offer']); ?>
                                            </div>
                                        </div>
                                        <!-- Validity Dates -->
                                        <div class="expiry-date">
                                            <?php if (!empty($offer['sdate']) && !empty($offer['edate'])): ?>
                                                <i class="ri-time-fill"></i> <?= htmlspecialchars($offer['sdate']); ?> to <?= htmlspecialchars($offer['edate']); ?>
                                            <?php elseif (!empty($offer['edate'])): ?>
                                                Expires: <?= htmlspecialchars($offer['edate']); ?>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Offer Title/Description -->
                                        <div class="mobile-email">
                                            <!-- Mobiles -->
                                            <div class="mobile-number">
                                                <?php if (!empty($offer['mobiles'])): ?>
                                                    <?php foreach ($offer['mobiles'] as $mobile): ?>
                                                        <a href="tel:<?= htmlspecialchars($mobile); ?>">
                                                            <i class="ri-phone-fill"></i> <?= htmlspecialchars(truncateText($mobile, 10)); ?>
                                                        </a>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <div>No contact</div>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Emails -->
                                            <div class="email-section">
                                                <?php if (!empty($offer['emails'])): ?>
                                                    <?php foreach ($offer['emails'] as $email): ?>
                                                        <a href="mailto:<?= htmlspecialchars($email); ?>">
                                                            <i class="ri-mail-check-fill"></i> <?= htmlspecialchars(truncateText($email, 16)); ?>
                                                        </a>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>


                                        <!-- Special Conditions -->
                                        <!-- <?php if (!empty($offer['sconditions'])): ?>
                                            <div class="conditions">
                                                <strong>Special Terms:</strong>
                                                <ul>
                                                    <?php foreach ($offer['sconditions'] as $cond): ?>
                                                        <li><?= htmlspecialchars($cond); ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?> -->

                                        <!-- General Conditions -->
                                        <!-- <?php if (!empty($offer['gconditions'])): ?>
                                            <div class="conditions">
                                                <strong>General Terms:</strong>
                                                <ul>
                                                    <?php foreach ($offer['gconditions'] as $cond): ?>
                                                        <li><?= htmlspecialchars($cond); ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?> -->

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-center">No current offers for this vendor right now.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </section>
    </div><!-- /.page-wrapper -->


    <!-- Delete Confirmation Modal -->
    <div id="deleteOfferModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Offer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="border-width: 0; background-color: transparent">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this offer?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Offer Modal -->
    <div id="editOfferModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Offer Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editOfferForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- Important hidden fields -->
                        <input type="hidden" name="vendor_id" id="edit_vendor_id">
                        <input type="hidden" name="offer_id" id="edit_offer_id">

                        <div class="form-group">
                            <label for="edit_mobile">Mobile</label>
                            <input type="text" class="form-control" name="mobile" id="edit_mobile">
                        </div>

                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input type="email" class="form-control" name="email" id="edit_email">
                        </div>

                        <div class="form-group">
                            <label for="edit_vendor_condition">Vendor Terms &amp; Conditions</label>
                            <textarea class="form-control" name="vendor_condition" id="edit_vendor_condition" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="edit_general_condition">General Terms &amp; Conditions</label>
                            <textarea class="form-control" name="general_condition" id="edit_general_condition" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Current Image</label>
                            <div id="current_vendor_image_wrapper">
                                <!-- JS se current image yahan show hogi -->
                                <img id="current_vendor_image" src="" alt="Vendor Image" style="max-width: 150px; display:none;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="edit_image">Change Image (max 2MB)</label>
                            <input type="file" class="form-control-file" name="image" id="edit_image" accept="image/*">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <span id="editOfferError" class="text-danger mr-auto" style="display:none;"></span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save All Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!----------------------
     Mobile footer 
    ------------------------->
    <?php require('include/mobilefooter.php') ?>
    <!----------------------------
    Mobile footer 
    ----------------------------->

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>