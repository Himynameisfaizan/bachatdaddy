<?php
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
$common = new Common();

error_reporting(E_ALL); 
ini_set('display_errors', 1);

if (isset($_POST['state_name']) && !empty($_POST['state_name'])) {
    $stateName = $_POST['state_name'];
    $cities = $common->getCitiesByState($stateName);
    
    if ($cities) {
        foreach ($cities as $city) {
            echo '<option value="' . $city['id'] . '">' . htmlspecialchars($city['city']) . '</option><br>';
        }
    } else {
        echo '<option value="">No cities available</option>';
    }
} else {
    echo '<option value="">Select State first</option>';
}
?>
