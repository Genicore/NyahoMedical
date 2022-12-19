<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Patient</title>
</head>
<body>
<div class="site-container"> 
    <!--sidenav component-->
    <?php include("components/sidebar.php");?>
    <!--End of sidenav-->

    <div class="main-content">
        <!--navbar component-->
        <?php include("components/navbar.php");?>
        <!--End of navbar-->

        <!--Main section-->
        
       <?php 
       //Getting patient info to fill update form
       //step 1. getting passed id
       $id = $_GET['id'];
       $sql = "SELECT * FROM public_patient_record WHERE USER_ID='$id'";

       $res = mysqli_query($conn, $sql);
        $male_checked="";
        $female_checked="";
        
       if($res){
        $count = mysqli_num_rows($res);
        if($count == 1){
            $row = mysqli_fetch_assoc($res);
            $name = $row['NAME'];
            $gender = $row['GENDER'];
            $phone = $row['PHONE'];
            $email = $row['EMAIL'];
            $address = $row['ADDRESS'];
            $dob = $row['DATE_OF_BIRTH'];
            $city = $row['CITY'];
            
            
            if($gender=="Male"){
                $male_checked = "checked";
            }
            else if($gender=="Female"){
                $female_checked = "checked";
            }
            
    
        }
       }
       ?>
        <div class="section">
                 <div class="section-title">
                     <h3>USER PROFILE</h3>

                 </div>
     
                 <div class="section-body">
                     <form class="form" method="POST" action="updateUser.php">
                     <?php 
        if(isset($_SESSION['update'])){
            ?>
            <p style="padding: 10px; background-color: skyblue;"><?php echo $_SESSION['update'];?></p><br>
           <?php
           unset($_SESSION['update']);
        }
        ?>

<?php 
        if(isset($_SESSION['failed'])){
            ?>
            <p style="padding: 10px; background-color: red; color: white;"><?php echo $_SESSION['failed'];?></p><br>
           <?php
           unset($_SESSION['failed']);
        }
        ?>
                        <div class="form-control">
                            <input type="hidden" name="cus_id" value="<?php echo $id?>">
                            <label for="fullname" class="input-label">Fullname:</label>
                            <input name="fullname" id="fullname" type="text" placeholder="fullname" 
                            class="input-control" value="<?php echo $name?>" required>
                        </div>
                        <div class="form-control">
                            <label for="dob" class="input-label">Date of Birth:</label>
                            <input name="dob" id="dob" type="date" class="input-control" value="<?php echo $dob?>"  required>
                        </div>
                        <div class="form-control">
                            <label for="gender" class="input-label">Gender:</label>
                            <div class="radio-control">
                                <label class="radio-label">
                                <input  class="radio-input" name="gender" id="gender" type="radio" value="Male" <?php echo $male_checked ?> required>Male
                                </label>
                                <label class="radio-label">
                                    <input  class="radio-input" name="gender" id="gender" type="radio" value="Female" <?php echo $female_checked ?> required>Female
                                </label>
                            </div>
                            
                           
                        </div>
                        <div class="form-control">
                            <label for="mobile" class="input-label">Mobile:</label>
                            <input name="mobile" id="mobile" type="text" placeholder="mobile" 
                            class="input-control" value="<?php echo $phone?>" required>
                        </div>
                        <div class="form-control">
                            <label for="address" class="input-label">Address:</label>
                            <textarea name="address" id="address" type="text" placeholder="address" 
                            class="input-control" required><?php echo $address ?></textarea>
                        </div>
                        <div class="form-control">
                            <label for="email" class="input-label">Email:</label>
                            <input name="email" id="email" type="email" placeholder="example@gmail.com" 
                            class="input-control" value="<?php echo $email?>" required>
                        </div>
                        <div class="form-control">
                            <label for="city" class="input-label">City:</label>
                            <input name="city" id="city" type="text" placeholder="city" 
                            class="input-control" value="<?php echo $city?>" required>
                        </div>

                        <div class="input-control">
                           <button type="submit" name="submit" class="btn-submit">UPDATE</button>
                        </div>
                     </form>
                 </div>
     
             </div>
        <!--End of main section-->
    </div>
</div>
</body>
</html>


