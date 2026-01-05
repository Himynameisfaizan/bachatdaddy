<?php
session_start();
	include '../config/config.php';
	include 'functions/authentication.php';

	$db = new dbClass();
	$auth = new Authentication();


	if (isset($_POST['btn_login']) && $_POST['btn_login'] == 'LOGIN') {
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$result = $auth->adminLogin($email, $pass);
     
		if ($result === true) {
		header('Location: home.php');
			exit();
		} else {
			$_SESSION['errmsg'] = 'Invalid username or password.';
			header('Location: index.php');
		exit();
		}


}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
   <!-- All Meta -->
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
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css2-2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="vendor/toastr/css/toastr.min.css">

</head>

<body class="body  h-100">
	<div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
		<div class="login-aside text-center  d-flex flex-column flex-row-auto">
			<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
				<div class="text-center mb-lg-4 mb-3 pt-3 logo">
					<img src="images/logo/logo.jpg" class="index-img" >
				</div>
				<!-- <h3 class="mb-2 text-white">Sign In</h3>
				<p class="mb-4"></p> -->
			</div>
			
		</div>
		<div class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
			<div class="d-flex justify-content-center h-100 align-items-center">
				<div class="authincation-content style-2">
					<div class="row no-gutters">
						<div class="col-xl-12 tab-content">
							<div id="sign-up" class="auth-form tab-pane fade show active  form-validation">
								<form id="myform" method="post">
									<div class="text-center mb-4">
										<h3 class="text-center mb-2 text-black">Sign In</h3>
									
									</div>
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500 index-input">Email address</label>
									  <input type="email" name="email" class="form-control" id="exampleFormControlInput1" >
									 
									</div>
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label mb-2 fs-13 label-color font-w500">Password</label>
									  <input type="password"  name="password"  class="form-control index-input" id="exampleFormControlInput2">
									  
									</div>
									<a href="javascript:void(0);" class="text-primary float-end mb-4">Forgot Password ?</a>
									<button type="submit" value="LOGIN" name="btn_login"  class="btn btn-block btn-primary">Sign In</button>
									
								</form>
								<div class="new-account mt-3 text-center">
									<p class="font-w500">Already have an account? <a class="text-primary" href="#sign-in" data-toggle="tab">Sign in</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
	<script src="vendor/toastr/js/toastr.min.js"></script>
	<script src="js/plugins-init/toastr-init.js"></script>

	<script>
		<?php if (isset($_SESSION['msg'])): ?>
			toastr.success("<?php echo $_SESSION['msg']; ?>");
			<?php unset($_SESSION['msg']); ?>
		<?php endif; ?>

		<?php if (isset($_SESSION['errmsg'])): ?>
			toastr.error("<?php echo $_SESSION['errmsg']; ?>");
			<?php unset($_SESSION['errmsg']); ?>
		<?php endif; ?>
	</script>

	<script>
		$(document).ready(function () {
    // Apply validation rules to the form
    $('#myform').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 3
            }
        },
        messages: {
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter your password",
                minlength: "Password must be at least 3 characters long"
            }
        },
        // Optional: Prevent the form from submitting if it's invalid
        submitHandler: function (form) {
            form.submit();
        }
    });
});

	</script>

</body>
</html>