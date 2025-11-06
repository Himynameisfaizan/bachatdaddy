<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
include 'functions/authentication.php';

header('Content-Type: application/json');

$conn = new dbClass();
$user = new User();
$auth = new Authentication();

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($name) || empty($phone) || empty($email) || empty($password)) {
        $response['status'] = 'error';
        $response['message'] = 'Please fill in all fields.';
    } else {
        $result = $user->addUsers($name, $phone, $email, $password);

        if ($result === true) {
            $result = $auth->userLogin($email,$password);
            // sleep(2);
            $response['status'] = 'success';
            $response['message'] = 'Form submitted successfully!'. $result;
            $response['redirect'] = 'complete-profile.php';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Problem in SQL execution.';
        }
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
exit;
?>
