<?php
session_start();
header('Content-Type: application/json');

$enteredOtp = isset($_POST['otp']) ? trim($_POST['otp']) : '';

if (empty($enteredOtp)) {
    echo json_encode(['status' => 'error', 'message' => 'OTP is required']);
    exit;
}

if (!isset($_SESSION['generated_otp']) || !isset($_SESSION['otp_generated_time'])) {
    echo json_encode(['status' => 'error', 'message' => 'OTP expired or not generated']);
    exit;
}

// ✅ NEW: Check 90-second expiry
$otp_expiry = 90; // 60 seconds
if ((time() - $_SESSION['otp_generated_time']) > $otp_expiry) {
    unset($_SESSION['generated_otp'], $_SESSION['otp_generated_time']); // ✅ Clear expired OTP
    echo json_encode(['status' => 'error', 'message' => 'OTP expired. Please request new OTP.']);
    exit;
}


if ((string) trim($enteredOtp) === (string) trim($_SESSION['generated_otp'])){
    $_SESSION['CAN_ACCESS_THANKU_PAGE'] = true;
    unset($_SESSION['generated_otp'], $_SESSION['otp_generated_time']);
    echo json_encode(['status' => 'success', 'message' => 'OTP verified successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Incorrect OTP. Please try again']);
}
exit;
?>
