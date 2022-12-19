<?php include("../config/constants.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Sign Up</title>
</head>
<body>
    <form class="login-form" action="" method="POST">
        <h1 style="margin-bottom: 20px; text-align: center; color: gray">Sign Up</h1>
        <div class="form-control">
            <label for="fullname" class="form-label">Fullname</label>
            <input class="input-control" id="fullname" type="text" placeholder="chris osei yeboah" name="fullname" required>
        </div>
        <div class="form-control">
            <label for="email" class="form-label">Email</label>
            <input class="input-control" id="email" type="email" placeholder="example@gmail.com" name="email" required>
        </div>
        <div class="form-control">
            <label for="password" class="form-label">Password</label>
            <input class="input-control" id="confirm-password" type="password" placeholder="password" name="password" required>
        </div>
        <div class="form-control">
            <label for="confirmpassword" class="form-label">Confirm Password</label>
            <input class="input-control" id="confirmpassword" type="password" placeholder="confirm password" name="confirmpassword" required>
        </div>

        <div class="input-control">
            <button class="btn-submit" name="submit">Sign up</button>
        </div>
        <?php 
        if(isset($_SESSION['add'])){
            ?>
            <p style="padding: 10px; background-color: red; color: white;"><?php echo $_SESSION['add'];?></p><br>
           <?php
           unset($_SESSION['add']);
        }
        ?>
        
        <div class="signup">Already have an Account? <a href="login.php">Log in here</a></div>
    </form>
</body>
</html>

<?php
//Creating a new user
if(isset($_POST['submit'])){

    //step 1. Fetching form data
    $Fullname = $_POST['fullname'];
    $Email = $_POST['email'];
    $Password = md5($_POST['password']);
    //encrypting password 
    $ConfirmPassword = md5($_POST['confirmpassword']);

    //step 2. verifying password
    if($Password == $ConfirmPassword){
        $sql = "INSERT INTO PUBLIC_PATIENT_RECORD set NAME='$Fullname', EMAIL='$Email', PASSWORD='$Password' ";

        //step 3. Saving data to database
        $res = mysqli_query($conn, $sql);
        if($res){
        //set 4. Redirecting to patient dashboard
        $_SESSION['user'] = $Email;
         header("location:".SITEURL);
        }
        else{
            $_SESSION['add'] = "Failed to create account";
            header("location:".SITEURL.'signup.php');
        }
    }
    else{
        $_SESSION['add'] = "Password did not match";
        header("location:".SITEURL.'signup.php');
    }
   
}
?>