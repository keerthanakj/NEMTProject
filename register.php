<?php

include('source/db_connect.php');

if(isset($_REQUEST['rSignup']))
{
    //checking for empty field
    if(($_REQUEST['rName'] == "")||($_REQUEST['rEmail'] == "")||($_REQUEST['rPassword'] == ""))
    {
        $regmsg = '<script>alert("All fields are required");</script>';
        echo $regmsg;
    }
    else
    {
        //email id already registered
        $SQLInsert = "SELECT r_email FROM requesterlogin_db WHERE r_email = '".$_REQUEST['rEmail']."'";
        $result = $conn->query($SQLInsert);
        if($result->num_rows == 1)
        {
            $regmsg = '<script>alert("Email Id Already Registered");</script>';
            echo $regmsg;
        }
        else
        {
            //assigning  user values to variables
            $rName = $_REQUEST['rName'];
            $rEmail = $_REQUEST['rEmail'];
            $rPassword = $_REQUEST['rPassword'];

            $SQLInsert = "INSERT INTO requesterlogin_db(r_name, r_password, r_email, to_date) VALUES('$rName', '$rPassword', '$rEmail', now())";
            if($conn->query($SQLInsert) == TRUE)
            {
                $regmsg = '<script>alert("Account Created Successfully");</script>';
                echo $regmsg;
            } 
            else
            {
                $regmsg = '<script>alert("Unabled to create Account");</script>';
                echo $regmsg;
            }
        }
    }
}

?>

<div class="container pt-5">
        <h1 class="text-center">Create an Account</h1>
        <div class="row mt-4 mb-4">
            <div class="col-md-6 offset-md-3">
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group">
                        <i class="fas fa-user"></i> <label for="pass" class="font-weight-bold p1-2">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="rName">
                    </div>
                    <br>
                    <div class="form-group">
                        <i class="fas fa-user"></i> <label for="pass" class="font-weight-bold p1-2">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="rEmail">
                        <small class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    <br>
                    <div class="form-group">
                        <i class="fas fa-key"></i> <label for="pass" class="font-weight-bold p1-2">New Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="rPassword">
                    </div>
                    <br>
                    <button type="submit" class="hero-btn mb-2 bg-primary text-white" name="rSignup">Sign Up</button>
                    <br>
                    <em style="font-size:12px;">Note - By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy</em>
                </form>
            </div>
        </div>
    </div>