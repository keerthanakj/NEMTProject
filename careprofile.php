<?php
define('TITLE','Caretaker Profile');
define('PAGE', 'careprofile');
include('source/careheader.php');
include('source/db_connect.php');
include('source/session.php');
if(isset($_SESSION['is_careridelogin']))
{
    $cEmail = $_SESSION['cEmail'];
}
else
{
    echo "<script> location.href='careridelogin.php'</script>";
}
$SQLInsert = "SELECT c_name, c_email, c_city, c_phone FROM careridelogin_db WHERE c_email = '$cEmail'";
$result = $conn->query($SQLInsert);
if($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $cName = $row['c_name'];
    $cCity = $row['c_city'];
    $cPhone = $row['c_phone'];
}
if(isset($_REQUEST['profileupdate']))
{
    if(($_REQUEST['cName'] == "") || ($_REQUEST['cPhone'] == "") || ($_REQUEST['cCity'] == ""))
    {
        $passmsg = '<script>alert("Fill All Fields");</script>';
        echo $passmsg;
    }
    else
    {
        $cName = $_REQUEST['cName'];
        $cCity = $_REQUEST['cCity'];
        $cPhone = $_REQUEST['cPhone'];
        $SQLInsert = "UPDATE careridelogin_db SET c_name = '$cName', c_city = '$cCity', c_phone = '$cPhone' WHERE c_email = '$cEmail'";
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
if(isset($_REQUEST['delete'])){
    $SQLInsert = "DELETE FROM careridelogin_db WHERE c_login_id = {$_REQUEST['id']}";
    if($conn->query($SQLInsert) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
    }

?>
<!-------start profile area 2nd column------->
<div class="col-sm-6" style="margin-top: 55px; margin-right: 430px;"> 
                <form action="" mathod="POST" class="mx-5">
                <h3>Profile</h3>
                    <div class="form-group">
                        <label for="cEmail">Email</label><input type="email" class="form-control" name="cEmail" id="cEmail" value="<?php echo $cEmail ?>" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="cName">Name</label><input type="text" class="form-control" name="cName" id="cName" value="<?php echo $cName ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="cName">Phone no</label><input type="text" class="form-control" name="cPhone" id="cPhone" value="<?php echo $cPhone ?> ">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="cCity">City</label><input type="text" class="form-control" name="cCity" id="cCity" value="<?php echo $cCity ?> ">
                    </div>
                    <br>
                    <button type="submit" class="hero-btn mb-2 bg-primary text-white shadow-sm" name="profileupdate">Update</button>
                    <button type="submit" class="hero-btn mb-2 bg-primary text-white shadow-sm" name="delete">Delete Account</button>
                    <br>
                </form> 
            </div>
            <!-------end profile area 2nd column------->


<?php
include('source/carefooter.php');
?>