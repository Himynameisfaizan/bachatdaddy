<?php
// TOP: Move ALL requires here (remove duplicates)
require __DIR__ . '/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load ONCE (outside loop)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
include 'functions/authentication.php';

// LOGGING (CRITICAL for cron debugging)
file_put_contents('queue_worker.log', date('H:i:s') . " WORKER START\n", FILE_APPEND);

$queueFile = 'email_queue.json';
if (!file_exists($queueFile)) {
    file_put_contents('queue_worker.log', date('H:i:s') . " No queue file\n", FILE_APPEND);
    exit;
}

$queueContent = file_get_contents($queueFile);
$lines = explode("\n", trim($queueContent));
$remaining = [];
$processed = 0;
$maxEmails = 3;

foreach ($lines as $line) {
    if (empty(trim($line))) continue;
    
    $emailData = json_decode($line, true);
    if (!$emailData || $processed >= $maxEmails) {
        $remaining[] = $line;
        continue;
    }

    $userEmail = $emailData['email'];
    $otp = $emailData['otp'];

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USERNAME']; 
        $mail->Password = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = $_ENV['SMTP_SMTPSECURE'];
        $mail->Port = $_ENV['SMTP_PORT'];

        $mail->setFrom($_ENV['SMTP_USERNAME'], 'BachatDaddy');
        $mail->addAddress($userEmail);
        $mail->addReplyTo($_ENV['SMTP_USERNAME'], 'BachatDaddy');

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code for BachatDaddy Verification';
        
        $body = "Dear User,<br><br>Thank you for choosing BachatDaddy!<br><br>" .
                "To complete your verification process, please use the following One Time Password (OTP):<br><br>" .
                "<strong>{$otp}</strong><br><br>This OTP is valid for the next 60 seconds. Please do not share this code with anyone to keep your account secure.<br><br>" .
                "If you did not request this code, please ignore this email or contact our support team immediately.<br><br>" .
                "Best regards,<br>The BachatDaddy Team<br>support@bachatdaddy.com";

        $mail->Body = $body;
        $mail->AltBody = "Your OTP code is {$otp}. It is valid for 60 seconds.";

        $mail->send();
        $processed++;
        file_put_contents('queue_worker.log', date('H:i:s') . " SENT to {$userEmail}\n", FILE_APPEND);
        
    } catch (Exception $e) {
        $remaining[] = $line;
        file_put_contents('queue_worker.log', date('H:i:s') . " FAILED {$userEmail}: {$mail->ErrorInfo}\n", FILE_APPEND);
    }
}

file_put_contents($queueFile, implode("\n", $remaining));
file_put_contents('queue_worker.log', date('H:i:s') . " PROCESSED {$processed}/" . count($lines) . "\n", FILE_APPEND);
?>
