<?php
header('Content-Type: application/json');

include '../config/config.php';
include '../functions/bachatdaddyfunctions.php'; 

$db = new dbClass();

try {
    $stmt = $db->getAllData("SELECT id, name FROM vendor ORDER BY name");
    echo json_encode($stmt ?: []); 
} catch (Exception $e) {
    error_log("Vendors error: " . $e->getMessage());
    echo json_encode(['error' => 'Vendors load failed']);
}
?>
