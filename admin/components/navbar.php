<?php 
include("../config/constants.php");
include("LoginCheck.php");

//Getting Logged in user 
$email = $_SESSION['user'];
$sql = "SELECT NAME FROM PUBLIC_PATIENT_RECORD WHERE EMAIL='$email'";
$res = mysqli_query($conn, $sql);

if($res){
    $rows = mysqli_num_rows($res);
    if($rows==1){
        $row = mysqli_fetch_assoc($res);

         $name = $row['NAME'];
        $firstname = strtoupper(strtok($name, " "));       
    }
}
?>
<div class="navbar">
            <div class="wrapper">
                <div class="searchbox">
                    <input type="text" name="search" placeholder="Search...">
                    <i class="fa fa-search search-icon"></i>
                </div>
                <div class="widgets">
                    <div class="notification">
                        <i class="fa fa-bell"></i>
                        <div class="counter">1</div>
                    </div>
                    <div class="dropdown">
                       <div class="btn-wrapper">
                       <button class="dropbtn" style="padding: 0px;"><?php echo $firstname?></button>
                       <i class="fa fa-caret-down" style="margin-left: 2px"></i>
                       </div>
                        <div class="dropdown-content">
                            <a href="changePassword.php">Change Password</a>
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>