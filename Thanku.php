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
                <div class="">Card no. : <span id="randNum"></span></div>
                <button class="">Go to Dashboard <i class="ri-arrow-right-line"></i></button>
            </div>
        </div>
    </section>
    <script>
        let randNum = document.getElementById("randNum");
        let rand = Math.round(Math.random(1000000, 999999) * 1000000000000);
        randNum.innerHTML = rand;
    </script>
    <script>
        // Disable back button - Aggressive method
        (function() {
            window.history.pushState(null, null, window.location.href);
            window.addEventListener('popstate', function() {
                window.history.pushState(null, null, window.location.href);
            });
        })();
    </script>

</body>

</html>