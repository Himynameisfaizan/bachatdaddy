<?php
session_start();

if(!isset($_SESSION['CAN_ACCESS_THANKU_PAGE'])){
    header('Location: index.php');
    exit();
}
include 'functions/authentication.php';
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';

$dbclass = new dbClass();
$common  = new Common();
$user    = new User();


/* 1) Logged-in user details */
$userdetail = $user->getUsersDetails($_SESSION['USERS_USER_ID'] ?? null);

if (empty($userdetail) || empty($userdetail['email'])) {
    header('Location: login.php');
    exit;
}

$userEmail = $userdetail['email'];
$userName = $userdetail['name'];

/* 2) DB helper object */
$db = new dbClass();

/* 3) 12 digit random number (string) */
function generateCardNumber(): string
{
    // 0–999999999999 -> pad to 12 digits (leading zeros allowed)
    return str_pad((string)mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT);
}

/* 4) Check if this number already exists */
function cardNumberExists(dbClass $db, string $num): bool
{
    $sql    = "SELECT COUNT(*) AS cnt FROM cardnumber WHERE uniqueNum = :num";
    $params = [':num' => $num];
    $row    = $db->getDataWithParams($sql, $params);
    return !empty($row['cnt']) && $row['cnt'] > 0;
}

/* 5) Check if this email already has a card */
function emailHasCard(dbClass $db, string $email): bool
{
    $sql    = "SELECT COUNT(*) AS cnt FROM cardnumber WHERE userEmail = :email";
    $params = [':email' => $email];
    $row    = $db->getDataWithParams($sql, $params);
    return !empty($row['cnt']) && $row['cnt'] > 0;
}

/* 6) Main logic – run once */
if (!isset($_SESSION['uniqueNum'])) {

    // If email already has a card, redirect
    if (emailHasCard($db, $userEmail)) {
        $_SESSION['msg'] = "You have already applied for a card.";
        header("Location: my-profile.php");
        exit;
    }

    // Generate unique 12 digit number
    do {
        $uniqueNum = generateCardNumber();
    } while (cardNumberExists($db, $uniqueNum));

    // Insert into DB
    $sql    = "INSERT INTO cardnumber (userEmail, uniqueNum, userName)
               VALUES (:email, :uniqueNum, :userName)";
    $params = [
        ':email'     => $userEmail,
        ':uniqueNum' => $uniqueNum,
        ':userName' => $userName
    ];

    $ok = $db->executeStatement($sql, $params);

    if ($ok) {
        // Save so refresh doesn't insert again
        $_SESSION['uniqueNum'] = $uniqueNum;
    } else {
        // Optional: simple debug
        // file_put_contents(__DIR__.'/card_debug.log', date('H:i:s')." INSERT FAILED\n", FILE_APPEND);
        die('Database error. Please try again later.');
    }

} else {
    // Already created in this session
    $uniqueNum = $_SESSION['uniqueNum'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bachatdaddy</title>
    <meta name="description" content="BACHATDADDY">

    <link rel="stylesheet" href="css/thanku.css">
    <link rel="icon" type="image/png" sizes="50x50" href="images/resources/Asset 3.png">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2-1?family=Inter+Tight:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/bachat-daddy.css">
    <link rel="stylesheet" href="css/virtual-card-vendors.css">
    <link rel="stylesheet" href="css/bachat-daddy-responsive.css">
</head>

<body>
    <section class="thanku-main-container">
        <div class="thanku-content">
            <h3>🎉Thank You to Connect with Bachatdaddy</h3>
            <p>You will get your card within few days</p>
            <i class="ri-checkbox-circle-fill"></i>
            <div class="personal-detail">
                <a href="my-profile.php">
                    <button class="">Go to Dashboard <i class="ri-arrow-right-line"></i></button>
                </a>
            </div>
        </div>
    </section>
</body>
</html>
