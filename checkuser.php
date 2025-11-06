<?php
// Include configuration and functions
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';

// Ensure that the response is in JSON format
header('Content-Type: application/json');

// Initialize database connection and User object
$conn = new dbClass(); // Initialize database connection
$user = new User();    // Initialize User object

$response = []; // Initialize the response array

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check for 'phone' validation
    if (isset($_POST['check']) && $_POST['check'] == 'phone') {
        $phone = $_POST['phone'];

        // Check if phone number already exists
        $result = $user->checkMobile($phone);

        if ($result != 0) {
            // If phone exists, send error response
            $response['status'] = 'error';
            $response['message'] = 'Mobile number is already used by another user';
        } else {
            // If phone is not taken, send success response
            $response['status'] = 'success';
            $response['message'] = 'Phone number is available';
        }
    }

    // Check for 'email' validation
    if (isset($_POST['check']) && $_POST['check'] == 'email') {
        $email = $_POST['email'];

        // Check if email already exists
        $result1 = $user->checkEmail($email);

        if ($result1 != 0) {
            // If email exists, send error response
            $response['status'] = 'error';
            $response['message'] = 'Email is already used by another user';
        } else {
            // If email is not taken, send success response
            $response['status'] = 'success';
            $response['message'] = 'Email is available';
        }
    }
}

// Return the response as JSON
echo json_encode($response);
?>
