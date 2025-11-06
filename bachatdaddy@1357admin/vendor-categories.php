<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    require '../config/config.php'; 
    require 'functions/authentication.php';
    require 'functions/bachatdaddyfunction.php';

    $industry =new Industry();
    $subindustry =new SubIndustry();
    $auth = new Authentication();
    $auth->checkSession();

    // -----------------------------------------------fetching data fro db for the table-----------------------------------//
    // $allindustrydata=$industry->getAllIdustry();
    $allsubIndustrudata=$subindustry->getAllIndustry();

    $Id =  isset($_REQUEST['id']) ? base64_decode($_REQUEST['id']) : NULL;

    if(isset($Id)){
        $editdata=$subindustry->getIdustry($Id);
        // var_dump($editdata);
    }

    $industrydata = $industry->getAllIdustry();

    if (isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
        
        $image = time() . "-" . $_FILES['image']['name'];
        $industryId=$_POST['industry'];
        $category=$_POST['category'];


        $imagetmp = $_FILES['image']['tmp_name'];
        $dest = "adminuploads/images/vendor-category/" . $image;

        $result = $subindustry->addindutry($category,$industryId,$image);
        if ($result == true) {

            move_uploaded_file($imagetmp, $dest);
          } else {
        
            echo "<script>alert('Sorry Some Error !! Try Again..')</script>";
          }
          header('Location: vendor-categories.php');

		
    }

    // -------------------------------------update industry----------------------------
    if (isset($_POST['update']) && $_POST['update'] == 'Update') {

        $image = time() . "-" . $_FILES['image']['name'];
        // $industryId=$_POST['industry'];
        $category=$_POST['category'];
        $oldimg = $_POST['oldimg'];
        if ($_FILES['image']['name'] != '') {

            unlink("adminuploads/images/vendor-category/" . $oldimg);
            $image = time() . "-" . $_FILES['image']['name'];
            $imagetmp = $_FILES['image']['tmp_name'];
            $dest = "adminuploads/images/vendor-category/" . $image;
            move_uploaded_file($imagetmp, $dest);
          } else {
            $image = $oldimg;
          }


        $result = $subindustry->updateindutry($category,$image,$Id);
        if ($result == true) {

            move_uploaded_file($imagetmp, $dest);
          } else {
        
            echo "<script>alert('Sorry Some Error !! Try Again..')</script>";
          }
          header('Location: vendor-categories.php');

    }
// // ------------------------------ the visibility functionality--------------------------//
    if (isset($_REQUEST['visible'])) {
        $id = base64_decode($_GET['id']);
        $vis = $_GET['visible'];
        $subindustry->visibility($id,$vis);
        header('Location: vendor-categories.php');
      }
// --------------------------------------delete the single industry---------------------------
    if (isset($_REQUEST['delete']) && $_REQUEST['delete'] == 'y') {
        $id = base64_decode($_GET['eid']);
        $result=$subindustry->delete($id);
        // if($result){
        //     $_SESSION['msg']="Dleted sucessfully";
        //     header('Location : industry.php');
        // }
        // header('Location : industry.php');
        header("Location: vendor-categories.php");
      
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
        
                        <!-- Form for selecting industry and entering category name -->
                        <?php if($Id == NULL): ?>
                            <form id="vendorForm" method="post" enctype="multipart/form-data">
                                <div class="row d-flex">
                                    <div class="col-lg-3 col-md-10 col-sm-3 pe-2 vendor-file ms-3 ps-4">
                                        <label for="fileUpload" class="ps-1 mb-1">Upload Image</label>
                                        <div id="imagePreview" class="image-preview-container">
                                            <img id="previewImage" src="" alt="Image Preview" class="image-preview" style="display: none;">
                                        </div>
                                        <input type="file" id="fileUpload" class="form-control" name="image" aria-describedby="fileHelp" accept="image/*" onchange="previewImage(event)">
                                        <small id="fileError" class="form-text text-danger" style="display: none;">Please upload an image.</small>
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 vendor-form-op mx-2 mt-1 px-5">
                                                <label for="industrySelect" class="pb-2">Industry Name</label>
                                                <select id="industrySelect" class="w-100" name="industry" aria-label="Default select example">
                                                    <option selected>Select Industry</option>
                                                    <!-- PHP Loop for industries -->
                                                    <?php foreach($industrydata as $row ):?>
                                                        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <small id="industryError" class="form-text text-danger" style="display: none;">Please select an industry.</small>
                                            </div>
                                            <div class="col-lg-12 vendor-category mx-2 mt-3 px-5">
                                                <label for="categoryName" class="ps-1">Category</label>
                                                <input id="categoryName" type="text" class="form-control" name="category" aria-describedby="emailHelp" placeholder="Name">
                                                <small id="categoryError" class="form-text text-danger" style="display: none;">Please enter a category name.</small>
                                            </div>
                                            <div class="col-lg-3 ms-2 ps-5">
                                                <button type="submit" name="submit" value="Submit" class="btn btn-primary mt-4 w-100 vendor-button">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php else: ?>
                            <form method="post" enctype="multipart/form-data" id="vendorForm1">
                                <div class="row d-flex">
                                    <!-- Image Upload (Not required for Update form, uses the existing image) -->
                                    <div class="col-lg-3 col-md-10 col-sm-3 pe-2 vendor-file ms-3 ps-4">
                                        <label for="fileUpload" class="ps-1 mb-1">Upload Image</label>

                                        <!-- Image preview container (shows the existing image) -->
                                        <div id="imagePreview" class="image-preview-container">
                                            <img id="previewImage" src="adminuploads/images/vendor-category/<?php echo $editdata['image']; ?>" alt="Image Preview" class="image-preview">
                                        </div>

                                        <!-- Hidden input for old image (used to retain the old image when no new image is uploaded) -->
                                        <input type="hidden" name="oldimg" value="<?= $editdata['image']; ?>">

                                        <!-- File input for image upload (optional for the update form) -->
                                        <input type="file" class="form-control" name="image" id="fileUpload1" aria-describedby="fileHelp" accept="image/*" onchange="previewImage(event)">
                                        <small id="fileError1" class="form-text text-danger" style="display: none;">Please upload an image.</small>
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="row">
                                            <!-- Industry Field -->
                                            <div class="col-lg-12 vendor-form-op mx-2 mt-1 px-5">
                                                <label for="industrySelect" class="pb-2">Industry Name</label>
                                                <select disabled class="w-100" id="industrySelect1" name="industry" aria-label="Default select example">
                                                    <?php foreach ($industrydata as $row):
                                                            
                                                        ?>

                                                        <option value="<?php echo $row['id']; ?>" <?php echo ($row['id'] === $editdata['industry_id']) ? 'selected' : ''; ?>>
                                                            <?php echo $row['name']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small id="industryError1" class="form-text text-danger" style="display: none;">Please select an industry.</small>
                                            </div>

                                            <!-- Category Field -->
                                            <div class="col-lg-12 vendor-category mx-2 mt-3 px-5">
                                                <label for="categoryName" class="ps-1">Category</label>
                                                <input type="text" class="form-control" value="<?php echo $editdata['name']?>" name="category" id="categoryName1" aria-describedby="emailHelp" placeholder="Name">
                                                <small id="categoryError1" class="form-text text-danger" style="display: none;">Please enter a category name.</small>
                                            </div>

                                            <div class="col-lg-3 ms-2 ps-5">
                                                <button type="submit" name="update" value="Update" class="btn btn-primary mt-4 w-100 vendor-button">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
                 

                
                <!-- CSS Styling for Image Container -->
                
                <!-- img container -->
                 <!-- <div class="center">
                    <div class="form-input">
                        <label for="file-ip-1">Upload Image</label>
                        <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
                        <div class="preview">
                            <img src="" id="file-ip-1-preview" alt="">
                        </div>
                    </div>
                 </div> -->

        
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
                                                <th>Vendor Category</th>
                                                <th>Industry Name</th>
                                                <th>Action</th>
                                                <th>Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    $i = 1;
                                                    foreach($allsubIndustrudata as $row):
                                                        // $catid=$row['industry_id '];
                                                        // $industryName=$subindustry->getIndustryName($catid);
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                                <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                                <label class="form-check-label" for="customCheckBox2"></label>
                                                            </div>
                                                        </td>
                                                        <td><strong><?php echo $i++; ?></strong></td>
                                                        <td><?php echo $row['sub_industry_name']; ?></td>
                                                        <td><?php echo $row['industry_name']; ?></td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="vendor-categories.php?id=<?php echo base64_encode($row['sub_industry_id']); ?>" class="btn btn-primary shadow btn-xs sharp me-3"><i class="fa fa-edit"></i></a>
                                                                <a onClick="return confirm('Are you sure !! Data will be delete Parmanently..')" href="?eid=<?php echo base64_encode($row['sub_industry_id']); ?>&delete=y" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <?php if ($row['sub_industry_active'] == 1) { ?>
                                                                    <a class="btn btn-danger shadow btn-xs sharp" href="?visible=0&id=<?php echo base64_encode($row['sub_industry_id']); ?>"><i class="fa fa-check"></i></a>
                                                                <?php } else { ?>
                                                                    <a class="btn btn-danger shadow btn-xs sharp" href="?visible=1&id=<?php echo base64_encode($row['sub_industry_id']); ?>"><i class="fa fa-uncheck"></i></a>
                                                                <?php } ?>
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
 <!-- HTML: File input without inline onchange -->
<input type="file" id="fileUpload">

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
      event.target.value = "";
    }
  }
</script>

<script>
    $(document).ready(function () {
        $("#industrySelect1").change(function () {
            if ($(this).val() === "") {
                $("#industryError1").show();
            } else {
                $("#industryError1").hide();
            }
        });

        $("#categoryName1").on("input", function () {
            if ($(this).val().trim() === "") {
                $("#categoryError1").show();
            } else {
                $("#categoryError1").hide();
            }
        });

        $("#fileUpload1").on("change", function () {
            if ($(this).get(0).files.length === 0 && !$("input[name='oldimg']").val()) {
                $("#fileError1").show();
            } else {
                $("#fileError1").hide();
            }
        });

        $("#vendorForm1").submit(function (e) {
            $(".form-text.text-danger").hide();
            let isValid = true;

            if ($("#industrySelect1").val() === "") {
                $("#industryError1").show();
                isValid = false;
            }

            if ($("#categoryName1").val().trim() === "") {
                $("#categoryError1").show();
                isValid = false;
            }

            if ($("#fileUpload1").get(0).files.length === 0 && !$("input[name='oldimg']").val()) {
                $("#fileError1").show();
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#industrySelect").change(function () {
            if ($(this).val() === "Select Industry") {
                $("#industryError").show();
            } else {
                $("#industryError").hide();
            }
        });

        $("#categoryName").on("input", function () {
            if ($(this).val().trim() === "") {
                $("#categoryError").show();
            } else {
                $("#categoryError").hide();
            }
        });

        $("#fileUpload").on("change", function () {
            if ($(this).get(0).files.length === 0) {
                $("#fileError").show();
            } else {
                $("#fileError").hide();
            }
        });

        function previewImage(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function() {
                $('#previewImage').attr('src', reader.result).show();
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        $('#fileUpload').on('change', previewImage);

        $("#vendorForm").submit(function (e) {
            $(".form-text.text-danger").hide();
            let isValid = true;

            if ($("#industrySelect").val() === "Select Industry") {
                $("#industryError").show();
                isValid = false;
            }

            if ($("#categoryName").val().trim() === "") {
                $("#categoryError").show();
                isValid = false;
            }

            if ($("#fileUpload").get(0).files.length === 0) {
                $("#fileError").show();
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    });
</script>


  


 </body>
 </html>