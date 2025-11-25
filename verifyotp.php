<?php
session_start();
header('Content-Type: application/json');

$enteredOtp = isset($_POST['otp']) ? trim($_POST['otp']) : '';

if (empty($enteredOtp)) {
    echo json_encode(['status' => 'error', 'message' => 'OTP is required']);
    exit;
}

if (!isset($_SESSION['generated_otp'])) {
    echo json_encode(['status' => 'error', 'message' => 'OTP expired or not generated']);
    exit;
}

if ((string) trim($enteredOtp) === (string) trim($_SESSION['generated_otp'])){
    // Optionally unset OTP from session after successful verification
    unset($_SESSION['generated_otp']);
    echo json_encode(['status' => 'success', 'message' => 'OTP verified successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Incorrect OTP. Please try again']);
}
exit;
