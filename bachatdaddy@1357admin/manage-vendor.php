<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    require '../config/config.php'; 
    require 'functions/authentication.php';
    require 'functions/bachatdaddyfunction.php';

    // $industry =new Industry();
    $vendor=new Vendor();
    $auth = new Authentication();
    $auth->checkSession();
    $vendordetails=$vendor->getAllVendors();

// --------------------------------------delete the single vendor---------------------------
    if (isset($_REQUEST['delete']) && $_REQUEST['delete'] == 'y') {
        $id = base64_decode($_GET['eid']);
        $result=$vendor->delete($id);
        // if($result){
        //     $_SESSION['msg']="Dleted sucessfully";
        //     header('Location : industry.php');
        // }
        // header('Location : industry.php');
        header("Location: manage-vendor.php");
      
    }
    //block the user
if (isset($_REQUEST['status'])&& $_REQUEST['active'] == 'y') {
    $id = base64_decode($_GET['id']);
    $status = $_GET['status'];
    $vendor->setstatus($id,$status);
    header("Location: manage-vendor.php");
  }


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

   


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
            <a href="home.php" class="navbar-brand d-flex align-items-center ">
                <!-- Image that will be changed -->
                <img id="logoImg" class="img-logo img-fluid logo-1" src="images/logo/logo.jpg" alt="Logo">
            </a>
            <a href="home.php" class="navbar-brand d-flex align-items-center ">
                <!-- Image that will be changed -->
                <img id="logoImg" class="img-logo img-fluid logo-2" src="images/logo/favicon.png" alt="Logo">
            </a>
            
    
            <div class="nav-control" onclick="changeLogo()">
                <div class="hamburger" >
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                    <svg width="26" height="26" viewbox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="22" y="11" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="11" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="22" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="11" y="11" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="11" y="22" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect y="11" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect x="22" y="22" width="4" height="4" rx="2" fill="#2A353A"></rect>
                        <rect y="22" width="4" height="4" rx="2" fill="#2A353A"></rect>
                    </svg>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		


		
		
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
        <!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
            <!-- container starts -->
            <div class="container-fluid">
                
                <!-- row -->
                <div class="">
                    <div class="">
                        <div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">
                            <div class="row">
                                <!-- Column starts -->
                            </div>
                            <!-- Column ends -->
                            
                            <!-- Column starts -->
                            <div class="col-xl-12">
                                <div class="card" id="bootstrap-table2">

                                    <!-- tab-content -->
                                    <div class="tab-content" id="myTabContent-1">
                                        <div class="tab-pane fade show active" id="bordered" role="tabpanel" aria-labelledby="home-tab-1">
                                            <div class="card-body p-0">
                                                <div>
                                                    <h2 class="ms-3 mt-4">Contact</h2>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-responsive-md">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th style="width:50px;">
                                                                    <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                                        <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                                        <label class="form-check-label" for="checkAll"></label>
                                                                    </div>
                                                                </th> -->
                                                                <th>S NO.</th>
                                                                <th>Name</th>
                                                                <th>Address</th>
                                                                <th>City</th>
                                                                <th>image</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $i=1;
                                                            foreach($vendordetails as $row):
                                                        ?>
                                                                <tr>
                                                                
                                                                    <!-- <td>
                                                                        <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                                            <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                                            <label class="form-check-label" for="customCheckBox2"></label>
                                                                        </div>
                                                                    </td> -->
                                                                    <td><strong><?php echo $i++;?></strong></td>
                                                                    <td><?php echo $row['vendor_name'];?></td>
                                                                    <td><?php echo $row['vendor_address'];?></td>
                                                                    <td><?php echo $row['city_name'];?></td>
                                                                    
                                                                    <td>
                                                                        
                                                                    <a href="adminuploads/images/vendors/<?php echo $row['image'];?>"target="_blank">
                                                                        <img src="adminuploads/images/vendors/<?php echo $row['image'];?>" width="200" height="100">
                                                                    </a>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <a href="edit-vendor.php?id=<?php  echo base64_encode($row['vendor_id']); ?>" class="btn btn-primary shadow btn-xs sharp me-3"><i class="fa fa-edit"></i></a>
                                                                            &nbsp;
                                                                            <?php if ($row['status'] == 1) { ?>
                                                                                    <a class="btn me-1 btn-warning shadow btn-xs sharp me-2" onClick="return confirm('Are you sure !! Vendor will be blocked from every page ')" href="?status=0&id=<?php echo base64_encode($row['vendor_id']); ?>&active=y"><i class="fas fa-user"></i></i></a>
                                                                                <?php } else { ?>
                                                                                    <a class="btn me-1 btn-danger    shadow btn-xs sharp me-2" href="?status=1&id=<?php echo base64_encode($row['vendor_id']); ?>&active=y"><i class="fas fa-user-slash"></i></a>
                                                                                <?php } ?>
                                                                            
                                                                            &nbsp;
                                                                            <a onClick="return confirm('Are you sure !! Data will be delete Parmanently..')" href="?eid=<?php  echo base64_encode($row['vendor_id']); ?>&delete=y" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /tab-content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- container ends -->
        </div>
        
						
       
        <!--**********************************
            Content body end
        ***********************************-->
		
		<!--**********************************
			Footer start
		***********************************-->
		
		<!--**********************************
			Footer end
		***********************************-->
        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

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
            if (logo.src.indexOf('logo.jpg') > -1) {
                logo.src = 'images/logo/favicon.png';  // Replace with your new image path
            } else {
                logo.src = 'images/logo/logo.jpg';  // Revert to the original image
            }
        }
    </script>
</body>
</html>