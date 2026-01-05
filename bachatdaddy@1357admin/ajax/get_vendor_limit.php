<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

ini_set('display_errors', 0);
error_reporting(0);

try {
    session_start();
    
    $root_path = dirname(__DIR__, 2);
    
    require $root_path . '/config/config.php';
    require $root_path . '/functions/authentication.php';
    require $root_path . '/functions/bachatdaddyfunction.php';
    
    $db = new dbClass();
    $vendor_id = isset($_GET['vendor_id']) ? (int)$_GET['vendor_id'] : 0;
    
    if ($vendor_id <= 0) {
        echo json_encode(['issued_count' => 0, 'total_coupons' => 0]);
        exit;
    }
    
    // Method 1: user_coupons se issued count
    $issued = $db->getData("SELECT COUNT(*) as cnt FROM user_coupons WHERE vendor_id = ?", [$vendor_id]);
    $issued_count = (int)($issued['cnt'] ?? 0);
    
    // Method 2: vendor table coupon_count
    $vendor = $db->getData("SELECT coupon_count FROM vendor WHERE id = ?", [$vendor_id]);
    $total_coupons = (int)($vendor['coupon_count'] ?? 0);
    
    echo json_encode([
        'issued_count' => $issued_count,
        'total_coupons' => $total_coupons
    ]);
    
} catch (Throwable $e) {
    echo json_encode([
        'issued_count' => 0,
        'total_coupons' => 0,
        'debug' => substr($e->getMessage(), 0, 50)
    ]);
}
?>
