<?php
include 'config/config.php';
header('Content-Type: application/json');

$vendor_id = isset($_POST['vendor_id']) ? (int)$_POST['vendor_id'] : 0;
$offer_id  = isset($_POST['offer_id']) ? (int)$_POST['offer_id'] : 0;

$mobile            = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
$email             = isset($_POST['email']) ? trim($_POST['email']) : '';
$vendor_condition  = isset($_POST['vendor_condition']) ? trim($_POST['vendor_condition']) : '';
$general_condition = isset($_POST['general_condition']) ? trim($_POST['general_condition']) : '';

if ($vendor_id <= 0 || $offer_id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid IDs']);
    exit;
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

$db = new dbClass();

$imageFile = isset($_FILES['image']) ? $_FILES['image'] : null;

$result = $db->updateOfferDetailsAllOrNothing(
    $vendor_id,
    $offer_id,
    $mobile,
    $email,
    $vendor_condition,
    $general_condition,
    $imageFile
);

echo json_encode($result);