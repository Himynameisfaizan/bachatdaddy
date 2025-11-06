<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    require '../config/config.php'; 
    require 'functions/authentication.php';
    require 'functions/bachatdaddyfunction.php';

    $citytab =new City();
    $auth = new Authentication();
    $auth->checkSession();
    $citydata=$citytab->getAllLocations();
    if (isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
        
        $state = $_POST['state'];
        $city = $_POST['city'];
    
        $result = $citytab->addLocation($city, $state);
    
        if ($result == true) {
        } else {
            echo "<script>alert('Sorry, there was an error! Please try again.')</script>";
        }
    
        echo "<script>window.location.href = 'available.php';</script>";
    }
    

// --------------------------------------delete the single Location---------------------------
    if (isset($_REQUEST['delete']) && $_REQUEST['delete'] == 'y') {
        $id = base64_decode($_GET['eid']);
        $result=$citytab->delete($id);
        echo "<script>window.location.href = 'available.php';</script>";
      
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
            <a href="home.html" class="navbar-brand d-flex align-items-center ">
                <!-- Image that will be changed -->
                <img id="logoImg" class="img-logo img-fluid logo-1" src="images/logo/logo.jpg" alt="Logo">
            </a>
            <a href="home.html" class="navbar-brand d-flex align-items-center ">
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
            Header start
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
                
                <!-- Vendor Category Form Section -->
                <div class="col-xl-12">
                    <div class="card pb-5" id="bootstrap-table2">
                        <div class="card-header flex-wrap d-flex justify-content-between border-0 px-3">
                            <h2>Vendor Category</h2>
                        </div> 

                        <form id="vendorForm" method="post" enctype="multipart/form-data">
                            <div class="row d-flex">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <!-- State Input -->
                                        <div class="col-lg-12 vendor-form-op mx-2 mt-1 px-5">
                                            <label for="state" class="pb-2">State</label>
                                            <select id="state" name="state" class="form-control">
                                                <option value="">Select State</option>
                                                <!-- Options for the state -->
                                            </select>
                                            <small id="stateError" class="form-text text-danger" style="display: none;">Please select a State.</small>
                                        </div>
                                        
                                        <!-- City Input -->
                                        <div class="col-lg-12 vendor-category mx-2 mt-3 px-5">
                                            <label for="city" class="ps-1">City</label>
                                            <input id="city" type="text" class="form-control" name="city" aria-describedby="cityHelp" placeholder="City Name">
                                            <small id="cityError" class="form-text text-danger" style="display: none;">Please enter a city name.</small>
                                        </div>
                                        
                                        <!-- Submit Button -->
                                        <div class="col-lg-3 ms-2 ps-5">
                                            <button type="submit" name="submit" value="Submit" class="btn btn-primary mt-4 w-100 vendor-button">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                       
                    </div>
                </div>
                 

        
                <!-- View/Manage Vendor Categories Table -->
                <div class="card" id="bootstrap-table2">
                    <div class="card-header flex-wrap d-flex justify-content-between border-0 px-3">
                        <h2>View/Manage Vendor Categories</h2>
                    </div>
                    <div class="tab-content" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="bordered" role="tabpanel" aria-labelledby="home-tab-1">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:50px;">
                                                    <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                        <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th>S NO.</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Delete</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    $i = 1;
                                                    foreach($citydata as $row):
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                                <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                                <label class="form-check-label" for="customCheckBox2"></label>
                                                            </div>
                                                        </td>
                                                        <td><strong><?php echo $i++; ?></strong></td>
                                                        <td><?php echo $row['city']; ?></td>
                                                        <td><?php echo $row['state']; ?></td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <!-- <a href="vendor-categories.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-primary shadow btn-xs sharp me-3"><i class="fa fa-edit"></i></a> -->
                                                                <a onClick="return confirm('Are you sure !! Data will be delete Parmanently..')" href="?eid=<?php echo base64_encode($row['id']); ?>&delete=y" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </td>
                                                        
                                                    </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Modal 1 -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Looking for research opportunities.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger dark" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Modal 2 -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Looking for teaching positions.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger dark" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Modal 3 -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Seeking hospital affiliation.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger dark" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
     <script src="vendor/global/global.min.js"></script>
     <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
     
     <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
     <script src="js/custom.min.js"></script>
     <script src="js/dlabnav-init.js"></script>
     <script src="../js/state.js"></script>
     
     

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
        
         function changeLogo() {
             var logo = document.getElementById('logoImg');  
             
             if (logo.src.indexOf('logo.jpg') > -1) {
                 logo.src = 'images/logo/favicon.png';
             } else {
                 logo.src = 'images/logo/logo.jpg';
             }
         }
     </script>


    <script>
    document.getElementById('fileUpload').addEventListener('change', previewImage);

    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('previewImage');

        if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
        } else {
        alert("Please select a valid image file.");
        preview.style.display = 'none';
        }
    }
    </script>

    <script>
        $(document).ready(function () {
            $("#state").change(function () {
                if ($(this).val() === "") {
                    $("#stateError").show();
                } else {
                    $("#stateError").hide();
                }
            });

            $("#city").on("input", function () {
                if ($(this).val().trim() === "") {
                    $("#cityError").show();
                } else {
                    $("#cityError").hide();
                }
            });

            $("#vendorForm").submit(function (e) {
                $(".form-text.text-danger").hide();
                let isValid = true;

                if ($("#state").val() === "") {
                    $("#stateError").show();
                    isValid = false;
                }
                
                if ($("#city").val().trim() === "") {
                    $("#cityError").show();
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
    <script>
        
        document.getElementById("city").addEventListener("input", function() {
            var cityValue = this.value;
        
            this.value = cityValue.replace(/\b\w/g, function(char) {
                return char.toUpperCase();
            });
        });
    </script>


 </body>
 </html>