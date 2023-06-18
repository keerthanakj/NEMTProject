<?php

include('source/db_connect.php');
include('source/session.php');
if(!isset($_SESSION['is_login']))
{
    if(isset($_REQUEST['rEmail']))
    {
        $rEmail = mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
        $rPassword = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));
        $SQLInsert = "SELECT r_email, r_password FROM requesterlogin_db WHERE r_email = '".$rEmail."' AND r_password = '".$rPassword."' limit 1";
        $result = $conn->query($SQLInsert);
        if($result->num_rows == 1)
        {
            $_SESSION['is_login'] = true;
            $_SESSION['rEmail'] = $rEmail;
            echo "<script>location.href='userprofile.php';</script>";
            exit;
        }
        else
        {
            $msg = '<script>alert("Invalid Email or Password");</script>';
            echo $msg;
        }
    }
}
else
{
    echo "<script>location.href='userprofile.php';</script>"; 
    echo $msg;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="link/css/bootstrap.min.css">
    <script src="link/js/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/3073eef095.js" crossorigin="anonymous"></script>

    <title>Login</title>
</head>
<body>
    <div class="mt-5 text-center" style="font-size: 30px;">
    <i class="fas fa-ambulance text-primary"></i>
        <span>Non-Emergency Medical Transportation System</span>
    </div>
    <br>
    <p class="font-weight-bold text-center" style="font-size: 20px;"><i class="fas fa-sign-in-alt text-primary"></i> Login</a></p>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-5">
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control" placeholder="Email" name="rEmail">
                        <small class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    <br>
                    <div>
                        <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label><input type="password" class="form-control" placeholder="Password" name="rPassword">
                    </div>
                    <br>
                    <button type="submit" class="hero-btn mb-2 bg-primary text-white shadow-sm">Login</button>
                </form>
                <div class="text-center"><a href="home.php" class="btn btn-info mt-3 font-weight-bold shadow-sm text-white">Back to Home</a></div>
            </div>
        </div>
    </div>
    <!-------javascript------>
    <script src="link/js/all.min.js"></script>
    <script src="link/js/bootstrap.min.js"></script>
    <script src="link/js/jquery.min.js"></script>
    <script src="link/js/popper.min.js"></script>
    <script src="link/js/sweetalert.min.js"></script>
</body>
</html>