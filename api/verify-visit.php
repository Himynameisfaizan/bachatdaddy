<?php
header('Content-Type: application/json');
include '../config/config.php';

$db = new dbClass();

$input = json_decode(file_get_contents('php://input'), true);
$card_number = trim($input['card_number'] ?? '');
$email = trim($input['email'] ?? '');
$vendor_id = (int)($input['vendor_id'] ?? 0);

if (!$card_number || !$email || !$vendor_id) {
    echo json_encode(['success' => false, 'message' => 'Missing fields']);
    exit;
}

try {
    // 1. CARDNUMBER verify
    $card = $db->getDataWithParams(
        "SELECT id FROM cardnumber WHERE uniqueNum = :card AND userEmail = :email",
        [':card' => $card_number, ':email' => $email]
    );
    
    if (!$card) {
        echo json_encode(['success' => false, 'message' => 'Card or email not found']);
        exit;
    }
    $cardnumber_id = $card['id'];
    
    // 2. VENDOR latest coupon_count fetch
    $vendor = $db->getDataWithParams(
        "SELECT coupon_count FROM vendor WHERE id = :vid",
        [':vid' => $vendor_id]
    );
    
    if (!$vendor || !$vendor['coupon_count']) {
        echo json_encode(['success' => false, 'message' => 'Vendor not found or no coupons']);
        exit;
    }
    $max_limit = $vendor['coupon_count'];
    
    // 3. USER_COUPONS check
    $existing = $db->getDataWithParams(
        "SELECT visit_count FROM user_coupons WHERE cardnumber_id = :cid AND vendor_id = :vid",
        [':cid' => $cardnumber_id, ':vid' => $vendor_id]
    );
    
    if ($existing) {
        // EXISTING: INCREMENT + UPDATE max_limit
        $new_count = $existing['visit_count'] + 1;
        
        if ($new_count > $max_limit) {
            echo json_encode(['success' => false, 'message' => 'Max visits limit reached']);
            exit;
        }
        
        // ✅ UPDATE both visit_count AND max_limit
        $db->executeStatement(
            "UPDATE user_coupons 
             SET visit_count = :count, max_limit = :max 
             WHERE cardnumber_id = :cid AND vendor_id = :vid",
            [':count' => $new_count, ':max' => $max_limit, ':cid' => $cardnumber_id, ':vid' => $vendor_id]
        );
        
        $response_count = $new_count;
        
    } else {
        // NEW: INSERT with latest max_limit
        $db->executeStatement(
            "INSERT INTO user_coupons (cardnumber_id, vendor_id, visit_count, max_limit) 
             VALUES (:cid, :vid, 1, :max)",
            [':cid' => $cardnumber_id, ':vid' => $vendor_id, ':max' => $max_limit]
        );
        
        $response_count = 1;
    }
    
    // Success
    echo json_encode([
        'success' => true,
        'visit_count' => $response_count,
        'max_limit' => $max_limit,
        'message' => "Visit recorded! ($response_count/$max_limit)"
    ]);
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>
