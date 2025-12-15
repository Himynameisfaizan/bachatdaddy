<?php
session_start();
header('Content-Type: application/json');

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
if ($email === '') {
    echo json_encode(['status' => 'error', 'message' => 'Email required']);
    exit;
}

$otp = sprintf("%06d", mt_rand(1, 999999));
$_SESSION['generated_otp'] = $otp;
$_SESSION['otp_generated_time'] = time(); 

$queueItem = [
    'email' => $email,
    'otp'   => $otp,
    'time'  => time()
];

file_put_contents(__DIR__.'/queue_debug.log', date('H:i:s') . " QUEUED: " . json_encode($queueItem) . "\n", FILE_APPEND);

file_put_contents(__DIR__.'/email_queue.json', json_encode($queueItem)."\n", FILE_APPEND | LOCK_EX);

echo json_encode(['status' => 'success']);
?>
