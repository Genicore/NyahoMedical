<?php include("../config/constants.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>login</title>
</head>
<body>
    <form class="login-form" action="" method="POST">
        <h1 style="margin-bottom: 20px; text-align: center; color: gray">login</h1>
        <div class="form-control">
            <label for="email" class="form-label">Email</label>
            <input class="input-control" id="email" type="email" placeholder="example@gmail.com" name="email" required>
        </div>
        <div class="form-control">
            <label for="password" class="form-label">Password</label>
            <input class="input-control" id="email" type="password" placeholder="password" name="password" required>
        </div>

        <div class="input-control">
            <button class="btn-submit" name="login">Login</button>
        </div>
        <?php 
        if(isset($_SESSION['add'])){
            ?>
            <p style="padding: 10px; background-color: red; color: white;"><?php echo $_SESSION['add'];?></p><br>
           <?php
           unset($_SESSION['add']);
        }
        if(isset($_SESSION['password'])){
            ?>
            <p style="padding: 10px; background-color: skyblue;"><?php echo $_SESSION['password'];?></p><br>
           <?php
           unset($_SESSION['password']);
        }
        if(isset($_SESSION['auth'])){
            ?>
            <p style="padding: 10px; background-color: red; color: white;"><?php echo $_SESSION['auth'];?></p><br>
           <?php
           unset($_SESSION['auth']);
        }
        ?>
        <div class="signup">Don't have an Account? <a href="signup.php">Sign up here</a></div>
    </form>
</body>
</html>

<?php 
//login 
if(isset($_POST['login'])){
//step 1. Fetching user credentials
$Email = $_POST['email'];
$Password = md5($_POST['password']);

//step 2. Query to validating credentails
$sql = "SELECT * FROM PUBLIC_PATIENT_RECORD WHERE EMAIL='$Email' && PASSWORD='$Password'"; 
$res = mysqli_query($conn, $sql);

//step 3. Checking if user exists
$count = mysqli_num_rows($res);

if($count==1){
    $_SESSION['user'] = $Email;
    header('location:'.SITEURL);
   
}
else{
    $_SESSION['add'] = "Invalid Username or Password";
    header('location:'.SITEURL."login.php");
  
}
}

?>