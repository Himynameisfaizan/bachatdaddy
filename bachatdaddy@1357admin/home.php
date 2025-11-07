<?php
	if (!isset($_SESSION)) {
        session_start();
    }
    require '../config/config.php'; 
    require 'functions/authentication.php';
    require 'functions/bachatdaddyfunction.php';
    include 'include/image-resize.php';

    $vendor=new Vendor();
    $auth = new Authentication();
    $auth->checkSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab">
	<meta name="robots" content="">

	
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Page Title Here -->
	<title>BACHATDADDY</title>

<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/logo/favicon.png">
	<link href="vendor/wow-master/css/libs/animate.css" rel="stylesheet">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="vendor/bootstrap-select-country/css/bootstrap-select-country.min.css">
	<link rel="stylesheet" href="vendor/jquery-nice-select/css/nice-select.css">
	<link href="vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	
	 <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--swiper-slider-->
	<link rel="stylesheet" href="vendor/swiper/css/swiper-bundle.min.css">
	<!-- Style css -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
	
    <!--*******************
        Preloader end
    ********************-->
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="wallet-open active">

			<!--**********************************
            Header start ti-comment-alt
        ***********************************-->
        
		
		<?php require ('include/header.php'); ?>
			<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        
		<?php require ('include/sidebar.php'); ?>
		
        <!--**********************************
            Sidebar end
        ***********************************-->




		
        
		

	</div>
	<!-- <div class="content-body">
	
		<div class="container-fluid">
			
			<div>
				<div>
					<div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">
						<div class="row">
						
						</div>
						
						<div class="col-xl-12">
							<div class="content">
								<h1>Welcome To Admin</h1>
								<br>
								<img src="images/logo/logo.jpg" alt="Gaadiplan Logo">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div> -->
	

	
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
	<!-- code-highlight -->
	<script src="js/highlight.min.js"></script>
	<script>hljs.highlightAll();
		hljs.configure({ ignoreUnescapedHTML: true })
		
	</script>

	<script>
		document.addEventListener('DOMContentLoaded', (event) => {
			document.querySelectorAll('pre code').forEach((el) => {
				hljs.highlightElement(el);
			});
			});
			
	
			
	</script>
	<script>
        // Function to change the logo image source
        function changeLogo() {
            var logo = document.getElementById('logoImg');  // Get the image element by its ID
            // Change the image source to the new one
            if (logo.src.indexOf('Asset 19-8.png') > -1) {
				logo.src = 'images/logo/logo1.png';  // Replace with your new image path
			} else {
				logo.src = 'images/logo/Asset 19-8.png';  // Revert to the original image
            }
        }
    </script>
</body>
</html>