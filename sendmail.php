<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PhpMailer.php';
require 'phpmailer/src/SMTP.php';
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                        //Send using SMTP
    $mail->Host       = $_ENV['SMTP_HOST'];                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $_ENV['SMTP_USERNAME'];                     //SMTP username
    $mail->Password   = $_ENV['SMTP_PASSWORD'];                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // for live website       //Enable implicit TLS encryption
    $mail->SMTPSecure = $_ENV['SMTP_SMTPSECURE'];         // for localhost website  //Enable implicit TLS encryption
    // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->Port       =  $_ENV['SMTP_PORT'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('01sanjana.doitcreation@gmail.com', 'Bachatdaddy');
    $mail->addAddress('happysinghnegi975@gmail.com', 'Happy singh negi');     //Add a recipient
    $mail->addReplyTo('01sanjana.doitcreation@gmail.com', 'Bachatdaddy');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your OTP Code for BachatDaddy Verification';
    $mail->Body = "Dear User,
    <br><br>Thank you for choosing BachatDaddy!<br><br> To complete your verification process, 
    please use the following One Time Password 
    (OTP):<br><br><strong>{{OTP_CODE}}</strong><br><br>
    This OTP is valid for the next 60 seconds. 
    Please do not share this code with anyone to keep your account secure.
    <br><br>If you did not request this code, please ignore this email or contact 
    our support team immediately.<br><br>Best regards,
    <br>The BachatDaddy Team<br>support@bachatdaddy.com";

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'OTP has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>