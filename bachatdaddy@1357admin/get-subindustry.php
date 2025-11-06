<?php
include '../config/config.php';
include 'functions\bachatdaddyfunction.php';
$common = new Common();

error_reporting(E_ALL); 
ini_set('display_errors', 1);

if (isset($_POST['industry_name']) && !empty($_POST['industry_name'])) {
    $industryName = $_POST['industry_name'];
    
    // Assuming you have a function to get subindustries by industry
    $subindustries = $common->getSubindustriesByIndustry($industryName);
    
    if ($subindustries) {
        foreach ($subindustries as $subindustry) {
            echo '<option value="' . htmlspecialchars($subindustry['id']) . '">' . htmlspecialchars($subindustry['name']) . '</option>';
        }
    } else {
        echo '<option value="">No subindustries available</option>';
    }
} else {
    echo '<option value="">Select Industry first</option>';
}
?>
