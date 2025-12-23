<?php
session_start();

include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
 
$user = new User();

$userdetail = $user->getUsersDetails($_SESSION['USERS_USER_ID']);
$userPassword = $userdetail['password']; // Assuming this is hashed password from DB

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = trim($_POST['password']);
    
    if ((int)$password === (int)$userPassword) {?>
        <script>
            let password = document.getElementById("password");
            // password.style.transform = rotateX('90deg');
            // password.style.transition = 'rotateX 1s ease-in';
            password.style.display = "none";
        </script>
    <?php
    } else {
        $message = '<div style="color: red; padding: 10px; border: 1px solid red; margin: 10px 0;">Incorrect password!</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bachatdaddy</title>
    <link rel="stylesheet" href="css/bachatdaddycard.css" />
    <link rel="icon" type="image/png" sizes="50x50" href="images/resources/Asset 3.png">
</head>

<body>
    <section class="main-card-container">
        <div class="card-container">
            <div class="virtual-card">
                <img src="./images/AdobeExpress.png" alt="">

                <?php 
                echo $message;
                ?> 
                
                <!-- Form to submit password -->
                <form method="POST">
                    <input type="password" name="password" id="password" required>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
