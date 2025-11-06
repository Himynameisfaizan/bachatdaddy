<?php
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
header('Content-Type: application/json');

$conn = new dbClass();
$common = new Common();
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = isset($_POST['city']) ? trim($_POST['city']) : '';
    $sid = isset($_POST['subcategory']) ? trim($_POST['subcategory']) : '';

    // Correct comparison operator (==), not assignment (=)
    if (isset($_POST['subcategory']) && isset($_POST['city'])) {
        $response['status'] = 'success';
        $response['message'] = 'Your message has been sent successfully! City ID: ' . $cid;
        $response['redirect'] = 'vemdorbycity.php?id=' . base64_encode($sid) . "&cid=" . base64_encode($cid);
    } else {
        $response['status'] = 'error';
        $response['message'] = 'There was an issue processing your message.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
exit;
?>
