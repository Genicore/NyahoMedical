<?php 
include("../config/constants.php");

//Destroying all sessions
session_destroy();

//redirecting to login page
header('location:'.SITEURL."login.php");
?>