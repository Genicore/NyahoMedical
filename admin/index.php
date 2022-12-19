<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Nyaho Medical</title>
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
        <?php 
        //Getting Logged in user 
        $email = $_SESSION['user'];
        $sql = "SELECT * FROM PUBLIC_PATIENT_RECORD WHERE EMAIL='$email'";
        $res = mysqli_query($conn, $sql);

        if($res){
        $rows = mysqli_num_rows($res);
        if($rows==1){
        $row = mysqli_fetch_assoc($res);
        
        $user_id = $row['USER_ID'];
        $name = $row['NAME'];
        $gender = $row['GENDER'];
        $phone = $row['PHONE'];
        $email = $row['EMAIL'];
        $address = $row['ADDRESS'];
        $dob = $row['DATE_OF_BIRTH'];
        $age = (date('Y') - date('Y', strtotime($dob)));
        $city = $row['CITY'];

    }
}
        ?>
        <!--Main section-->
        <div class="section">
            <div class="section-title">
                <h3>PROFILE</h3>
                <a class="btn-primary" href="patient.php?id=<?php echo $user_id ?>">Edit</a>
            </div>

            <div class="section-body">
                <div class="profile-image">
                    <h1>Image</h1>
                </div>
                <div class="info">
                    <h4 style="color: gray;">Info</h4>
                <p><strong>Fullname: </strong><?php echo $name?></p> 
                <p><strong>Age: </strong><?php echo $age?></p> 
                <p><strong>Gender: </strong><?php echo $gender ?></p> 
                <p><strong>Telephone: </strong><?php echo $phone ?></p> 
                <p><strong>Address: </strong><?php echo $address ?></p> 
                <p><strong>Email: </strong><?php echo $email?></p> 
                <p><strong>City: </strong><?php echo $city ?></p> 
                </div>
            </div>
            <div class="section-table">
                <div class="section-title">
                    <h3>RECENT APPOINTMENTS</h3>
                </div>
                <div class="table-wrapper">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>DOCTOR</th>
                            <th>BRANCH</th>
                            <th>DATE </th>
                        </tr>
                        <tr>
                            <td>1002</td>
                            <td>Nelson Antwi</td>
                            <td>Airport Main</td>
                            <td>2022-08-12</td>
                        </tr>
                        <tr>
                            <td>1003</td>
                            <td>Stephen Sarpong</td>
                            <td>Airport Main</td>
                            <td>2022-08-14</td>
                        </tr>
                        <tr>
                            <td>1004</td>
                            <td>Jude Blackson</td>
                            <td>Airport Main</td>
                            <td>2022-09-05</td>
                        </tr>
                        <tr>
                            <td>1005</td>
                            <td>Chris Hackman</td>
                            <td>Airport Main</td>
                            <td>2022-09-28</td>
                        </tr>
                        <tr>
                            <td>1006</td>
                            <td>Stephen Sarpong</td>
                            <td>Airport Main</td>
                            <td>2022-11-12</td>
                        </tr>
                        <tr>
                            <td>1007</td>
                            <td>Nelson Antwi</td>
                            <td>Airport Main</td>
                            <td>2022-12-01</td>
                        </tr>
    
                    </table>
                </div>
            </div>

        </div>
        <!--End of main section-->
    </div>
</div>
</body>
</html>