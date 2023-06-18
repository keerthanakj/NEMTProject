<?php
define('TITLE','Request');
define('PAGE', 'request');
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

?>

<!----start 2nd column---->
            <div class="col-sm-4 mt-5" style="margin-right: 600px;">
                <?php
                    $SQLInsert = "SELECT service_id, p_name, category, a_date, a_time FROM submitrequest_db";
                    $result = $conn->query($SQLInsert);
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                            echo '<div class="card mt-3">';
                                echo '<div class="card-header">';
                                    echo 'Service ID:'.$row['service_id'];
                                echo '</div>';
                                echo '<div class="card-body">';
                                    echo '<h5 class="card-title">Patient Name:'.$row['p_name'];
                                    echo '</h5>';
                                    echo '<p class="card-text">'.$row['category'];
                                    echo '</p>';
                                    echo '<p class="card-text">Appointment Date:'.$row['a_date'];
                                    echo '</p>';
                                    echo '<p class="card-text">Appointment Time:'.$row['a_time'];
                                    echo '</p>';
                                    echo '<div class="float-right">';
                                        echo '<div>';
                                            echo '<form action="" method="POST">';
                                                echo '<input type="hidden" name="id" value='.$row["service_id"].'>';
                                                echo '<input type="submit" class="btn btn-primary" value="View" name="view">';
                                                echo '<input type="submit" class="btn btn-secondary mx-2" value="Close" name="close">';
                                            echo '</form>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
<!----end  2nd column----->

<?php
if(isset($_REQUEST['view']))
{
$SQLInsert = "SELECT * FROM submitrequest_db WHERE service_id = {$_REQUEST['id']}";
$result = $conn->query($SQLInsert);
$row = $result->fetch_assoc();
}
if(isset($_REQUEST['close']))
{
    $SQLInsert = "DELETE FROM submitrequest_db WHERE service_id = {$_REQUEST['id']}";
    if($conn->query($SQLInsert) == TRUE)
    {
        echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
    }
    else
    {
        echo 'Unable to Delete';
    }
}
if(isset($_REQUEST['assign']))
{
    if(($_REQUEST['service_id'] == "") || ($_REQUEST['pname'] == "") || ($_REQUEST['rgender'] == "") || ($_REQUEST['rcate'] == "") || ($_REQUEST['rdis'] == "") || ($_REQUEST['raddress'] == "") || ($_REQUEST['rcity'] == "") || ($_REQUEST['rstate'] == "") || ($_REQUEST['rpin'] == "") || ($_REQUEST['rphone'] == "")
    || ($_REQUEST['rhname'] == "") || ($_REQUEST['rhaddress'] == "") || ($_REQUEST['rhcity'] == "") || ($_REQUEST['rhstate'] == "") || ($_REQUEST['rhpin'] == "") || ($_REQUEST['radate'] == "") ||($_REQUEST['ratime'] == "") || ($_REQUEST['vehical'] == "") || ($_REQUEST['careride'] == ""))
    {
        $msg = "<script>alert('Fill all fields');</script>";
        echo $msg;
    }
    else
    {
        $sid = $_REQUEST['service_id'];
        $pname = $_REQUEST['pname'];
        $rgender = $_REQUEST['rgender'];
        $rcate = $_REQUEST['rcate'];
        $raged = $_REQUEST['raged'];
        $rdisabled =$_REQUEST['rdisabled'];
        $rdis = $_REQUEST['rdis'];
        $raddress = $_REQUEST['raddress'];
        $rcity = $_REQUEST['rcity'];
        $rstate = $_REQUEST['rstate'];
        $rpin = $_REQUEST['rpin'];
        $rphone = $_REQUEST['rphone'];
        $rhname = $_REQUEST['rhname'];
        $rhaddress = $_REQUEST['rhaddress'];
        $rhcity = $_REQUEST['rhcity'];
        $rhstate = $_REQUEST['rhstate'];
        $rhpin = $_REQUEST['rhpin'];
        $radate = $_REQUEST['radate'];
        $ratime = $_REQUEST['ratime'];
        $vehical = $_REQUEST['vehical'];
        $careride = $_REQUEST['careride'];
        $rfile = $_REQUEST['myfile'];
        
            $SQLInsert = "INSERT INTO assignservice_db (service_id,p_name,gender,category,p_aged,p_disabled,p_dis,p_address,p_city,p_state,p_pincode,p_phone,h_name,h_address,h_city,h_state,h_pincode,a_date,a_time,a_file,assign_vehical,assign_careride) VALUES('$sid','$pname','$rgender','$rcate','$raged','$rdisabled','$rdis','$raddress','$rcity','$rstate','$rpin','$rphone','$rhname','$rhaddress','$rhcity','$rhstate','$rhpin','$radate','$ratime','$rfile','$vehical','$careride')";
            if($conn->query($SQLInsert) == TRUE) 
            {
                $msg = "<script>alert('Assigned Submitted Successfully');</script>";
                echo $msg;
            }   
            else
            {
                $msg = "<script>alert('Unabled to Assign Service');</script>";
                echo $msg;
            }
        
    }
}
?>



<div class="card col-sm-5 mt-5" style="margin-left: -570px;">
  <!-- Main Content area Start Last -->
  <form action="" method="POST">
    <h5 class="card-header text-center">Assign service Order Request</h5>
    <br>
    <div class="form-group">
      <label for="service_id">Service ID</label>
      <input type="text" class="form-control" name="service_id" value="<?php if(isset($row['service_id'])) {echo $row['service_id']; }?>" readonly>
    </div>
     <div class="form-group">
        <label for="p_name">Patient Name</label>
        <input type="text" class="form-control" name="pname" value="<?php if(isset($row['p_name'])) {echo $row['p_name']; }?>">
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" name="rgender" value="<?php if(isset($row['gender'])) { echo $row['gender']; } ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="category">Category</label>
            <input type="text" class="form-control" name="rcate" value="<?php if(isset($row['category'])) { echo $row['category']; } ?>">
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="p_aged">Aged-Patient Age</label>
            <input type="text" class="form-control" name="raged" value="<?php if(isset($row['p_aged'])) { echo $row['p_aged']; } ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="p_disabled">Dis-Patient Age</label>
            <input type="text" class="form-control" name="rdisabled" value="<?php if(isset($row['p_disabled'])) {echo $row['p_disabled']; }?>">
         </div>
         <div class="form-group col-md-4">
        <label for="p_dis">Description</label>
        <input type="text" class="form-control" name="rdis" value="<?php if(isset($row['p_dis'])) {echo $row['p_dis']; }?>">
      </div>
     </div>
    <div class="form-group row">
      <div class="form-group col-md-8">
        <label for="p_address">Address</label>
        <input type="text" class="form-control" name="raddress" value="<?php if(isset($row['p_address'])) { echo $row['p_address']; } ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="p_city">City</label>
        <input type="text" class="form-control" name="rcity" value="<?php if(isset($row['p_city'])) { echo $row['p_city']; } ?>">
      </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="p_state">State</label>
            <input type="text" class="form-control" name="rstate" value="<?php if(isset($row['p_state'])) { echo $row['p_state']; } ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="p_pincode">Pincode</label>
            <input type="text" class="form-control" name="rpin" value="<?php if(isset($row['p_pincode'])) { echo $row['p_pincode']; } ?>" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group col-md-4">
            <label for="p_phone">Phone no</label>
            <input type="text" class="form-control" name="rphone" value="<?php if(isset($row['p_phone'])) { echo $row['p_phone']; } ?>" onkeypress="isInputNumber(event)">
        </div>
    </div>
      <div class="form-group">
        <label for="h_name">Hospital Name</label>
        <input type="text" class="form-control" name="rhname" value="<?php if(isset($row['h_name'])) {echo $row['h_name']; }?>">
      </div>
      <div class="form-group">
        <label for="h_address">Hospital Address</label>
        <input type="text" class="form-control" name="rhaddress" value="<?php if(isset($row['h_address'])) {echo $row['h_address']; }?>">
      </div>
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="h_city">City</label>
            <input type="text" class="form-control" name="rhcity" value="<?php if(isset($row['h_city'])) { echo $row['h_city']; } ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="h_state">State</label>
            <input type="text" class="form-control" name="rhstate" value="<?php if(isset($row['h_state'])) { echo $row['h_state']; } ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="h_pincode">Pincode</label>
            <input type="text" class="form-control" name="rhpin" value="<?php if(isset($row['h_pincode'])) { echo $row['h_pincode']; } ?>" onkeypress="isInputNumber(event)">
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="a_date">Appointment Date</label>
            <input type="text" class="form-control" name="radate" value="<?php if(isset($row['a_date'])) { echo $row['a_date']; } ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="a_time">Appointment Time</label>
            <input type="text" class="form-control" name="ratime" value="<?php if(isset($row['a_time'])) { echo $row['a_time']; } ?>">
        </div>
    </div>
    <div class="form-group">
            <label for="a_file">Appointment File</label>
            <input type="text" class="form-control" name="myfile" value="<?php if(isset($row['a_file'])) { echo $row['a_file']; } ?>">
        </div>
    <div class="form-group row">
      <div class="form-group col-md-6">
        <label for="assign_vehical">Assign Vehical</label>
        <input type="text" class="form-control" id="assign_vehical" name="vehical">
      </div>
      <div class="form-group col-md-6">
        <label for="assign_careride">Assign Caretaker</label>
        <input type="text" class="form-control" id="assign_careride" name="careride">
      </div>
    </div>
    <br>
    <div class="float-right">
      <button type="submit" class="btn btn-success" name="assign">Assign</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form>
</div>
  <!-- below msg display if required fill missing or form submitted success or failed--->

<!-- Only Number for input fields -->
<script>
    function isInputNumber(evt) 
    {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch)))
        {
            evt.preventDefault();
        }
    }
</script>

<?php
include('source/adminfooter.php');
?>