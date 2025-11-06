<?php

include '../config/config.php';
include 'functions/bachatdaddyfunction.php';

$vendor=new Vendor();

if(isset($_REQUEST['deleteImages']) && isset($_REQUEST['id'])){
	$imgId = $_REQUEST['id'];

  
  $imageData = $vendor->getImage($imgId);
  if ($imageData) {
    $imagePath = "adminuploads/images/vendors/" . $imageData['image'];//add the path 

   
    if (file_exists($imagePath)) {
        if (unlink($imagePath)) {
          error_log("Successfully deleted image: " . $imagePath);
        } else {
          error_log("Failed to delete image: " . $imagePath);
        }
    } else {
      error_log("Image file does not exist: " . $imagePath);
    }
    $result=$vendor->deleteImg($imgId);
    if ($result) {
      error_log("Successfully deleted record for image ID: " . $imgId);
    } else {
      error_log("Failed to delete record for image ID: " . $imgId);
    }
  } else {
    error_log("No image found for image ID: " . $imgId);
  }
} 

if(isset($_REQUEST['deleteSCondition']) && isset($_REQUEST['id'])){
  $SId = $_REQUEST['id'];
  $SData = $vendor->getVendorScondition($SId);
  if ($SData) {
    $result=$vendor->deleteVendorScondition($SId);
    if ($result) {
      error_log("Successfully deleted record for image ID: " . $imgId);
    } else {
      error_log("Failed to delete record for image ID: " . $imgId);
    }
  } else {
    error_log("No image found for image ID: " . $imgId);
  }

}

if(isset($_REQUEST['deleteGCondition']) && isset($_REQUEST['id'])){
  $SId = $_REQUEST['id'];
  $SData = $vendor->getVendorGcondition($SId);
  if ($SData) {
    $result=$vendor->deleteVendorGcondition($SId);
    if ($result) {
      error_log("Successfully deleted record for image ID: " . $imgId);
    } else {
      error_log("Failed to delete record for image ID: " . $imgId);
    }
  } else {
    error_log("No image found for image ID: " . $imgId);
  }

}

if(isset($_REQUEST['deleteOffer']) && isset($_REQUEST['id'])){
  $SId = $_REQUEST['id'];
  $SData = $vendor->getVendorOffer($SId);
  if ($SData) {
    $result=$vendor->deleteVendorOffer($SId);
    if ($result) {
      error_log("Successfully deleted record for image ID: " . $imgId);
    } else {
      error_log("Failed to delete record for image ID: " . $imgId);
    }
  } else {
    error_log("No image found for image ID: " . $imgId);
  }

}

if(isset($_REQUEST['deletePhone']) && isset($_REQUEST['id'])){
  $SId = $_REQUEST['id'];
  $SData = $vendor->getVendorPhone($SId);
  if ($SData) {
    $result=$vendor->deleteVendorPhone($SId);
    if ($result) {
      error_log("Successfully deleted record for image ID: " . $imgId);
    } else {
      error_log("Failed to delete record for image ID: " . $imgId);
    }
  } else {
    error_log("No image found for image ID: " . $imgId);
  }

}

if(isset($_REQUEST['deleteEmail']) && isset($_REQUEST['id'])){
  $SId = $_REQUEST['id'];
  $SData = $vendor->getVendorEmail($SId);
  if ($SData) {
    $result=$vendor->deleteVendorEmail($SId);
    if ($result) {
      error_log("Successfully deleted record for image ID: " . $imgId);
    } else {
      error_log("Failed to delete record for image ID: " . $imgId);
    }
  } else {
    error_log("No image found for image ID: " . $imgId);
  }

}

?>