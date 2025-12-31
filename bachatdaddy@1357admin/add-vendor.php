<?php
if (!isset($_SESSION)) {
    session_start();
}
require '../config/config.php';
require 'functions/authentication.php';
require 'functions/bachatdaddyfunction.php';
include 'include/image-resize.php';

$vendor = new Vendor();
$industry = new Industry();
$subindustry = new SubIndustry();
$auth = new Authentication();
$auth->checkSession();
$allsubIndustrudata = $subindustry->getAllIndustry();
$industrydata = $industry->getAllIdustry();

// -----------------------------------------------fetching data fro db for the table-----------------------------------//

if (isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
    $image = time() . "-" . $_FILES['image']['name'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $subindustry = $_POST['subindustry'];
    $couponcount = $_POST['couponcount'];
    $discountdiscription = $_POST['discountdiscription'];
    $mobile = $_POST['mobile'];


    $image = time() . "-" . $_FILES['image']['name'];
    $imagetmp = $_FILES['image']['tmp_name'];
    $dest = "adminuploads/images/vendors/" . $image;

    $prefix = "Gp@";
    $length = 7;
    $min = pow(10, $length - 1);
    $max = pow(10, $length) - 1;
    $random_number = mt_rand($min, $max);
    $password = $prefix . $random_number;


    $result = $vendor->addVendor(
        $name,
        $subindustry,
        $address,
        $city,
        $email,
        $password,
        $image,
        $couponcount,
        $discountdiscription,
        $mobile
    );

    if ($result == true) {

        move_uploaded_file($imagetmp, $dest);
        $idof = $vendor->VlastInsertId();
        $vandor_id = $idof['id'];

        $ido = $vendor->VlastOfferId();
        $offer_id = $ido['id'];

        if (!empty($_POST['offers'])) {
            foreach ($_POST['offers'] as $offerIndex => $offerData) {
                // Ab offer text sahi se aayega!
                $offer = trim($offerData['offer'] ?? '');
                $sdate = trim($offerData['sdate'] ?? '');
                $edate = trim($offerData['edate'] ?? '');

                if (!empty($offer)) {
                    $result = $vendor->insertVendorOffer($vandor_id, $offer, $sdate, $edate);
                }
            }
        }

        if (!empty($_POST['emails'])) {
            foreach ($_POST['emails'] as $email) {
                $email = trim($email);
                if (!empty($email)) {              // ← IMPORTANT
                    $result = $vendor->insertVendorEmail($vandor_id, $email, $offer_id);
                }
                // $result = $vendor->insertVendorEmail($vandor_id, $email);
            }
        }
        if (!empty($_POST['phones'])) {
            foreach ($_POST['phones'] as $phone) {
                $phone = trim($phone);
                if (!empty($phone)) {              // ← IMPORTANT
                    $result = $vendor->insertVendorPhone($vandor_id, $phone, $offer_id);
                }
                // $result = $vendor->insertVendorPhone($vandor_id, $phone);
            }
        }
        // foreach ($_POST['offers'] as $offer) {
        // $offer = trim($offer);
        // if (!empty($_POST['offers'])) {
        //     echo "<pre>"; print_r($_POST['offers']); echo "</pre>"; exit;
        //     foreach ($_POST['offers'] as $offerIndex => $offerData) {
        //         echo "OfferData: "; print_r($offerData); exit;
        //         $offer = trim($offerData['offers'][0] ?? '');
        //         $sdate = $offerData['sdate'] ?? null;
        //         $edate = $offerData['edate'] ?? null;

        //         if (!empty($offer)) {  // ← ADD THIS
        //             $result = $vendor->insertVendorOffer($vandor_id, $offer, $sdate, $edate);
        //         }

        //         // $result = $vendor->insertVendorOffer($vandor_id, $offer, $sdate, $edate);
        //     }
        // }

        if (!empty($_POST['sconditions'])) {
            foreach ($_POST['sconditions'] as $scondition) {
                $scondition = trim($scondition);
                if (!empty($scondition)) {              // ← IMPORTANT
                    $result = $vendor->insertVendorScondition($vandor_id, $scondition, $offer_id);
                }
                // $result = $vendor->insertVendorScondition($vandor_id, $scondition);
            }
        }
        if (!empty($_POST['gconditions'])) {
            foreach ($_POST['gconditions'] as $gcondition) {
                $gcondition = trim($gcondition);
                if (!empty($gcondition)) {              // ← IMPORTANT
                    $result = $vendor->insertVendorGcondition($vandor_id, $gcondition, $offer_id);
                }
                // $result = $vendor->insertVendorGcondition($vandor_id, $gcondition);
            }
        }

        if (!empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['name'] as $key => $imageName) {
                if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                    $tempName = $_FILES['images']['tmp_name'][$key];
                    $image = time() . "-" . $imageName;
                    $dest = "adminuploads/images/vendors/" . $image;
                    $result = $vendor->insertProductImages($vandor_id, $image, $offer_id);
                    if ($result) {
                        move_uploaded_file($tempName, $dest);
                    }
                }
            }
        }
        if ($result) {
            $subject = "From Gaadiplan ";
            $txt = "Hello Sir your password is $password";

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8\r\n";

            if (mail($email, $subject, $txt, $headers)) {
                $_SESSION['msg'] = 'Email sent successfully.';
            } else {
                echo "Email sending failed.";
            }
        }
    } else {

        echo "<script>alert('Sorry Some Error !! Try Again..')</script>";
    }
    header('Location: add-vendor.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="">
    <meta name="format-detection" content="telephone=no">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title Here -->
    <title>BACHATDADDY</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/logo/favicon.png">
    <link href="vendor/wow-master/css/libs/animate.css" rel="stylesheet">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/bootstrap-select-country/css/bootstrap-select-country.min.css">
    <link rel="stylesheet" href="vendor/jquery-nice-select/css/nice-select.css">
    <link href="vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--swiper-slider-->f
    <link rel="stylesheet" href="vendor/swiper/css/swiper-bundle.min.css">
    <!-- Style css -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        label.error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>

<body>




    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="home.html" class="navbar-brand d-flex align-items-center ">
                <!-- Image that will be changed -->
                <img id="logoImg" class="img-logo img-fluid logo-1" src="images/logo/logo.jpg" alt="Logo">
            </a>
            <a href="home.html" class="navbar-brand d-flex align-items-center ">
                <!-- Image that will be changed -->
                <img id="logoImg" class="img-logo img-fluid logo-2" src="images/logo/favicon.png" alt="Logo">
            </a>
            <div class="nav-control" onclick="changeLogo()">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                    <svg width="26" height="26" viewbox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="22" y="11" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="11" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="22" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="11" y="11" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="11" y="22" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect y="11" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="22" y="22" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect y="22" width="4" height="4" rx="2" fill="#2A353A"></rect>
                    </svg>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php require('include/header.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php require('include/sidebar.php'); ?>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- container starts -->
            <div class="container-fluid">

                <!-- Vendor Category Form Section -->
                <div class="col-xl-12">
                    <div class="card pb-5" id="bootstrap-table2">
                        <div class="card-header flex-wrap d-flex justify-content-between border-0 px-3">
                            <h2>Vendors</h2>
                        </div>


                        <form id="vendorForm" method="post" enctype="multipart/form-data" class="form-horizontal ms-5">
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="industry" class="form-control-label">Industry Name</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <select id="industry" class="form-control" name="industry" aria-label="Default select example" required title="Please select an industry." onchange="updateSubindustries()">
                                        <option value="" selected>Select Industry</option>
                                        <?php foreach ($industrydata as $row): ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small id="industryError" class="form-text text-danger" style="display: none;">Please select an industry.</small>
                                </div>

                            </div>
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="subindustry" class="form-control-label">Vendors Category</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <select class="form-control" required title="Please select an Category." name="subindustry" id="subindustry">
                                        <option value="">Select Category</option>
                                        <!-- Subindustry options will be populated based on the selected industry -->
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="name" class=" form-control-label">Property Name</label>
                                </div>
                                <div class="col-12 col-md-6"> <!-- Changed col-md-8 to col-md-6 -->
                                    <input type="text" id="name" name="name" class="form-control" maxlength="200">
                                </div>
                            </div>
                            <!-- <div class="row form-group mb-4">
                                            <div class="col col-md-2">
                                                <label for="name" class=" form-control-label">Vendor Phone</label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" id="phone" name="phone" class="form-control" maxlength="200">
                                            </div>
                                        </div> -->
                            <div class="phone_field_wrapper mb-4">
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="name" class=" form-control-label">Vendor Email</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" maxlength="200">
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="mobile" class="form-control-label">Vendor Mobile <small>(Main)</small></label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="tel" id="mobile" name="mobile" class="form-control"
                                        maxlength="15" placeholder="" required>
                                </div>
                            </div>

                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="state" class=" form-control-label">State</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <select class="form-control" name="state" id="state" onchange="updateCities()">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="city" class=" form-control-label">City</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <select class="form-control" name="city" id="city">
                                        <option value="">Select City</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="address" class=" form-control-label">Address</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="text" id="address" name="address" class="form-control" maxlength="200">
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label class="form-control-label">Image (Size : 1200px*1125px)</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="file" onchange="return fileValidation(this)" id="image" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="image" class=" form-control-label">Preview Image</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <td><img id="imagePreview" height="120" width="150"></td>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="coupon_count" class="form-control-label">Number of Coupons</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="number" id="coupon_count" name="couponcount"
                                        class="form-control" min="0" value="0">
                                </div>
                            </div>

                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="discount_description" class="form-control-label">Discount Description</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <textarea id="discount_description" name="discountdiscription"
                                        class="form-control" rows="3"
                                        placeholder="Add Coupon offer"></textarea>
                                </div>
                            </div>

                            <h3>Offer Details</h3>
                            <button type="button" id="addOfferBtn" class="btn btn-success mb-4">
                                ➕ Add Complete Offer
                            </button>

                            <!-- Dynamic Offers Container -->
                            <div id="offersContainer">
                                <!-- First offer auto-load hoga -->
                            </div>

                            <!-- HIDDEN TEMPLATE (Copy your exact sections) -->
                            <div id="offerTemplate" style="display: none;">
                                <div class="complete-offer border p-4 mb-4 bg-light rounded" data-offer-index="0">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5><strong>Offer #<span class="offer-number">1</span></strong></h5>
                                        <button type="button" class="btn btn-danger btn-sm remove-offer">❌ Remove Offer</button>
                                    </div>

                                    <!-- 1. OFFER FIELD (your exact code) -->
                                    <div class="offer_field_wrapper mb-3">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class="form-control-label">Offer</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input type="text" name="offers[0][offer]" class="form-control" required maxlength="200" placeholder="Offer Name">
                                            </div>
                                            <!-- <div class="col-md-2">
                                                <a href="javascript:void(0);" class="btn btn-success add_offer_button" title="Add More">Add More</a>
                                            </div> -->
                                        </div>
                                    </div>

                                    <!-- 2. IMAGES (your exact code) -->
                                    <div class="field_wrapper mb-3">
                                        <div class="row form-group">
                                            <div class="col col-md-2">
                                                <label class="form-control-label">Add More Images (Size : 1200px*1125px)</label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="file" onchange="return fileValidation1(this)" name="images[]" class="form-control w-80">
                                            </div>
                                            <div class="col-md-2">
                                                <a href="javascript:void(0);" class="btn btn-success add_button w-100" title="Add field">Add More</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 3. EMAILS (your exact code) -->
                                    <div class="email_field_wrapper mb-3">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email" class="form-control-label">Email</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input type="email" name="emails[]" class="form-control" maxlength="200" placeholder="Additional Email">
                                            </div>
                                            <!-- <div class="col-md-2">
                                                <a href="javascript:void(0);" class="btn btn-success add_email_button" title="Add field">Add More</a>
                                            </div> -->
                                        </div>
                                    </div>

                                    <!-- 4. PHONES (your exact code) -->
                                    <div class="row form-group mb-3">
                                        <div class="col col-md-3">
                                            <label for="phone" class="form-control-label">Phone</label>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <input type="tel" name="phones[]" class="form-control" maxlength="15" placeholder="Phone">
                                        </div>
                                        <!-- <div class="col-md-2">
                                            <a href="javascript:void(0);" class="btn btn-success add_phone_button" title="Add field">Add More</a>
                                        </div> -->
                                    </div>

                                    <!-- 5. SPECIAL CONDITIONS (your exact code) -->
                                    <div class="sconditions_field_wrapper mb-3">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="sconditions" class="form-control-label">Special terms and conditions</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input type="text" name="sconditions[]" class="form-control" maxlength="200" placeholder="Special conditions Description">
                                            </div>
                                            <!-- <div class="col-md-2">
                                                <a href="javascript:void(0);" class="btn btn-success add_sconditions_button" title="Add More">Add More</a>
                                            </div> -->
                                        </div>
                                    </div>

                                    <!-- 6. GENERAL CONDITIONS (your exact code) -->
                                    <div class="gconditions_field_wrapper mb-3">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="gconditions" class="form-control-label">General terms and conditions</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input type="text" name="gconditions[]" class="form-control" maxlength="200" placeholder="General conditions Description">
                                            </div>
                                            <!-- <div class="col-md-2">
                                                <a href="javascript:void(0);" class="btn btn-success add_gconditions_button" title="Add More">Add More</a>
                                            </div> -->
                                        </div>
                                    </div>

                                    <div class="row form-group mb-3">
                                        <div class="col-md-6">
                                            <label>Start Date</label>
                                            <input type="date" name="offers[0][sdate]" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>End Date</label>
                                            <input type="date" name="offers[0][edate]" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> SUBMIT
                            </button>

                        </form>
                        <script>
                            $('#vendorForm').on('submit', function() {
                                $('button[type="submit"]').prop('disabled', true).text('Adding...');
                                return true;
                            });
                        </script>
                    </div>
                </div>


            </div>


        </div>
        <!--**********************************
        Main wrapper end
    ***********************************-->

        <script src="vendor/global/global.min.js"></script>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Include jQuery Validation Plugin -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

        <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/dlabnav-init.js"></script>
        <script src="js/state.js"></script>

        <SCript>
            console.log('VENDORFORM', new FormData(document.getElementById('vendorForm')));
        </SCript>

        <!-- code-highlight -->
        <script src="js/highlight.min.js"></script>
        <script>
            hljs.highlightAll();
            hljs.configure({
                ignoreUnescapedHTML: true
            })
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                document.querySelectorAll('pre code').forEach((el) => {
                    hljs.highlightElement(el);
                });
            });
        </script>
        <script>
            function changeLogo() {
                var logo = document.getElementById('logoImg');
                if (logo.src.indexOf('logo.jpg') > -1) {
                    logo.src = 'images/logo/favicon.png';
                } else {
                    logo.src = 'images/logo/logo.jpg';
                }
            }
        </script>


        <script>
            function updateCities() {
                var stateName = jQuery('#state').val();

                if (stateName) {
                    jQuery.ajax({
                        type: 'POST',
                        url: '../get-cities.php',
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
            function updateSubindustries() {
                var industryName = jQuery('#industry').val();

                if (industryName) {
                    jQuery.ajax({
                        type: 'POST',
                        url: '../get-subindustry.php',
                        data: {
                            industry_name: industryName
                        },
                        success: function(response) {
                            var subindustrySelect = jQuery('#subindustry');
                            subindustrySelect.html('<option value="">Select Subindustry</option>');

                            if (response) {
                                subindustrySelect.append(response);
                            } else {
                                subindustrySelect.html('<option value="">No subindustries available</option>');
                            }
                        },
                        error: function(xhr, status, error) {
                            jQuery('#subindustry').html('<option>Error loading subindustries</option>');
                        }
                    });
                } else {
                    jQuery('#subindustry').html('<option value="">Select Industry first</option>');
                }
            }
        </script>

        <script>
            document.getElementById('fileUpload').addEventListener('change', previewImage);

            function previewImage(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('previewImage');

                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        preview.src = reader.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert("Please select a valid image file.");

                    preview.style.display = 'none';
                    event.target.value = "";
                }
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var maxField = 6;
                var addButton = $('.add_button');
                var wrapper = $('.field_wrapper');

                var fieldHTML = '<div class="row form-group remove mt-5"><div class="col col-md-3"></div><div class="col-6 col-md-5 "><input type="file"  onchange="return fileValidation1(this)" name="images[]" class="form-control"></div><a href="javascript:void(0);" class="btn btn-danger remove_button col-md-1" style="margin-left: 15px;">Remove</a></div>';

                var x = 1;
                $(addButton).click(function() {

                    if (x < maxField) {
                        x++;
                        $(wrapper).append(fieldHTML);
                    }
                });

                $(wrapper).on('click', '.remove_button', function(e) {
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var maxFields = 3; // Maximum number of email fields
                var addButton = $('.add_email_button'); // Add button selector
                var wrapper = $('.email_field_wrapper'); // Field wrapper
                var fieldHTML = `
                <div class="row form-group remove_email  mb-4 mt-4">
                    <div class="col col-md-3"></div>
                    <div class="col-12 col-md-3">
                        <input type="email" name="emails[]" class="form-control" required maxlength="200" placeholder="Email">
                    </div>
                    <div class="col-md-2">
                    <a href="javascript:void(0);" class="btn btn-danger remove_button" style="margin-left: 15px;">Remove</a>
                    </div>
                </div>`;
                var x = 1; // Initial field counter

                // Add button click event
                $(addButton).click(function() {
                    if (x < maxFields) { // Check max fields limit
                        x++;
                        $(wrapper).append(fieldHTML); // Add new email field
                    }
                });

                // Remove button click event
                $(wrapper).on('click', '.remove_button', function(e) {
                    e.preventDefault();
                    $(this).closest('.remove_email').remove(); // Remove the email field group
                    x--; // Decrease the field count
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var maxFields = 3; // Maximum number of phone fields
                var addButton = $('.add_phone_button'); // Add button selector
                var wrapper = $('.phone_field_wrapper'); // Field wrapper
                var fieldHTML = `
                <div class="row form-group remove_phone mb-4 mt-4">
                    <div class="col col-md-3"></div>
                    <div class="col-12 col-md-3">
                        <input type="tel" name="phones[]" class="form-control" required maxlength="15" placeholder="Phone">
                    </div>
                    <div class="col-md-2">
                    <a href="javascript:void(0);" class="btn btn-danger remove_button" style="margin-left: 15px;">Remove</a>
                    </div>
                </div>`;
                var x = 1; // Initial field counter

                // Add button click event
                $(addButton).click(function() {
                    if (x < maxFields) { // Check max fields limit
                        x++;
                        $(wrapper).append(fieldHTML); // Add new phone field
                    }
                });

                // Remove button click event
                $(wrapper).on('click', '.remove_button', function(e) {
                    e.preventDefault();
                    $(this).closest('.remove_phone').remove(); // Remove the phone field group
                    x--; // Decrease the field count
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var maxFields = 6; // Maximum number of offer fields
                var addButton = $('.add_offer_button'); // Add button selector for offers
                var wrapper = $('.offer_field_wrapper'); // Field wrapper for offers
                var fieldHTML = `
                <div class="row form-group remove_offer mb-4 mt-4">
                    <div class="col col-md-3"></div>
                    <div class="col-12 col-md-3">
                        <input type="text" name="offers[]" class="form-control" required maxlength="200" placeholder="Offer Description">
                    </div>
                    <div class="col-md-2">
                    <a href="javascript:void(0);" class="btn btn-danger remove_button" style="margin-left: 15px;">Remove</a>
                    </div>
                </div>`;
                var x = 1; // Initial field counter for offers

                // Add button click event for offers
                $(addButton).click(function() {
                    if (x < maxFields) { // Check if the max fields limit is not reached
                        x++;
                        $(wrapper).append(fieldHTML); // Append new offer field
                    }
                });

                // Remove button click event for offers
                $(wrapper).on('click', '.remove_button', function(e) {
                    e.preventDefault();
                    $(this).closest('.remove_offer').remove(); // Remove the offer field group
                    x--; // Decrease the field count
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var maxFields = 6; // Maximum number of sconditions fields
                var addButton = $('.add_sconditions_button'); // Add button selector for sconditions
                var wrapper = $('.sconditions_field_wrapper'); // Field wrapper for sconditions
                var fieldHTML = `
            <div class="row form-group remove_sconditions mb-4 mt-4">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-3">
                    <input type="text" name="sconditions[]" class="form-control" required maxlength="200" placeholder="Special conditions Description">
                </div>
                <div class="col-md-2">
                    <a href="javascript:void(0);" class="btn btn-danger remove_button" style="margin-left: 15px;">Remove</a>
                </div>
            </div>`;
                var x = 1; // Initial field counter for sconditions

                // Add button click event for sconditions
                $(addButton).click(function() {
                    if (x < maxFields) { // Check if the max fields limit is not reached
                        x++;
                        $(wrapper).append(fieldHTML); // Append new sconditions field
                    }
                });

                // Remove button click event for sconditions
                $(wrapper).on('click', '.remove_button', function(e) {
                    e.preventDefault();
                    $(this).closest('.remove_sconditions').remove(); // Remove the sconditions field group
                    x--; // Decrease the field count
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var maxFields = 6; // Maximum number of gconditions fields
                var addButton = $('.add_gconditions_button'); // Add button selector for gconditions
                var wrapper = $('.gconditions_field_wrapper'); // Field wrapper for gconditions
                var fieldHTML = `
            <div class="row form-group remove_gconditions mb-4 mt-4">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-3">
                    <input type="text" name="gconditions[]" class="form-control" required maxlength="200" placeholder="General conditions Description">
                </div>
                <div class="col-md-2">
                    <a href="javascript:void(0);" class="btn btn-danger remove_button" style="margin-left: 15px;">Remove</a>
                </div>
            </div>`;
                var x = 1; // Initial field counter for gconditions

                // Add button click event for gconditions
                $(addButton).click(function() {
                    if (x < maxFields) { // Check if the max fields limit is not reached
                        x++;
                        $(wrapper).append(fieldHTML); // Append new gconditions field
                    }
                });

                // Remove button click event for gconditions
                $(wrapper).on('click', '.remove_button', function(e) {
                    e.preventDefault();
                    $(this).closest('.remove_gconditions').remove(); // Remove the gconditions field group
                    x--; // Decrease the field count
                });
            });
        </script>

        <script>
            function fileValidation() {
                var fileInput =
                    document.getElementById('image');

                var filePath = fileInput.value;


                var allowedExtensions =
                    /(\.jpg|\.jpeg|\.png)$/i;

                if (!allowedExtensions.exec(filePath)) {
                    alert('Invalid file type');
                    fileInput.value = '';
                    return false;
                } else {
                    if (fileInput.files && fileInput.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('imagePreview').src = e.target.result;
                        };
                        reader.readAsDataURL(fileInput.files[0]);
                    }
                }
            }
        </script>

        <script>
            function fileValidation1(inputElement) {
                var filePath = inputElement.value;

                var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

                if (!allowedExtensions.exec(filePath)) {
                    alert('Invalid file type');
                    inputElement.value = ''; // Clear the input if invalid file type
                    return false;
                } else {
                    if (inputElement.files && inputElement.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {

                        };
                        reader.readAsDataURL(inputElement.files[0]);
                    }
                }
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                // Apply the jQuery Validation plugin to the form
                $('#vendorForm').validate({
                    rules: {
                        name: {
                            required: true
                        },
                        email: {
                            required: true
                        },
                        offerhead: {
                            required: true
                        },
                        sdate: {
                            required: true
                        },
                        edate: {
                            required: true
                        },
                        state: {
                            required: true
                        },
                        city: {
                            required: true
                        },
                        address: {
                            required: true
                        },
                        image: {
                            required: true
                        }
                    },
                    messages: {
                        email: {
                            required: "Email name is required."
                        },
                        city: {
                            required: "City is required."
                        },
                        offerhead: {
                            required: "Offer Heading is required."
                        },
                        sdate: {
                            required: "Start offer date is required."
                        },
                        edate: {
                            required: "End offer date is required."
                        },
                        state: {
                            required: "State is required."
                        },
                        city: {
                            required: "City is required."
                        },
                        address: {
                            required: "Address is required."
                        },
                        image: {
                            required: "Please upload an image."
                        }
                    },
                    errorPlacement: function(error, element) {
                        // Insert the error message after the input field
                        error.insertAfter(element);
                    },
                    highlight: function(element, errorClass, validClass) {
                        // Highlight the input field in case of error
                        $(element).addClass("error").removeClass("valid");
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        // Remove the error styling when input is valid
                        $(element).removeClass("error").addClass("valid");
                    }
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                let offerCount = 0;

                $('#addOfferBtn').click(function() {
                    offerCount++;
                    let template = $('#offerTemplate').html();

                    template = template.replace(/name="offers\[0\]\[offer\]"/g, `name="offers[${offerCount}][offer]"`);

                    template = template.replace(/name="offers\[0\]\[sdate\]"/g, `name="offers[${offerCount}][sdate]"`);

                    template = template.replace(/name="offers\[0\]\[edate\]"/g, `name="offers[${offerCount}][edate]"`);

                    template = template.replace(/<span class="offer-number">1<\/span>/g, `<span class="offer-number">${offerCount}</span>`);

                    $('#offersContainer').append(template);
                });

                $(document).on('click', '.remove-offer', function(e) {
                    e.preventDefault();
                    $(this).closest('.complete-offer').remove();
                    offerCount--;
                });

                setTimeout(function() {
                    $('#addOfferBtn').click();
                }, 100);
            });
        </script>


</body>

</html>