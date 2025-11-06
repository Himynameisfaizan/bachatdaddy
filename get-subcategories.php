<?php
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
$common = new Common();

// Enable error logging for PHP
error_reporting(E_ALL); 
ini_set('display_errors', 1);

if (isset($_POST['industry_id']) && !empty($_POST['industry_id'])) {

    $industryId = $_POST['industry_id'];
    
    // Fetch subcategories
    $subcategories = $common->getsubByIdustry($industryId);
    
    if ($subcategories) {
        foreach ($subcategories as $subcategory) {
            echo '<option value="' . $subcategory['id'] . '">' . $subcategory['name'] . '</option>';
        }
    } else {
        echo '';  // If no subcategories, return empty
    }
} else {
    echo '';  // If no industry_id, return empty
}
?>

