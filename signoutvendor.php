<?php

session_start();

include 'connection.php';

unset($_SESSION['Vendor_ID']);
session_destroy();
header("location: index.php");
		
?>