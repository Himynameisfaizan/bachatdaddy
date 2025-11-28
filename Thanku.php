<?php

session_start();


include 'functions/authentication.php';
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';

$dbclass = new dbClass();
$common = new Common();
$user = new User();

$userdetail = $user->getUsersDetails($_SESSION['USERS_USER_ID']);

if (!isset($userdetail['email'])) {
    header('Location: login.php'); // redirect if user not logged in
    exit;
}

$userEmail = $userdetail['email'];

$db = new dbClass();

// Function to generate a 10-digit unique number
function generateCardNumber()
{
    return random_int(100000000000, 999999999999);
}

// Function to check if uniqueNum exists in DB using your dbClass getDataWithParams
function isUniqueNumExists($db, $num)
{
    $query = "SELECT COUNT(*) as count FROM cardnumber WHERE uniqueNum = :num";
    $params = [':num' => $num];
    $result = $db->getDataWithParams($query, $params);
    return $result['count'] > 0;
}

if (!isset($_SESSION['uniqueNum'])) {
    // Generate unique number and check in DB for uniqueness
    do {
        $uniqueNum = generateCardNumber(12);
    } while (isUniqueNumExists($db, $uniqueNum));

    // Insert uniqueNum and userEmail in DB using executeStatement with params
    $insertQuery = "INSERT INTO cardNumber (uniqueNum, userEmail) VALUES (:uniqueNum, :userEmail)";
    $insertParams = [':uniqueNum' => $uniqueNum, ':userEmail' => $userEmail];
    if ($db->executeStatement($insertQuery, $insertParams)) {
        $_SESSION['uniqueNum'] = $uniqueNum; // Save uniqueNum in session
    } else {
        die('Error saving unique number. Please try again.');
    }
} else {
    // Use existing uniqueNum from session
    $uniqueNum = $_SESSION['uniqueNum'];
}

// Displaying unique card number to user
// echo "Your card number is: " . htmlspecialchars($uniqueNum);
?>
<script>
    <?php
    // if (!isset($_SESSION["ACCESS_THANKU_PAGE"])) {
    //     header("Location: pagenotfound.php");
    // }
    ?>
    if (window.location.pathname.split("/").pop() === 'Thanku.php') {
        <?php
        $_SESSION["ACCESS_THANKU_PAGE"] = true;
        ?>
    } else {
        <?php
        unset($_SESSION["ACCESS_THANKU_PAGE"]);
        ?>
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bachatdaddy</title>
    <meta name="description" content="BACHATDADDY">

    <link rel="stylesheet" href="css/thanku.css">
    <link rel="icon" type="image/png" sizes="50x50" href="images/resources/Asset 3.png">

    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">

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
    <script>
        console.log(window.location.pathname.split("/").pop() === 'Thanku.php');

        history.pushState(null, "", location.href);
        window.addEventListener("popstate", function() {
            window.location.replace("index.php");
        });
    </script>

</body>

</html>