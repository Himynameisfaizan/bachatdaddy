<?php
header('Content-Type: application/json');
session_start();
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
include 'functions/authentication.php';

$user = new User();
$userdetail = $user->getUsersDetails($_SESSION['USERS_USER_ID']);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Check if user email is set in the session (assumed login tracking)
if (!isset($userdetail['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'Check your provided mail']);
    exit;
}

$userEmail = $userdetail['email'];

// Generate a 6-digit OTP
$otp = rand(100000, 999999);
$_SESSION['generated_otp'] = $otp;

// Create PHPMailer instance and configure mail
$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Disable verbose debug output
    $mail->isSMTP();
    $mail->Host = $_ENV['SMTP_HOST'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['SMTP_USERNAME'];
    $mail->Password = $_ENV['SMTP_PASSWORD'];
    $mail->SMTPSecure = $_ENV['SMTP_SMTPSECURE'];
    $mail->Port = $_ENV['SMTP_PORT'];


    $mail->setFrom('01sanjana.doitcreation@gmail.com', 'BachatDaddy');
    $mail->addAddress($userEmail); // Send to logged-in user's email
    $mail->addReplyTo('01sanjana.doitcreation@gmail.com', 'BachatDaddy');

    $mail->isHTML(true);
    $mail->Subject = 'Your OTP Code for BachatDaddy Verification';

    // Replace placeholder with actual OTP
    $body = "Dear User,<br><br>Thank you for choosing BachatDaddy!<br><br>" .
            "To complete your verification process, please use the following One Time Password (OTP):<br><br>" .
            "<strong>{$otp}</strong><br><br>This OTP is valid for the next 60 seconds. Please do not share this code with anyone to keep your account secure.<br><br>" .
            "If you did not request this code, please ignore this email or contact our support team immediately.<br><br>" .
            "Best regards,<br>The BachatDaddy Team<br>support@bachatdaddy.com";

    $mail->Body = $body;
    $mail->AltBody = "Your OTP code is {$otp}. It is valid for 60 seconds. Please do not share this code.";

    $mail->send();

    // Return JSON response including OTP for frontend (optional, usually not)
    echo json_encode(['status' => 'success', 'message' => 'OTP has been sent.', 'otp' => $otp]);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
}
?>
