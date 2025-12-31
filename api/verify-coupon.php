<?php
header('Content-Type: application/json');

$root = dirname(__DIR__);
include $root . '/config/config.php';
include $root . '/functions/bachatdaddyfunctions.php';
include $root . '/functions/authentication.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'valid'   => false,
        'message' => 'Invalid request method. POST required.'
    ]);
    exit;
}

$db = new dbClass();

$input = json_decode(file_get_contents('php://input'), true);

$cardNumber = trim($input['card_number'] ?? '');
$email      = trim($input['email'] ?? '');
$couponCode = strtoupper(trim($input['coupon_code'] ?? ''));

if ($cardNumber === '' || $email === '' || $couponCode === '') {
    http_response_code(400);
    echo json_encode([
        'valid'   => false,
        'message' => 'Card number, email and coupon code are required.'
    ]);
    exit;
}

try {
    // 1) Card verify: uniqueNum + userEmail
    $sqlCard = "
        SELECT id 
        FROM cardnumber 
        WHERE uniqueNum = :card_number AND userEmail = :email
        LIMIT 1
    ";
    
    $paramsCard = [
        ':card_number' => $cardNumber,
        ':email' => $email
    ];

    $cardResult = $db->getDataWithParams($sqlCard, $paramsCard);

    if (!$cardResult) {
        http_response_code(404);
        echo json_encode([
            'valid'   => false,
            'message' => 'Card number or email not found.'
        ]);
        exit;
    }

    $cardId = (int)$cardResult['id'];

    // 2) Coupon verify: code + cardnumber_id
    $sqlCoupon = "
        SELECT uc.id, uc.is_used, uc.code, uc.cardnumber_id
        FROM user_coupons uc
        WHERE uc.code = :coupon_code AND uc.cardnumber_id = :card_id
        LIMIT 1
    ";
    
    $paramsCoupon = [
        ':coupon_code' => $couponCode,
        ':card_id' => $cardId
    ];

    $couponResult = $db->getDataWithParams($sqlCoupon, $paramsCoupon);

    if (!$couponResult) {
        http_response_code(404);
        echo json_encode([
            'valid'   => false,
            'message' => 'Coupon not found for this card.'
        ]);
        exit;
    }

    if ((int)$couponResult['is_used'] === 1) {
        http_response_code(403);
        echo json_encode([
            'valid'   => false,
            'message' => 'Coupon already used.'
        ]);
        exit;
    }

    // 3) Mark coupon as used
    $sqlUpdate = "
        UPDATE user_coupons
        SET is_used = 1, used_at = NOW()
        WHERE id = :id AND is_used = 0
    ";
    
    $paramsUpdate = [
        ':id' => $couponResult['id']
    ];

    $updateSuccess = $db->executeStatement($sqlUpdate, $paramsUpdate);

    if (!$updateSuccess) {
        http_response_code(500);
        echo json_encode([
            'valid'   => false,
            'message' => 'Coupon could not be marked as used. Try again.'
        ]);
        exit;
    }

    // Success response
    http_response_code(200);
    echo json_encode([
        'valid'   => true,
        'message' => 'Coupon verified and marked as used successfully.',
        'code'    => $couponResult['code']
    ]);

} catch (Exception $e) {
    file_put_contents(
        dirname(__FILE__) . '/coupon_error_log.txt',
        date('Y-m-d H:i:s') . ' | ' . $e->getMessage() . ' | ' . $e->getFile() . ':' . $e->getLine() . PHP_EOL,
        FILE_APPEND
    );

    http_response_code(500);
    echo json_encode([
        'valid'   => false,
        'message' => 'Server error. Please try again.'
    ]);
}
?>
