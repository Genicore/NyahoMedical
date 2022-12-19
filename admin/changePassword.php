<?php include("../config/constants.php");
include("components/LoginCheck.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Account</title>
</head>
<body>
    <form class="login-form" action="" method="POST">
        <h1 style="margin-bottom: 20px; text-align: center; color: gray">Change Password</h1>
        <div class="form-control">
            <label for="oldpassword" class="form-label">Old Password:</label>
            <input class="input-control" id="oldpassword" type="password" placeholder="old password" name="oldpassword" required>
        </div>
        <div class="form-control">
            <label for="newpassword" class="form-label">New Password:</label>
            <input class="input-control" id="newpassword" type="password" placeholder="new password" name="newpassword" required>
        </div>
        <div class="form-control">
            <label for="confirmpassword" class="form-label">Confirm Password</label>
            <input class="input-control" id="confirm-password" type="password" placeholder="confirm password" name="password" required>
        </div>

        <div class="input-control">
            <button class="btn-submit" type="submit" name="submit">Update</button>
        </div>
        <?php 
        if(isset($_SESSION['add'])){
            ?>
            <p style="padding: 10px; background-color: red; color: white;"><?php echo $_SESSION['add'];?></p><br>
           <?php
           unset($_SESSION['add']);
        }
        ?>
</body>
</html>
<?php 
$email = $_SESSION['user'];
if(isset($_POST['submit'])){
    //fetching data from form
   echo $oldpassword = md5($_POST['oldpassword']);
    $newpassword = md5($_POST['newpassword']);
    $password = md5($_POST['password']);

    //verifying old password
    $sql = "SELECT PASSWORD FROM PUBLIC_PATIENT_RECORD WHERE PASSWORD='$oldpassword' AND EMAIL='$email'";
    //executing query
    $res = mysqli_query($conn, $sql);
    if($res){
        //checking if a match was found
        $count = mysqli_num_rows($res);
        if($count == 1){
            //if a match was found then set new password
            //check if new password has been confirmed
            if($newpassword == $password){
                $sql = "UPDATE PUBLIC_PATIENT_RECORD SET PASSWORD='$password' WHERE EMAIL='$email' ";
                $res = mysqli_query($conn, $sql);
                if($res){
                    $_SESSION['password'] = "PASSWORD CHANGED SUCCESSFULLY";
                    header("location:".SITEURL."login.php");
                    //Destroying all sessions
                }
            }
            else{
                $_SESSION['add'] = "PASSWORD DID NOT MATCH";
                header("location:".SITEURL."changePassword.php");
            }
        }
        else{
            $_SESSION['add'] = "WRONG PASSWORD";
            header("location:".SITEURL."changePassword.php");
        }
    }
}

?>