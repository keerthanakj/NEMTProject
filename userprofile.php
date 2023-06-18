<?php

define('TITLE', 'Profile');
define('PAGE', 'userprofile');
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
$SQLInsert = "SELECT r_name, r_email FROM requesterlogin_db WHERE r_email = '$rEmail'";
$result = $conn->query($SQLInsert);
if($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $rName = $row['r_name'];
}

if(isset($_REQUEST['nameupdate']))
{
    if($_REQUEST['rName'] == "")
    {
        $passmsg = '<script>alert("Fill All Fields");</script>';
        echo $passmsg;
    }
    else
    {
        $rName = $_REQUEST['rName'];
        $SQLInsert = "UPDATE requesterlogin_db SET r_name = '$rName' WHERE r_email = '$rEmail'";
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


            <!-------start profile area 2nd column------->
            <div class="col-sm-6" style="margin-top: 55px; margin-right: 430px;"> 
                <form action="" mathod="POST" class="mx-5">
                <h3>Profile</h3>
                    <div class="form-group">
                        <label for="rEmail">Email</label><input type="email" class="form-control" name="rEmail" id="rEmail" value="<?php echo $rEmail ?>" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="rName">Name</label><input type="text" class="form-control" name="rName" id="rName" value="<?php echo $rName ?>">
                    </div>
                    <br>
                    <button type="submit" class="hero-btn mb-2 bg-primary text-white shadow-sm" name="nameupdate">Update</button>
                    <br>
                </form> 
            </div>
            <!-------end profile area 2nd column------->
<?php
include('source/footer.php');
?>