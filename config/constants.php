<?php 
//starting session
session_start();

//SITE URL CONSTANT VARIABLE
define('SITEURL', 'http://localhost/Nyaho-Medical/admin/');

//Database credentials 
define('HOST', 'localhost');
define('DB_USERNAME', 'softwarerecruit');
define('DB_PASSWORD', 'NyahoNyaho1234');
define('DB_NAME', 'dev');

//Connecting to database
$conn = mysqli_connect(HOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
$db_select = mysqli_select_db($conn, DB_NAME) or dis(mysqli_error());

?>