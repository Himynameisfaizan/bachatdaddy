<?php
include 'config/config.php';
header('Content-Type: application/json');

$vendor_id = isset($_GET['vendor_id']) ? (int)$_GET['vendor_id'] : 0;
$offer_id  = isset($_GET['offer_id']) ? (int)$_GET['offer_id'] : 0;

if ($vendor_id <= 0 || $offer_id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid IDs']);
    exit;
}

$db = new dbClass();

try {
    // mobile
    $mobileRow = $db->getAllData("SELECT mobile FROM vendermobile WHERE vendor_id = $vendor_id AND offer_id = $offer_id LIMIT 1");
    $mobile = !empty($mobileRow) ? $mobileRow[0]['mobile'] : '';

    // email
    $emailRow = $db->getAllData("SELECT email FROM venderemail WHERE vendor_id = $vendor_id AND offer_id = $offer_id LIMIT 1");
    $email = !empty($emailRow) ? $emailRow[0]['email'] : '';

    // vendor condition
    $vCondRow = $db->getAllData("SELECT `condition` FROM venderscondition WHERE vendor_id = $vendor_id AND offer_id = $offer_id LIMIT 1");
    $vendor_condition = !empty($vCondRow) ? $vCondRow[0]['condition'] : '';

    // general condition
    $gCondRow = $db->getAllData("SELECT `condition` FROM vendergcondition WHERE vendor_id = $vendor_id AND offer_id = $offer_id LIMIT 1");
    $general_condition = !empty($gCondRow) ? $gCondRow[0]['condition'] : '';

    // image
    $imgRow = $db->getAllData("SELECT image FROM vendor_image WHERE vendor_id = $vendor_id AND offer_id = $offer_id LIMIT 1");
    $image = !empty($imgRow) ? $imgRow[0]['image'] : '';
    $image_url = $image ? '../uploads/vendor/' . $image : '';

    echo json_encode([
        'success' => true,
        'data' => [
            'mobile'            => $mobile,
            'email'             => $email,
            'vendor_condition'  => $vendor_condition,
            'general_condition' => $general_condition,
            'image_url'         => $image_url
        ]
    ]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'DB error']);
}
