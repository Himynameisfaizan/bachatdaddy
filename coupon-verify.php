<?php
session_start();
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
include 'functions/authentication.php';
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

        body {
            background: #f5f6fb;
        }
    </style>
    <style>

    </style>

</head>

<body class="custom-cursor">
    <section>
        <div class="verify-wrapper">
            <div class="verify-card row g-0">

                <!-- Left side -->
                <div class="col-md-4 verify-sidebar">
                    <div class="verify-badge">
                        <span class="icon">%</span>
                        <span>Discount Card · Vendor Panel</span>
                    </div>
                    <h4>Verify Customer Coupon</h4>
                    <p>Check card, email and coupon code before giving discount to customer.</p>
                    <hr class="border-light opacity-25">
                    <ul class="list-unstyled small mt-3">
                        <li>• Only active card holders are eligible.</li>
                        <li>• Coupon can be used once per customer.</li>
                    </ul>
                </div>

                <!-- Right side (form) -->
                <div class="col-md-8">
                    <div class="verify-main">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <div class="verify-title">One Step to Verify Coupon</div>
                                <div class="verify-subtitle">Fill customer details below and validate the coupon instantly.</div>
                            </div>
                        </div>

                        <form id="couponVerifyForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label"><b>Card Number</b></label>
                                    <div class="icon-input">
                                        <span class="input-icon">
                                            <i class="ri-id-card-line"></i>
                                        </span>
                                        <input type="text" class="form-control" id="cardNumber" name="card_number" placeholder="Enter card number" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><b>Customer Email</b></label>
                                    <div class="icon-input">
                                        <span class="input-icon">
                                            <i class="ri-mail-unread-line"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="customer@example.com" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label"><b>Select Vendor</b></label>
                                    <div class="icon-input">
                                        <span class="input-icon">
                                            <i class="ri-store-line"></i>
                                        </span>
                                        <select class="form-control" id="vendorSelect" name="vendor_id" required>
                                            <option value="">Loading vendors...</option>
                                        </select>
                                    </div>
                                    <div class="verify-hint mt-1">Select the vendor/store where customer visited.</div>
                                </div>
                                <div class="col-12">
                                    <div id="verifyResult" class="mt-2" style="display:none;"></div>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <button type="submit" class="btn btn-verify w-100 py-2 text-white">
                                        Verify Coupon
                                    </button>
                                </div>
                                <div class="col-md-6 mt-1 text-md-end text-muted verify-hint d-flex align-items-center justify-content-md-end">
                                    Coupon verification powered by Bachatdaddy
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

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
    <script>
        $(document).ready(function() {
            $.getJSON('api/verify-coupon.php')
                .done(function(data) {
                    const select = document.getElementById('vendorSelect');
                    select.innerHTML = '<option value="">Select Vendor</option>';

                    for (let i = 0; i < data.length; i++) {
                        const option = document.createElement('option');
                        option.value = data[i].id;
                        option.text = data[i].name;
                        select.appendChild(option);
                    }
                })
                .fail(function(xhr, status, error) {
                    document.getElementById('vendorSelect').innerHTML = '<option>Error loading vendors</option>';
                });

            // Form submit
            document.getElementById('couponVerifyForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const cardNumber = document.getElementById('cardNumber').value.trim();
                const email = document.getElementById('email').value.trim();
                const vendorId = document.getElementById('vendorSelect').value;

                if (!cardNumber || !email || !vendorId) {
                    showResult('All fields required.', 'warning');
                    return;
                }

                showResult('Verifying visit...', 'info');

                fetch('api/verify-visit.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            card_number: cardNumber,
                            email: email,
                            vendor_id: vendorId
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            showResult(`✓ Coupon Used! Count: ${data.visit_count}/${data.max_limit}`, 'success');
                        } else {
                            showResult(`✗ ${data.message}`, 'danger');
                        }
                    })
                    .catch(err => {
                        showResult('Server error, try again.', 'warning');
                        console.error(err);
                        
                    });
            });

            function showResult(msg, type) {
                const box = document.getElementById('verifyResult');
                box.className = `alert alert-${type} mb-0`;
                box.innerHTML = msg;
                box.style.display = 'block';
            }
        });
    </script>


</body>

</html>