<?php
define('TITLE','Change Password');
define('PAGE', 'adminchangepass');
include('source/adminheader.php');
include('source/db_connect.php');
include('source/session.php');
if(isset($_SESSION['is_adminlogin']))
{
    $aEmail = $_SESSION['aEmail'];
}
else
{
    echo "<script> location.href='adminlogin.php'</script>";
}
$aEmail = $_SESSION['aEmail'];
if(isset($_REQUEST['passupdate']))
{
    if($_REQUEST['aPassword'] == "")
    {
        $passmsg = '<script>alert("Fill All Fields");</script>';
        echo $passmsg;
    }
    else
    {
        $aPassword  = $_REQUEST['aPassword'];
        $SQLInsert = "UPDATE adminlogin_db SET a_password = '$aPassword ' WHERE a_email = '$aEmail'";
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
                <form class="mx-5" action="adminchangepass.php" method="POST">
                <h3>Change Password</h3>
                    <div class="form-group">
                        <label for="aEmail">Email</label><input type="email" class="form-control" name="aEmail" id="aEmail" value="<?php echo $aEmail ?>" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="inputnewpassword">New Password</label><input type="password" class="form-control" placeholder="New Password" name="aPassword" id="inputnewpassword">
                    </div>
                    <br>
                    <button type="submit" class="hero-btn mb-2 btn-primary text-white shadow-sm" name="passupdate">Submit</button>
                    <button type="reset" class="hero-btn mb-2 btn-secondary text-white shadow-sm">Reset</button>
                    <?php if(isset($passmsg)) {echo $passmsg;} ?>
                </form>
            </div>

<?php
include('source/adminfooter.php');
?>