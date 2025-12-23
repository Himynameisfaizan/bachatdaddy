<?php
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';

$response = ['success' => false, 'message' => ''];

if (isset($_POST['offer_id'])) {
    $offerId = (int)$_POST['offer_id'];
    
    $vendor = new Vendor();
    $conn = new dbClass();

    $sql = "DELETE FROM venderoffer WHERE id = :id";
    $params = [':id' => $offerId];
    
    $result = $conn->executeStatement($sql, $params);
    
    if ($result) {
        $response['success'] = true;
        $response['message'] = 'Offer deleted successfully';
    } else {
        $response['message'] = 'Failed to delete offer';
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
