<?php

session_start();

include 'connection.php';

unset($_SESSION['USERS_USERID']);
session_destroy();
header("location: index.php");
		
?>