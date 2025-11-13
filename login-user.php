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

$response = array('status' => 'error');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = isset($_POST['userId']) ? trim($_POST['userId']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $userType = isset($_POST['options']) ? trim($_POST['options']) : '';

    if (empty($userId) || empty($password)) {
        $response = array('status' => 'error', 'message' => 'Both fields are required.');
    } else {
        if ($userType == 'user') {
            $result = $auth->userLogin($userId, $password);
            if ($result === true) {
                $result = $conn->getData("SELECT * FROM `users` WHERE `email` = '$userId' AND `password` = '$password' ");

                $adhar = $result['adhar'];
                if ($adhar != null) {
                    $response = array('status' => 'success', 'message' => 'Login successful', 'redirect' => 'index.php');
                } else {
                    $response = array('status' => 'success', 'message' => 'Login successful', 'redirect' => 'complete-profile.php');
                }
            } else {
                $response = array('status' => 'error', 'message' => 'Invalid credentials. Please try again.');
            }
        } else {
            $result = $auth->vendorLogin($userId, $password);
            if ($result === true) {
                // $response = array('status' => 'success', 'message' => 'Login successful', 'redirect' => 'users-list.php');
                $response = array('status' => 'success', 'message' => 'Login successful', 'redirect' => 'vendorshome.php');

            } else {
                $response = array('status' => 'error', 'message' => 'Invalid credentials. Please try again.');
            }
        }
    }

    echo json_encode($response);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header('Location: user-dashboard/index.php');
    exit;
}
