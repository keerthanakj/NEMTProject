<?php
define('TITLE','Update Vehical');
define('PAGE', 'vehical');
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

// update
if(isset($_REQUEST['vehiupdate'])){
    // Checking for Empty Fields
    if(($_REQUEST['vehical_id'] == "") || ($_REQUEST['vNo'] == "") || ($_REQUEST['driver'] == "") || ($_REQUEST['dCity'] == "") || ($_REQUEST['dMobile'] == "")){
     // msg displayed if required field missing
     $msg = '<script>alert("Fill All Fileds"); </script>';
     echo $msg;
    } else {
      // Assigning User Values to Variable
      $vid = $_REQUEST['vehical_id'];
      $vNo = $_REQUEST['vNo'];
      $driver = $_REQUEST['driver'];
      $dCity = $_REQUEST['dCity'];
      $dMobile = $_REQUEST['dMobile'];
  
    $SQLInsert = "UPDATE vehical_db SET vehical_id = '$vid', vehical_no = '$vNo', v_driver = '$driver', d_city = '$dCity', d_mobile = '$dMobile' WHERE vehical_id = '$vid'";
      if($conn->query($SQLInsert) == TRUE){
       // below msg display on form submit success
       $msg = '<script>alert("Updated Successfully"); </script>';
       echo $msg;
      } else {
       // below msg display on form submit failed
       $msg = '<script>alert("Unable to Update"); </script>';
       echo $msg;
      }
    }
    }
?>
  <div class="col-sm-6" style="margin-top: 55px; margin-right: 430px;">
    <h3 class="text-center">Update Vehical Details</h3>
    <?php
   if(isset($_REQUEST['view'])){
    $SQLInsert = "SELECT * FROM vehical_db WHERE vehical_id = {$_REQUEST['id']}";
   $result = $conn->query($SQLInsert);
   $row = $result->fetch_assoc();
   }
   ?>
    <form action="" method="POST">
      <div class="form-group">
        <label for="vehical_id">Vehical ID</label>
        <input type="text" class="form-control" id="vehical_id" name="vehical_id" value="<?php if(isset($row['vehical_id'])) {echo $row['vehical_id']; }?>">
      </div>
      <div class="form-group">
        <label for="vehical_no">Vehical No</label>
        <input type="text" class="form-control" id="vehical_no" name="vNo" value="<?php if(isset($row['vehical_no'])) {echo $row['vehical_no']; }?>">
      </div>
      <div class="form-group">
        <label for="v_driver">Driver</label>
        <input type="text" class="form-control" id="v_driver" name="driver" value="<?php if(isset($row['v_driver'])) {echo $row['v_driver']; }?>">
      </div>
      <div class="form-group">
        <label for="d_city">City</label>
        <input type="text" class="form-control" id="d_city" name="dCity" value="<?php if(isset($row['d_city'])) {echo $row['d_city']; }?>">
      </div>
      <div class="form-group">
        <label for="d_mobile">Mobile</label>
        <input type="text" class="form-control" id="d_mobile" name="dMobile" value="<?php if(isset($row['d_mobile'])) {echo $row['d_mobile']; }?>">
      </div>
    <br>
      <div class="text-center">
        <button type="submit" class="btn btn-primary" id="vehiupdate" name="vehiupdate">Update</button>
        <a href="vehical.php" class="btn btn-secondary">Close</a>
      </div>
    </form>
  </div>

<?php
include('source/adminfooter.php'); 
?>