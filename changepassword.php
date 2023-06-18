<?php

define('TITLE','Change Password');
define('PAGE', 'changepassword');
include('source/header.php');
include('source/db_connect.php');
include('source/session.php');
if($_SESSION['is_login'])
{
    $rEmail = $_SESSION['rEmail'];
}
else
{
    echo "<script> location.href='login.php'</script>";
}

if(isset($_REQUEST['passupdate']))
{
    if($_REQUEST['rPassword'] == "")
    {
        $passmsg = '<script>alert("Fill All Fields");</script>';
        echo $passmsg;
    }
    else
    {
        $rpass = $_REQUEST['rPassword'];
        $SQLInsert = "UPDATE requesterlogin_db SET r_password = '$rpass' WHERE r_email = '$rEmail'";
        if($conn->query($SQLInsert) == TRUE)
        {   
            $passmsg = '<script>alert("Updated Successfully");</script>';
            echo $passmsg;
        }
        else
        {
            $passmsg = '<script>alert("Unabled to Update");</script>';
            echo $passmsg;
        }
    }
}

?>

<!------start user change password from 2nd column------->
            <div class="col-sm-6" style="margin-top: 55px; margin-right: 430px;">
                <form class="mx-5" action="changepassword.php" method="POST">
                <h3>Change Password</h3>
                    <div class="form-group">
                        <label for="rEmail">Email</label><input type="email" class="form-control" name="rEmail" id="rEmail" value="<?php echo $rEmail ?>" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="inputnewpassword">New Password</label><input type="password" class="form-control" placeholder="New Password" name="rPassword" id="inputnewpassword">
                    </div>
                    <br>
                    <button type="submit" class="hero-btn mb-2 btn-primary text-white shadow-sm" name="passupdate">Submit</button>
                    <button type="reset" class="hero-btn mb-2 btn-secondary text-white shadow-sm">Reset</button>
                    <?php if(isset($passmsg)) {echo $passmsg;} ?>
                </form>
            </div>

<?php
include('source/footer.php');
?>