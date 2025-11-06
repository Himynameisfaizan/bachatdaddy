<?php
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';

header('Content-Type: application/json');

$conn = new dbClass();
$common = new Common();

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $phone = isset($_POST['Phone']) ? trim($_POST['Phone']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    $result = $common->addContactMessage($name, $phone, $email, $message);

    if ($result === true) {
        $response['status'] = 'success';
        $response['message'] = 'Your message has been sent successfully!';
        $response['redirect'] = 'index.php';
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
