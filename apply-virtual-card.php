<?php
session_start();

if (!isset($_SESSION['CAN_ACCESS_APPLY_CARD'])) {
    header('Location: virtual-card.php');
    exit();
}

// Clear the flag so direct revisits are blocked
unset($_SESSION['CAN_ACCESS_APPLY_CARD']);

include 'functions/authentication.php';
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';

$dbclass = new dbClass();
$common = new Common();
$user = new User();

$userdetail = $user->getUsersDetails($_SESSION['USERS_USER_ID']);
$industry = $common->getAllIdustry();

function isFieldEmpty($value)
{
    return empty($value) || $value === null || $value === '';
}

// Check each field individually
$disableFields = [
    'name' => !isFieldEmpty($userdetail['name']),
    'email' => !isFieldEmpty($userdetail['email']),
    'phone' => !isFieldEmpty($userdetail['phone']),
    'birthday' => !isFieldEmpty($userdetail['birthday'] ?? ''),
    'adhar' => !isFieldEmpty($userdetail['adhar'] ?? ''),
    'address' => !isFieldEmpty($userdetail['address'] ?? ''),
    'pincode' => !isFieldEmpty($userdetail['pincode'] ?? ''),
    'state' => !isFieldEmpty($userdetail['state'] ?? ''),
    'city' => !isFieldEmpty($userdetail['city'] ?? ''),
    'representative_name' => !isFieldEmpty($userdetail['representative_name'] ?? ''),
    'image' => !isFieldEmpty($userdetail['image'] ?? ''),
    'anniversary' => !isFieldEmpty($userdetail['anniversary'] ?? '')
];
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.rawgit.com/jzaefferer/jquery-validation/1.19.5/dist/jquery.validate.min.js"></script>
    <script src="js/bachat-daddy.js"></script>

</head>

<body>
    <?php include('include/header.php') ?>

    <section class="main-detail-container">
        <h2>One More Step to Get Your<br><span style="color: #ee8d21;"> Discount Card</span></h2>
        <div class="complete-detail-container">
            <div class="basic-detail-container" id="basicDetail">
                <a href="#basicDetail">
                    <div class="">
                        <span><i class="ri-list-indefinite"></i></span>
                        <span>Basic Detail</span>
                    </div>
                </a>
                <a href="#otherDetail">
                    <div class="">
                        <span><i class="ri-organization-chart"></i></span>
                        <span>Complete Detail</span>
                    </div>
                </a>
            </div>
            <div class="other-detail-container" id="otherDetail">
                <!-- New form -->
                <form action="" id="profileForm" method="post" onsubmit="return submitForm(event, 'profileForm');">
                    <div class="">
                        <div class="user-field">
                            <label for="fullName">Full Name<span>*</span></label>
                            <div class="inputIcon" tabindex="0">
                                <i class="ri-user-3-line"></i>
                                <input type="text" name="name" value="<?= $userdetail['name']; ?>" id="name"
                                    <?= $disableFields['name'] ? 'readonly' : ''; ?> required>
                            </div>
                        </div>

                        <div class="user-field">
                            <label for="emailId">Email-id<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-mail-line"></i>
                                <input type="email" value="<?= $userdetail['email']; ?>" name="email" id="email"
                                    <?= $disableFields['email'] ? 'readonly' : ''; ?> required>
                            </div>
                        </div>

                        <div class="user-field">
                            <label for="contactNo">Contact no.<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-phone-line"></i>
                                <input type="number" value="<?= $userdetail['phone']; ?>" name="phone" id="phone"
                                    <?= $disableFields['phone'] ? 'readonly' : ''; ?> required>
                            </div>
                        </div>

                        <div class="user-field">
                            <label for="contactNo">DOB<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-cake-2-line"></i>
                                <input type="date" value="<?= $userdetail['birthday'] ?? ''; ?>" name="birthday" id="birthday"
                                    <?= $disableFields['birthday'] ? 'readonly' : ''; ?> required>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="user-field">
                            <label for="adhar">Aadhar no.</label>
                            <div class="inputIcon">
                                <i class="ri-id-card-line"></i>
                                <input type="text" value="<?= $userdetail['adhar'] ?? ''; ?>" name="adhar_no" id="adhar_no"
                                    <?= $disableFields['adhar'] ? 'readonly' : ''; ?> placeholder="">
                            </div>
                        </div>

                        <div class="user-field">
                            <label for="address">Current Address<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-map-pin-user-line"></i>
                                <textarea name="address" id="address"
                                    <?= $disableFields['address'] ? 'readonly' : ''; ?> required placeholder=""><?= $userdetail['address'] ?? ''; ?></textarea>
                            </div>
                        </div>

                        <div class="user-field">
                            <label for="pincode">Pincode<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-map-pin-3-line"></i>
                                <input type="number" value="<?= $userdetail['pincode'] ?? ''; ?>" name="pincode" id="pincode"
                                    <?= $disableFields['pincode'] ? 'readonly' : ''; ?> required placeholder="">
                            </div>
                        </div>

                        <div class="user-field">
                            <label for="state">State<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-signal-tower-line"></i>
                                <select name="state" id="state"
                                    <?= $disableFields['state'] ? 'disabled' : ''; ?>>
                                    <option value="<?php echo $userdetail['state'] ?? ''; ?>" selected>
                                        <?php echo $userdetail['state'] ?? 'Select State'; ?>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="user-field">
                            <label for="state">City<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-building-line"></i>
                                <input type="text" value="<?= $userdetail['city'] ?? ''; ?>" name="city" id="city"
                                    <?= $disableFields['city'] ? 'readonly' : ''; ?> required placeholder="">
                            </div>
                        </div>

                        <div class="user-field">
                            <label for="representative">Representative Name<span>*</span></label>
                            <div class="inputIcon">
                                <i class="ri-shield-user-line"></i>
                                <input type="text" name="representative_name" value="<?= $userdetail['representative_name'] ?? ''; ?>"
                                    id="representative_name" <?= $disableFields['representative_name'] ? 'readonly' : ''; ?> required placeholder="">
                            </div>
                        </div>

                        <div class="user-field">
                            <label for="image">Upload Image</label>
                            <div class="inputIcon">
                                <i class="ri-image-ai-line"></i>
                                <input type="file" name="image" id="image" accept="image/*"
                                    <?= $disableFields['image'] ? 'disabled' : ''; ?>>
                                <input type="hidden" id="existingImage" value="1764066739-c5d97785-a75f-4a18-8b29-917aff3700d2.png">
                            </div>
                        </div>

                        <div class="user-field">
                            <label for="contactNo">Anniversary</label>
                            <div class="inputIcon">
                                <i class="ri-diamond-ring-line"></i>
                                <input type="date" value="<?= $userdetail['anniversary'] ?? ''; ?>" name="anniversary"
                                    id="anniversary" <?= $disableFields['anniversary'] ? 'readonly' : ''; ?>>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" value="<?= $userdetail['id']; ?>" name="id" id="user_id">
                    <button name="submit" type="submit" id="submitButton">Get OTP</button>
                </form>
                <!-- New form -->
            </div>
        </div>
    </section>

    <!-- OTP Verficiation form -->
    <section class="otp-main-container" id="otp_parent">
        <div class="otp-form">
            <form action="" id="otpForm">
                <p>One-Time Password. Valid for 60 secounds</p>
                <div class="otp-field">
                    <input type="number" maxlength="1" name="" id="" class="digit">
                    <input type="number" maxlength="1" name="" id="" class="digit">
                    <input type="number" maxlength="1" name="" id="" class="digit">
                    <input type="number" maxlength="1" name="" id="" class="digit">
                    <input type="number" maxlength="1" name="" id="" class="digit">
                    <input type="number" maxlength="1" name="" id="" class="digit">
                </div>
                <div class="otpmsg">Please enter the one-time password sent to your mail</div>
                <button>
                    Submit
                </button>
            </form>
        </div>
    </section>
    <!-- OTP Verficiation form -->

    <?php require('include/footer.php'); ?>
    <?php require('include/mobilefooter.php') ?>
    <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="vendors/jquery-ui/jquery-ui.js"></script>

    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/swiper/swiper.min.js"></script>
    <script src="vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="vendors/wow/wow.js"></script>
    <script src="vendors/jarallax/jarallax.min.js"></script>

    <script src="vendors/odometer/odometer.min.js"></script>
    <script src="vendors/wnumb/wNumb.min.js"></script>
    <script src="vendors/circleType/jquery.lettering.min.js"></script>
    <script src="vendors/circleType/jquery.circleType.js"></script>
    <script src="vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>

    <script src="vendors/isotope/isotope.js"></script>
    <script src="vendors/timepicker/timePicker.js"></script>
    <script src="js/state.js"></script>
    <script src="js/apply-virtual-card.js"></script>

    <script>
        // Function to validate the form
        function validateForm(formName) {
            var form = $('#' + formName);

            // Initialize jQuery Validation

            form.validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        // phoneUS: true 
                    },
                    birthday: {
                        required: true,
                        date: true
                    },
                    adhar_no: {
                        required: false,
                        digits: true,
                        minlength: 12,
                        maxlength: 12
                    },
                    state: {
                        required: true,
                        notEmptyOrWhitespace: true
                    },
                    city: {
                        required: true,
                        minlength: 2
                    },
                    pincode: {
                        required: true,
                        digits: true,
                        minlength: 6,
                        maxlength: 6
                    },
                    address: {
                        required: true,
                        minlength: 10
                    },
                    representative_name: {
                        required: true,
                        minlength: 3
                    },
                },
                messages: {
                    name: {
                        required: "Please enter your full name",
                        minlength: "Your name must be at least 3 characters long"
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    phone: {
                        required: "Please enter your phone number",
                        phoneUS: "Please enter a valid phone number" // Modify for international format if needed
                    },
                    birthday: {
                        required: "Please select your birthday",
                        date: "Please enter a valid date"
                    },
                    adhar_no: {
                        required: "Please enter your Aadhar Number",
                        digits: "Please enter a valid Aadhar Number",
                        minlength: "Aadhar Number must be 12 digits long",
                        maxlength: "Aadhar Number must be 12 digits long"
                    },
                    state: {
                        required: "Please enter your state",
                        notEmptyOrWhitespace: "Please Select a State"
                    },
                    city: {
                        required: "Please enter your city",
                        minlength: "City must be at least 2 characters long"
                    },
                    pincode: {
                        required: "Please enter your pincode",
                        digits: "Please enter a valid pincode",
                        minlength: "Pincode must be 6 digits long",
                        maxlength: "Pincode must be 6 digits long"
                    },
                    address: {
                        required: "Please enter your address",
                        minlength: "Address must be at least 10 characters long"
                    },
                    representative_name: {
                        required: "Please enter the representative's name",
                        minlength: "Representative's name must be at least 3 characters long"
                    }
                },
                submitHandler: function() {
                    return true; // Validation passed, return true to submit the form
                }
            });

            $.validator.addMethod("notEmptyOrWhitespace", function(value, element) {
                return value.trim().length > 0; // Returns true if the trimmed value has a length greater than 0
            });

            // Check if form is valid before submitting
            return form.valid(); // Return true if form is valid
        }

        function submitForm(event, formName) {
            event.preventDefault(); // Prevent default form submission

            var form = document.getElementById(formName);
            var submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true; // Disable the submit button to prevent multiple submissions
            submitButton.innerHTML = 'Submitting...';

            if (validateForm(formName)) {

                if (!$('#existingImage').val().trim() && $('#image').get(0).files.length === 0) {
                    alert('Please upload an image.');
                    submitButton.disabled = false;
                    submitButton.innerHTML = 'Submit';
                    return false;
                }

                var formData = new FormData(form);

                $.ajax({
                    url: 'user-com-profile.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            form.reset(); // Reset form if successful

                            // Show OTP popup instead of redirect
                            document.getElementById('otp_parent').style.visibility = 'visible';
                            document.body.style.overflowY = "hidden";
                            window.scroll({
                                top: 0,
                                behavior: 'smooth',
                            })

                            // Optional: Disable form submission button after successful submit to avoid duplicates
                            submitButton.disabled = true;
                            submitButton.innerHTML = 'Sending OTP...';

                            // Trigger OTP sendmail backend call, assuming you have an endpoint sendmail.php
                            $.ajax({
                                url: 'sendmail.php',
                                type: 'POST',
                                data: {
                                    email: formData.get('email')
                                },
                                success: function(otpResponse) {
                                    if (otpResponse.status !== 'success') {
                                        alert('Failed to send OTP. Please try again.');
                                    } else {
                                        alert('OTP sent successfully!');
                                    }
                                    submitButton.disabled = false;
                                    submitButton.innerHTML = 'Submit';
                                },
                                error: function() {
                                    alert('Error sending OTP. Please try again.');
                                    submitButton.disabled = false;
                                    submitButton.innerHTML = 'Submit';
                                }
                            });
                        } else {
                            alert("Error: " + response.message); // Alert the error message
                        }
                        submitButton.disabled = false; // Re-enable the submit button
                        submitButton.innerHTML = 'Submit'; // Reset button text
                    },
                    error: function(xhr, status, error) {
                        alert("AJAX request failed: " + error);
                        submitButton.disabled = false; // Re-enable the submit button
                        submitButton.innerHTML = 'Submit'; // Reset button text
                    }
                });
            } else {
                submitButton.disabled = false; // Re-enable the submit button when form invalid
                submitButton.innerHTML = 'Submit'; // Reset button text
            }
            console.log('existingImage:', $('#existingImage').val());
            console.log('image input files length:', $('#image').get(0).files.length);
            console.log('Checking image requirement:', !$('#existingImage').val().trim() && $('#image').get(0).files.length === 0);

            return false;
        }

        // Verfiy otp 
        document.getElementById('otpForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Collect OTP digits from inputs with class 'digit'
            let otpDigits = document.querySelectorAll('.otp-field .digit');
            let otp = '';
            otpDigits.forEach(input => {
                otp += input.value.trim();
            });
            console.log(otp);

            if (otp.length !== 6) {
                alert('Please enter the complete 6-digit OTP');
                return;
            }

            // Now make AJAX call to verify this OTP string
            $.ajax({
                url: 'verifyotp.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    otp: otp
                },
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        document.getElementById('otp_parent').style.display = 'none'; // Hide popup
                        // Further actions on success
                        document.body.style.overflowY = "auto";
                        <?php 
                        $_SESSION["ACCESS_THANKU_PAGE"] = true;
                        ?>
                        window.location.href = 'Thanku.php';
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Error verifying OTP. Please try again.');
                }
            });

        });
        // Verfiy otp 
    </script>
</body>

</html>