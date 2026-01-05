<?php
session_start();
include '../config/config.php';
include 'functions/authentication.php';
include 'functions/bachatdaddyfunction.php';
$auth = new Authentication();
$auth->checkSession(); 

$db = new dbClass();

$last_vendor = $db->getAllData("SELECT id, name, coupon_count FROM vendor ORDER BY id DESC LIMIT 1")[0] ?? null;
?>
<!DOCTYPE html>
<html>

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
    <!--swiper-slider-->
    <link rel="stylesheet" href="vendor/swiper/css/swiper-bundle.min.css">
    <!-- Style css -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .center-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .stats-card {
            max-width: 500px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .readonly-field {
            background: #f8f9fa;
        }
    </style>
</head>

<body>


    <!--*******************
        Preloader start
    ********************-->

    <!--*******************
        Preloader end
    ********************-->
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="wallet-open active">

        <!--**********************************
            Header start ti-comment-alt
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

    </div>

    <div class="center-container">
        <div class="card stats-card p-4">
            <h2 class="text-center mb-4">Latest Vendor Limits</h2>

            <?php if ($last_vendor): ?>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Vendor ID:</label>
                        <input type="text" class="form-control form-control-lg readonly-field" id="vendorId" value="<?= $last_vendor['id'] ?>" readonly>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Vendor Name:</label>
                        <input type="text" class="form-control form-control-lg readonly-field" id="vendorName" value="<?= htmlspecialchars($last_vendor['name']) ?>" readonly>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Coupon Count:</label>
                        <input type="number" class="form-control form-control-lg readonly-field" id="couponCount" value="<?= $last_vendor['coupon_count'] ?? 0 ?>" readonly>
                    </div>
                </div>
                <button class="btn btn-primary w-100 mt-4" id="submitBtn" disabled>Submit</button>
            <?php else: ?>
                <div class="text-center text-muted py-5">
                    <h4>No vendors found</h4>
                    <p>Add vendors first in admin panel.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
        // Future ke liye ready (abhi no action)
        document.getElementById('submitBtn')?.addEventListener('click', (e) => {
            e.preventDefault();
            alert('Submit disabled for now.');
        });
    </script>
</body>

</html>