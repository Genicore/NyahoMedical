<?php
//Checking if user is logged in
if(!isset($_SESSION['user'])){
    $_SESSION['auth'] = "Not Authorised!";
    header('location:'.SITEURL."login.php");
}
?>