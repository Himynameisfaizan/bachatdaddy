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
    $subindustry=new SubIndustry();
    $industry=new Industry();
    $auth->checkSession();

    // -----------------------------------------------fetching data fro db for the table-----------------------------------//
    $Id =  isset($_REQUEST['id']) ? base64_decode($_REQUEST['id']) : NULL;
    if(isset($Id)){
        $editdata=$vendor->getVendorById($Id);
        $subindustryId=$editdata[0]['category_id'];
        $subdata=$subindustry->getIdustry($subindustryId);
        $indata =$industry->getAllIdustry();
        // var_dump($editdata);
    }
    if (!empty($Id)) {
        $iq = $vendor->getAllImages($Id);
        $sov = $vendor->getAllVendorSconditions($Id);
        $gov = $vendor->getAllVendorGconditions($Id);
        $fov = $vendor->getAllVendorOffers($Id);
        $pov = $vendor->getAllVendorPhones($Id);
        $eov = $vendor->getAllVendorEmails($Id);
    }


   

    // -------------------------------------Submit industry----------------------------
    if (isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
        $id = $_REQUEST['eId'];
        $name = $_POST['name'];
        $city = $_POST['city'];
        $offer=$_POST['offerhead'];
        $address = $_POST['address'];
        $sdate=$_POST['sdate'];
        $edate=$_POST['edate'];
        $oldimage = $_POST['oldimage'];
        $subindustry=$_POST['subindustry'];
    
        $dest = "adminuploads/images/vendors/";
    
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = time() . "-" . $_FILES['image']['name'];
            $imagetmp = $_FILES['image']['tmp_name'];
    
            if ($imagetmp) {
                if (file_exists($dest . $oldimage)) {
                    unlink($dest . $oldimage);
                }
    
                move_uploaded_file($imagetmp, $dest . $image);
            }
        } else {
            $image = $oldimage;
        }
    
        $result = $vendor->updateVendor($name,$subindustry, $address, $city, $image, $sdate, $edate, $id);
        
        if ($result) {
            // var_dump($result);
           
            $vendor_id = $id;
            if (!empty($_POST['emails'])) {
                foreach ($_POST['emails'] as $email) {
                    $email = trim($email); 
                    if($email != ""){
                        $result=$vendor->insertVendorEmail($vendor_id, $email);
                    }
                }
            }
            if (!empty($_POST['phones'])) {
                foreach ($_POST['phones'] as $phone) {
                    $phone = trim($phone); 
                    if($phone != ""){
                        $result = $vendor->insertVendorPhone($vendor_id, $phone);
                    }
                }
            }
            if (!empty($_POST['offers'])) {
                foreach ($_POST['offers'] as $offer) {
                    $offer = trim($offer);
                    if($offer != ""){
                        $result = $vendor->insertVendorOffer($vendor_id, $offer);
                    }
                }
            }
            if (!empty($_POST['sconditions'])) {
                foreach ($_POST['sconditions'] as $scondition) {
                    $scondition = trim($scondition);
                    if($scondition != ""){
                        $result = $vendor->insertVendorScondition($vendor_id, $scondition);
                    }
                }
            }
            if (!empty($_POST['gconditions'])) {
                foreach ($_POST['gconditions'] as $gcondition) {
                    $gcondition = trim($gcondition);
                    if($gcondition != ""){
                        $result = $vendor->insertVendorGcondition($vendor_id, $gcondition);
                    }
                }
            }
            
            if (!empty($_FILES['images']['name'][0])) {
                
    
                foreach ($_FILES['images']['name'] as $key => $imageName) {
                    if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                        $tempName = $_FILES['images']['tmp_name'][$key];
                        $newImage = time() . "-" . $imageName;
                        $newDest = $dest . $newImage;
                        
                        $result = $vendor->insertProductImages($vendor_id, $newImage);
                        if ($result) {
                            move_uploaded_file($tempName, $newDest);
                        }
                    }
                }
            }
    
            header('Location: manage-vendor.php');
            exit;
        } else {
            echo "<script>alert('Sorry, some error occurred! Try again.')</script>";
            header("Location: manage-vendor.php");
            exit;
        }
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
	<!--swiper-slider-->f
	<link rel="stylesheet" href="vendor/swiper/css/swiper-bundle.min.css">
	<!-- Style css -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        
            label.error {
                color: red;
                font-size: 12px;
            }

    </style>
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
                            <h2>Edit Vendor</h2>
                        </div>
                        <form id="vendorForm" method="post" enctype="multipart/form-data" class="form-horizontal ms-5" >
                            <input type="hidden" name="eId" value="<?php echo $Id; ?>">

                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="industry" class="form-control-label">Industry Name</label>
                                </div>
                            <div class="col-12 col-md-8">
                                <select id="industry" class="form-control" name="industry" aria-label="Default select example" onchange="updateSubindustries()">
                                    <option selected>Select Industry</option>
                                    <?php foreach($indata as $row ):?>
                                        <option value="<?php echo $row['id'];?>" <?php echo ($row['id'] === $subdata['industry_id']) ? 'selected' : ''; ?>><?php echo $row['name'];?></option>
                                    <?php endforeach;?>
                                </select>
                                <small id="industryError" class="form-text text-danger" style="display: none;">Please select an industry.</small>
                                </div>
                            
                                </div>
                                <div class="row form-group mb-4">
                                    <div class="col col-md-2">
                                        <label for="subindustry" class="form-control-label">Subindustry</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <select class="form-control" name="subindustry" id="subindustry">
                                            <option value="<?php echo  $subdata['id']; ?>"selected><?php echo  $subdata['name']; ?></option>
                                            <!-- Subindustry options will be populated based on the selected industry -->
                                        </select>
                                    </div>
                                </div>

                            <!-- Vendor Name -->
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="name" class="form-control-label">Vendor</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="text" id="name" value="<?php echo $editdata[0]['vendor_name']; ?>" name="name" class="form-control" maxlength="200">
                                    <span id="nameError" style="color: red; display: none;">Vendor name is required.</span>
                                </div>
                            </div>
                            
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="name" class=" form-control-label">Vendor Email</label>
                                </div>
                                <div class="col-12 col-md-6"> <!-- Changed col-md-8 to col-md-6 -->
                                    <input type="text" id="email" disabled value="<?php echo $editdata[0]['email']; ?>" name="email" class="form-control" maxlength="200">
                                </div>
                            </div>
                            <div class="email_field_wrapper mb-4">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email" class="form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <input type="email" name="emails[]" class="form-control" maxlength="200" placeholder="Additional Email">
                                    </div>
                                    <div class="col-md-2">
                                        <a href="javascript:void(0);" class="btn btn-success add_email_button" title="Add field">Add More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="phone_field_wrapper mb-4">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="phone" class="form-control-label">Phone</label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <input type="tel" name="phones[]" class="form-control"   maxlength="15" placeholder="Phone">
                                    </div>
                                    <div class="col-md-2">
                                        <a href="javascript:void(0);" class="btn btn-success add_phone_button" title="Add field">Add More</a>
                                    </div>
                                </div>
                            </div>


                            <!-- State (disabled) -->
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="state" class="form-control-label">State</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <select class="form-control" name="state" id="state" onchange="updateCities()" >
                                        <option value="<?php echo $editdata[0]['city_state']; ?>" selected><?php echo $editdata[0]['city_state']; ?></option>
                                    </select>
                                    <span id="stateError" style="color: red; display: none;">State is required.</span>
                                </div>
                            </div>

                            <!-- City (disabled) -->
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="city" class="form-control-label">City</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <select id="city"  class="form-control" name="city">
                                        <option value="<?php echo $editdata[0]['city_id']; ?>" selected><?php echo $editdata[0]['city_name']; ?></option>
                                    </select>
                                    <span id="cityError" style="color: red; display: none;">City is required.</span>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="address" class="form-control-label">Address</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="text" id="address" value="<?php echo $editdata[0]['vendor_address']; ?>" name="address" class="form-control" maxlength="200">
                                    <span id="addressError" style="color: red; display: none;">Address is required.</span>
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label class="form-control-label">Image (Size : 1200px*1125px)</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="file" onchange="return fileValidation(this)" id="image" name="image" class="form-control">
                                    <input type="hidden" name="oldimage" value="<?php echo $editdata[0]['image']; ?>">
                                    <span id="imageError" style="color: red; display: none;">Invalid image. Please upload a JPG, JPEG, PNG, or GIF file with a maximum size of 2MB.</span>
                                </div>
                            </div>

                            <!-- Image Preview -->
                            <div class="row form-group mb-4">
                                <div class="col col-md-2">
                                    <label for="image" class="form-control-label">Preview Image</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <img id="imagePreview" src="adminuploads/images/vendors/<?php echo $editdata[0]['image']; ?>" height="120" width="150">
                                </div>
                            </div>

                            <!-- Add More Images -->
                            <div class="field_wrapper">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class="form-control-label">Add More Images (Size : 1200px*1125px)</label>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <input type="file" onchange="return fileValidation1(this)" name="images[]" class="form-control">
                                        <span class="imageFieldError" style="color: red; display: none;">Invalid image. Please upload a JPG, JPEG, PNG, or GIF file with a maximum size of 2MB.</span>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="javascript:void(0);" class="btn btn-success add_button" title="Add field">Add More</a>
                                    </div>
                                </div>
                            </div>
                            <h3>Offer Details</h3>
                                           
                                           <div class="row form-group mb-4">
                                               <div class="col col-md-2">
                                                   <label for="offerhead" class="form-control-label">Offer heading</label>
                                               </div>
                                               <div class="col-12 col-md-6">
                                                   <input type="text" id="offerhead" placeholder="Enter Offer Heading"  value="<?php echo $editdata[0]['offer']; ?>" name="offerhead" class="form-control" maxlength="200">
                                               </div>
                                           </div>
                                           <div class="row form-group mb-4">
                                                <div class="col col-md-2">
                                                    <label for="sdate" class="form-control-label">Start Offer Date</label>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <input type="date" id="sdate" name="sdate" value="<?php echo $editdata[0]['sdate']; ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group mb-4">
                                                <div class="col col-md-2">
                                                    <label for="edate" class="form-control-label">End Offer Date</label>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <input type="date" id="edate" name="edate" value="<?php echo $editdata[0]['edate']; ?>" class="form-control">
                                                </div>
                                            </div>


                                           <div class="offer_field_wrapper mb-4">
                                               <div class="row form-group">
                                                   <div class="col col-md-3">
                                                       <label for="offer" class="form-control-label">Offer</label>
                                                   </div>
                                                   <div class="col-12 col-md-3">
                                                       <input type="text" name="offers[]" class="form-control"  maxlength="200" placeholder="Offer Description">
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="javascript:void(0);" class="btn btn-success add_offer_button" title="Add More">Add More</a>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="sconditions_field_wrapper mb-4">
                                               <div class="row form-group">
                                                   <div class="col col-md-3">
                                                       <label for="sconditions" class="form-control-label">Special terms and conditions</label>
                                                   </div>
                                                   <div class="col-12 col-md-3">
                                                       <input type="text" name="sconditions[]" class="form-control"  maxlength="200" placeholder="Sconditions Description">
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="javascript:void(0);" class="btn btn-success add_sconditions_button" title="Add More">Add More</a>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="gconditions_field_wrapper mb-4">
                                               <div class="row form-group">
                                                   <div class="col col-md-3">
                                                       <label for="gconditions" class="form-control-label">General terms and conditions</label>
                                                   </div>
                                                   <div class="col-12 col-md-3">
                                                       <input type="text" name="gconditions[]" class="form-control"  maxlength="200" placeholder="Gconditions Description">
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="javascript:void(0);" class="btn btn-success add_gconditions_button" title="Add More">Add More</a>
                                                   </div>
                                               </div>
                                           </div>
                            
                            <div class="row form-group mb-4 ml-5">
                                <div class="col-12 col-md-7">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> SUBMIT
                                        </button>
                                    </div>
                            </div>
                            

                            <!-- Existing Images List -->
                            

                            <!-- Submit Button -->
                            <div class="card-footer">
                                
                                <div class="table-responsive">
                                <table class="table first">
                                    <thead>
                                        <tr>
                                            <th width="1%">S.No</th>
                                            <th width="2%">Image</th>
                                            <th width="2%">Date</th>
                                            <th width="1%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i =  1;
                                        foreach ($iq as $imgRow) {
                                            ?>
                                            <tr id="<?php echo $imgRow['id']; ?>">
                                                <td><?= $i; ?></td>
                                                <td>
                                                    <a href="adminuploads/images/vendors/<?php echo $imgRow['image']; ?>" target="_blank">
                                                        <img src="adminuploads/images/vendors/<?php echo $imgRow['image']; ?>" width="200" height="100">
                                                    </a>
                                                </td>
                                                <td><?php echo date('d-m-Y', strtotime($imgRow['created_at'])); ?></td>
                                                <td>
                                                    <a class="remove" href="javascript:void(0);" data-id="<?php echo $imgRow['id']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table first">
                                    <thead>
                                        <tr>
                                            <th width="1%">S.No</th>
                                            <th width="2%">Special terms and conditions</th>
                                            <th width="2%">Date</th>
                                            <th width="1%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i =  1;
                                        foreach ($sov as $imgRow) {
                                            ?>
                                            <tr id="<?php echo $imgRow['id']; ?>">
                                                <td><?= $i; ?></td>
                                                <td>
                                                    <?= $imgRow['condition'];?>
                                                </td>
                                                <td><?php echo date('d-m-Y', strtotime($imgRow['created_at'])); ?></td>
                                                <!-- <td>
                                                                     
                                                    <a onClick="return confirm('Are you sure !! Data will be delete Parmanently..')" href="?eid=<?php  echo base64_encode($imgRow['id']); ?>&delete=y">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td> -->
                                                <td>
                                                    <a class="remove1" href="javascript:void(0);" data-id="<?php echo $imgRow['id']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table first">
                                    <thead>
                                        <tr>
                                            <th width="1%">S.No</th>
                                            <th width="2%">General terms and conditions</th>
                                            <th width="2%">Date</th>
                                            <th width="1%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i =  1;
                                        foreach ($gov as $imgRow) {
                                            ?>
                                            <tr id="<?php echo $imgRow['id']; ?>">
                                                <td><?= $i; ?></td>
                                                <td>
                                                    <?= $imgRow['condition'];?>
                                                </td>
                                                <td><?php echo date('d-m-Y', strtotime($imgRow['created_at'])); ?></td>
                                                <td>
                                                    <a class="remove2" href="javascript:void(0);" data-id="<?php echo $imgRow['id']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table first">
                                    <thead>
                                        <tr>
                                            <th width="1%">S.No</th>
                                            <th width="2%">Offers</th>
                                            <th width="2%">Date</th>
                                            <th width="1%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i =  1;
                                        foreach ($fov as $imgRow) {
                                            ?>
                                            <tr id="<?php echo $imgRow['id']; ?>">
                                                <td><?= $i; ?></td>
                                                <td>
                                                    <?= $imgRow['offer'];?>
                                                </td>
                                                <td><?php echo date('d-m-Y', strtotime($imgRow['created_at'])); ?></td>
                                                <td>
                                                    <a class="remove3" href="javascript:void(0);" data-id="<?php echo $imgRow['id']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table first">
                                    <thead>
                                        <tr>
                                            <th width="1%">S.No</th>
                                            <th width="2%">Phone No.</th>
                                            <th width="2%">Date</th>
                                            <th width="1%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i =  1;
                                        foreach ($pov as $imgRow) {
                                            ?>
                                            <tr id="<?php echo $imgRow['id']; ?>">
                                                <td><?= $i; ?></td>
                                                <td>
                                                    <?= $imgRow['mobile'];?>
                                                </td>
                                                <td><?php echo date('d-m-Y', strtotime($imgRow['created_at'])); ?></td>
                                                <td>
                                                    <a class="remove4" href="javascript:void(0);" data-id="<?php echo $imgRow['id']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table first">
                                    <thead>
                                        <tr>
                                            <th width="1%">S.No</th>
                                            <th width="2%">Additional emails</th>
                                            <th width="2%">Date</th>
                                            <th width="1%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i =  1;
                                        foreach ($eov as $imgRow) {
                                            ?>
                                            <tr id="<?php echo $imgRow['id']; ?>">
                                                <td><?= $i; ?></td>
                                                <td>
                                                    <?= $imgRow['email'];?>
                                                </td>
                                                <td><?php echo date('d-m-Y', strtotime($imgRow['created_at'])); ?></td>
                                                <td>
                                                    <a class="remove5" href="javascript:void(0);" data-id="<?php echo $imgRow['id']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </form>

                    </div>
                </div>
               
            </div>
        
        
        </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <script src="vendor/global/global.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    
     <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
     <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
     <script src="js/custom.min.js"></script>
     <script src="js/dlabnav-init.js"></script>
	 <script src="js/state.js"></script>
     
     
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
            event.target.value = "";
            }
        }
    </script>

<script>
    function updateCities() {
        var stateName = jQuery('#state').val();  

        if (stateName) {
            jQuery.ajax({
                type: 'POST',
                url: '../get-cities.php',
                data: { state_name: stateName },
                success: function(response) {
                    var citySelect = jQuery('#city');
                    citySelect.html('<option value="">Select City</option>');

                    if (response) {
                        citySelect.append(response);
                    } else {
                        citySelect.html('<option value="">No cities available</option>');
                    }
                },
                error: function(xhr, status, error) {
                    jQuery('#city').html('<option>Error loading cities</option>');
                }
            });
        } else {
            jQuery('#city').html('<option value="">Select State first</option>');
        }
    }
</script>
<script>
        function updateSubindustries() {
            var industryName = jQuery('#industry').val(); 

            if (industryName) {
                jQuery.ajax({
                    type: 'POST',
                    url: '../get-subindustry.php',
                    data: { industry_name: industryName },
                    success: function(response) {
                        var subindustrySelect = jQuery('#subindustry');
                        subindustrySelect.html('<option value="">Select Subindustry</option>');

                        if (response) {
                            subindustrySelect.append(response);
                        } else {
                            subindustrySelect.html('<option value="">No subindustries available</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        jQuery('#subindustry').html('<option>Error loading subindustries</option>');
                    }
                });
            } else {
                jQuery('#subindustry').html('<option value="">Select Industry first</option>');
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
        var maxField = 6;
        var addButton = $('.add_button'); 
        var wrapper = $('.field_wrapper');   

        var fieldHTML = '<div class="row form-group remove mt-5"><div class="col col-md-3"></div><div class="col-6 col-md-5 "><input type="file" onchange="return fileValidation1(this)" name="images[]" class="form-control"></div><a href="javascript:void(0);" class="btn btn-danger remove_button col-md-1" style="margin-left: 15px;">Remove</a></div>';
        
        var x = 1; 
        $(addButton).click(function () {
            
            if (x < maxField) {
            x++; 
            $(wrapper).append(fieldHTML); 
            }
        });
        
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); 
            x--;
        });
        });
    </script>
    
    <script>
        function fileValidation() 
        {
            var fileInput =
                document.getElementById('image');
            
            var filePath = fileInput.value;
        
          
            var allowedExtensions =
                    /(\.jpg|\.jpeg|\.png)$/i;
            
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            }
            else
            {
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').src = e.target.result;
                    };      
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
        
    </script>
    
<script>
    function fileValidation1(inputElement) {
        var filePath = inputElement.value;

        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type');
            inputElement.value = ''; 
            return false;
        } else {
            if (inputElement.files && inputElement.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                   
                };
                reader.readAsDataURL(inputElement.files[0]);
            }
        }
    }
</script>
        <script type="text/javascript">
        $(".remove").click(function () {
            var action = 'deleteImages';
            var id = $(this).parents("tr").attr("id");

            if (confirm('Are you sure to remove this image ?')) {
                $.ajax({
                url: 'get-values.php',
                type: 'GET',
                data: { deleteImages: action, id: id },
                success: function (data) {
                    $("#" + id).remove();
                    // alert("Record removed successfully");
                }
                });
            }
        });
        $(".remove1").click(function () {
            var action = 'deleteSCondition';
            var id = $(this).parents("tr").attr("id");
            if (confirm('Are you sure to remove this Special term and condition ?')) {
                $.ajax({
                url: 'get-values.php',
                type: 'GET',
                data: { deleteSCondition: action, id: id },
                success: function (data) {
                    $("#" + id).remove();
                    // alert("Record removed successfully");
                }
                });
            }
        });
        $(".remove2").click(function () {
            var action = 'deleteGCondition';
            var id = $(this).parents("tr").attr("id");

            if (confirm('Are you sure to remove this General term and condition ?')) {
                $.ajax({
                url: 'get-values.php',
                type: 'GET',
                data: { deleteGCondition: action, id: id },
                success: function (data) {
                    $("#" + id).remove();
                    // alert("Record removed successfully");
                }
                });
            }
        });
        $(".remove3").click(function () {
            var action = 'deleteOffer';
            var id = $(this).parents("tr").attr("id");

            if (confirm('Are you sure to remove this Offer ?')) {
                $.ajax({
                url: 'get-values.php',
                type: 'GET',
                data: { deleteOffer: action, id: id },
                success: function (data) {
                    $("#" + id).remove();
                    // alert("Record removed successfully");
                }
                });
            }
        });
        $(".remove4").click(function () {
            var action = 'deletePhone';
            var id = $(this).parents("tr").attr("id");

            if (confirm('Are you sure to remove this Phone no. ?')) {
                $.ajax({
                url: 'get-values.php',
                type: 'GET',
                data: { deletePhone: action, id: id },
                success: function (data) {
                    $("#" + id).remove();
                    // alert("Record removed successfully");
                }
                });
            }
        });
        $(".remove5").click(function () {
            var action = 'deleteEmail';
            var id = $(this).parents("tr").attr("id");

            if (confirm('Are you sure to remove this Email ?')) {
                $.ajax({
                url: 'get-values.php',
                type: 'GET',
                data: { deleteEmail: action, id: id },
                success: function (data) {
                    $("#" + id).remove();
                    // alert("Record removed successfully");
                }
                });
            }
        });
    </script>

<script type="text/javascript">
        $(document).ready(function () {
            var maxFields = 3; // Maximum number of email fields
            var addButton = $('.add_email_button'); // Add button selector
            var wrapper = $('.email_field_wrapper'); // Field wrapper
            var fieldHTML = `
                <div class="row form-group remove_email  mb-4 mt-4">
                    <div class="col col-md-3"></div>
                    <div class="col-12 col-md-3">
                        <input type="email" name="emails[]" class="form-control" required maxlength="200" placeholder="Email">
                    </div>
                    <div class="col-md-2">
                    <a href="javascript:void(0);" class="btn btn-danger remove_button" style="margin-left: 15px;">Remove</a>
                    </div>
                </div>`;
            var x = 1; // Initial field counter

            // Add button click event
            $(addButton).click(function () {
                if (x < maxFields) { // Check max fields limit
                    x++;
                    $(wrapper).append(fieldHTML); // Add new email field
                }
            });

            // Remove button click event
            $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).closest('.remove_email').remove(); // Remove the email field group
                x--; // Decrease the field count
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var maxFields = 3; // Maximum number of phone fields
            var addButton = $('.add_phone_button'); // Add button selector
            var wrapper = $('.phone_field_wrapper'); // Field wrapper
            var fieldHTML = `
                <div class="row form-group remove_phone mb-4 mt-4">
                    <div class="col col-md-3"></div>
                    <div class="col-12 col-md-3">
                        <input type="tel" name="phones[]" class="form-control" required maxlength="15" placeholder="Phone">
                    </div>
                    <div class="col-md-2">
                    <a href="javascript:void(0);" class="btn btn-danger remove_button" style="margin-left: 15px;">Remove</a>
                    </div>
                </div>`;
            var x = 1; // Initial field counter

            // Add button click event
            $(addButton).click(function () {
                if (x < maxFields) { // Check max fields limit
                    x++;
                    $(wrapper).append(fieldHTML); // Add new phone field
                }
            });

            // Remove button click event
            $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).closest('.remove_phone').remove(); // Remove the phone field group
                x--; // Decrease the field count
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var maxFields = 6; // Maximum number of offer fields
            var addButton = $('.add_offer_button'); // Add button selector for offers
            var wrapper = $('.offer_field_wrapper'); // Field wrapper for offers
            var fieldHTML = `
                <div class="row form-group remove_offer mb-4 mt-4">
                    <div class="col col-md-3"></div>
                    <div class="col-12 col-md-3">
                        <input type="text" name="offers[]" class="form-control" required maxlength="200" placeholder="Offer Description">
                    </div>
                    <div class="col-md-2">
                    <a href="javascript:void(0);" class="btn btn-danger remove_button" style="margin-left: 15px;">Remove</a>
                    </div>
                </div>`;
            var x = 1; // Initial field counter for offers

            // Add button click event for offers
            $(addButton).click(function () {
                if (x < maxFields) { // Check if the max fields limit is not reached
                    x++;
                    $(wrapper).append(fieldHTML); // Append new offer field
                }
            });

            // Remove button click event for offers
            $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).closest('.remove_offer').remove(); // Remove the offer field group
                x--; // Decrease the field count
            });
        });
    </script>
    <script type="text/javascript">
    $(document).ready(function () {
        var maxFields = 6; // Maximum number of sconditions fields
        var addButton = $('.add_sconditions_button'); // Add button selector for sconditions
        var wrapper = $('.sconditions_field_wrapper'); // Field wrapper for sconditions
        var fieldHTML = `
            <div class="row form-group remove_sconditions mb-4 mt-4">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-3">
                    <input type="text" name="sconditions[]" class="form-control" required maxlength="200" placeholder="Sconditions Description">
                </div>
                <div class="col-md-2">
                    <a href="javascript:void(0);" class="btn btn-danger remove_button" style="margin-left: 15px;">Remove</a>
                </div>
            </div>`;
        var x = 1; // Initial field counter for sconditions

        // Add button click event for sconditions
        $(addButton).click(function () {
            if (x < maxFields) { // Check if the max fields limit is not reached
                x++;
                $(wrapper).append(fieldHTML); // Append new sconditions field
            }
        });

        // Remove button click event for sconditions
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).closest('.remove_sconditions').remove(); // Remove the sconditions field group
            x--; // Decrease the field count
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var maxFields = 6; // Maximum number of gconditions fields
        var addButton = $('.add_gconditions_button'); // Add button selector for gconditions
        var wrapper = $('.gconditions_field_wrapper'); // Field wrapper for gconditions
        var fieldHTML = `
            <div class="row form-group remove_gconditions mb-4 mt-4">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-3">
                    <input type="text" name="gconditions[]" class="form-control" required maxlength="200" placeholder="Gconditions Description">
                </div>
                <div class="col-md-2">
                    <a href="javascript:void(0);" class="btn btn-danger remove_button" style="margin-left: 15px;">Remove</a>
                </div>
            </div>`;
        var x = 1; // Initial field counter for gconditions

        // Add button click event for gconditions
        $(addButton).click(function () {
            if (x < maxFields) { // Check if the max fields limit is not reached
                x++;
                $(wrapper).append(fieldHTML); // Append new gconditions field
            }
        });

        // Remove button click event for gconditions
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).closest('.remove_gconditions').remove(); // Remove the gconditions field group
            x--; // Decrease the field count
        });
    });
</script>

       
 <script type="text/javascript">
    $(document).ready(function() {
        // Apply the jQuery Validation plugin to the form
        $('#vendorForm').validate({
            rules: {
                name: {
                    required: true
                },
                state: {
                    required: true
                },
                city: {
                    required: true
                },
                address: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Vendor name is required."
                },
                state: {
                    required: "State is required."
                },
                city: {
                    required: "City is required."
                },
                address: {
                    required: "Address is required."
                }
            },
            errorPlacement: function(error, element) {
                // Insert the error message after the input field
                error.insertAfter(element);
            },
            highlight: function(element, errorClass, validClass) {
                // Highlight the input field in case of error
                $(element).addClass("error").removeClass("valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                // Remove the error styling when input is valid
                $(element).removeClass("error").addClass("valid");
            }
        });
    });
</script>
 </body>
 </html>