<?php 
include("../config/constants.php");

//checking if submit button is clicked
if(isset($_POST['submit'])){
    //getting form input   
    $id = $_POST['cus_id'];
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $city = $_POST['city'];
   
    //updating user info
    $sql = "UPDATE PUBLIC_PATIENT_RECORD SET 
    NAME='$fullname',
    GENDER='$gender',
    PHONE='$mobile',
    ADDRESS='$address',
    EMAIL='$email',
    DATE_OF_BIRTH='$dob',
    CITY='$city' WHERE USER_ID='$id'";
   
    //Executing update
    $res = mysqli_query($conn, $sql);
   
    //Checking if update was successful
    if($res){
       $_SESSION['update'] = "USER INFO UPDATE SUCCESSFUL";
       header("location:".SITEURL."patient.php?id=$id");
    }
    else{
       $_SESSION['failed']= "FAILED TO UPDATE INFO";
       header('location:'.SITEURL."patient.php?id=$id");
    }
   }
?>