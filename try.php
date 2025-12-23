<?php
// header('Content-Type: application/json');
// session_start();
// include 'config/config.php';
// include 'functions/bachatdaddyfunctions.php';
// include 'functions/authentication.php';

// $user = new User();
// $userdetail = $user->getUsersDetails($_SESSION['USERS_USER_ID']);

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/PHPMailer.php';
// require 'phpmailer/src/SMTP.php';
// require __DIR__ . '/vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// // Check if user email is set in the session (assumed login tracking)
// if (!isset($userdetail['email'])) {
//     echo json_encode(['status' => 'error', 'message' => 'Check your provided mail']);
//     exit;
// }

// $userEmail = $userdetail['email'];

// // Generate a 6-digit OTP
// $otp = rand(100000, 999999);
// $_SESSION['generated_otp'] = $otp;

// // Create PHPMailer instance and configure mail
// $mail = new PHPMailer(true);

// try {
//     $mail->SMTPDebug = SMTP::DEBUG_OFF; // Disable verbose debug output
//     $mail->isSMTP();
//     $mail->Host = $_ENV['SMTP_HOST'];
//     $mail->SMTPAuth = true;
//     $mail->Username = $_ENV['SMTP_USERNAME'];
//     $mail->Password = $_ENV['SMTP_PASSWORD'];
//     $mail->SMTPSecure = $_ENV['SMTP_SMTPSECURE'];
//     $mail->Port = $_ENV['SMTP_PORT'];


//     $mail->setFrom('01sanjana.doitcreation@gmail.com', 'BachatDaddy');
//     $mail->addAddress($userEmail); // Send to logged-in user's email
//     $mail->addReplyTo('01sanjana.doitcreation@gmail.com', 'BachatDaddy');

//     $mail->isHTML(true);
//     $mail->Subject = 'Your OTP Code for BachatDaddy Verification';

//     // Replace placeholder with actual OTP
//     $body = "Dear User,<br><br>Thank you for choosing BachatDaddy!<br><br>" .
//             "To complete your verification process, please use the following One Time Password (OTP):<br><br>" .
//             "<strong>{$otp}</strong><br><br>This OTP is valid for the next 60 seconds. Please do not share this code with anyone to keep your account secure.<br><br>" .
//             "If you did not request this code, please ignore this email or contact our support team immediately.<br><br>" .
//             "Best regards,<br>The BachatDaddy Team<br>support@bachatdaddy.com";

//     $mail->Body = $body;
//     $mail->AltBody = "Your OTP code is {$otp}. It is valid for 60 seconds. Please do not share this code.";

//     $mail->send();

//     // Return JSON response including OTP for frontend (optional, usually not)
//     echo json_encode(['status' => 'success', 'message' => 'OTP has been sent.', 'otp' => $otp]);
// } catch (Exception $e) {
//     echo json_encode(['status' => 'error', 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
// }
?>





<!-- vendor profile -->
                         <!-- <div class="col-12 text-center text-capitalize">
                            <h3>Welcome <?= $vendorsdata[0]['vendor_name'] ?></h3>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-5 ">
                                <div class="sticky-img vendor-first-column">
                                    <div class="team-details__left ">
                                        <div class="team-details__img">
                                            <img class="rounded-2" src="bachatdaddy@1357admin/adminuploads/images/vendors/<?php echo $vendorsdata[0]['image']; ?>" alt="">
                                        </div>
                                        <div class="vendor-info">
                                            <?php if ($pov != "" && $pov != null && $pov != '0'): ?>
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
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7 vendor-secound-column">
                                <div class="team-details__right">
                                    <?php if ($vendorsdata[0]['offer'] != "" && $vendorsdata[0]['offer'] != null && $vendorsdata[0]['offer'] != '0'): ?>
                                        <h3 class="team-details__title-1 mb-2" style="text-transform: capitalize;
                                 color: rgb(7, 7, 7);"><?= $vendorsdata[0]['offer'] ?></h3><?php endif; ?>
                                    <div class="main-slider__carousel owl-carousel owl-theme thm-owl__carousel"
                                        data-owl-options='{"loop": true, "items": 1, "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"], "margin": 0, "dots": true, "nav": false, "animateOut": "slideOutDown", "animateIn": "fadeIn", "active": true, "smartSpeed": 1000, "autoplay": true, "autoplayTimeout": 7000, "autoplayHoverPause": false}'>
                                        <?php foreach ($iov as $offer): ?>
                                            <div class="item main-slider__slide-1">
                                                <img src="bachatdaddy@1357admin/adminuploads/images/vendors/<?php echo $offer['image']; ?>" alt="">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="vendor-profile-details">
                                        <?php if ($fov != "" && $fov != null && $fov != '0'): ?>
                                            <p class=""><strong>Offers :</strong></p>
                                            <ul class="ul-padding">
                                                <li><?= $vendorsdata[0]['vendor_name'] ?></li>
                                            </ul><?php endif; ?>
                                    </div>

                                    <div class="vendor-profile-details">
                                        <?php if ($vendorsdata[0]['sdate'] != "" && $vendorsdata[0]['sdate'] != null && $vendorsdata[0]['sdate'] != '0'): ?>
                                            <p class=""><strong>Validity Period : </strong> <?php echo $vendorsdata[0]['sdate']; ?> to <?php echo $vendorsdata[0]['edate']; ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="vendor-profile-details">
                                        <p class=""><strong>Eligibility : </strong> Bachat Daddy Card Holder</p>
                                    </div>

                                    <div class="vendor-profile-details">
                                        <?php if ($sov != "" && $sov != null && $sov != '0'): ?>
                                            <p><strong>Special Terms and Conditions : </strong></p>
                                            <ul class="ul-padding">
                                                <?php foreach ($sov as $offer): ?>
                                                    <li>
                                                        <div class="icon "><?= $offer['condition'] ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>

                                    <div class="vendor-profile-details">
                                        <?php if ($gov != "" && $gov != null && $gov != '0'): ?>
                                            <p><strong>General Terms and Conditions : </strong></p>
                                            <ul class="ul-padding">
                                                <?php foreach ($gov as $offer): ?>
                                                    <li>
                                                        <div class="icon "></i><?= $offer['condition'] ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div> -->
<!-- vendor profile -->