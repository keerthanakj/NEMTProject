<?php
define('TITLE','Add New Vehical');
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

if(isset($_REQUEST['vehisubmit'])){
 // Checking for Empty Fields
 if(($_REQUEST['vNo'] == "") || ($_REQUEST['driver'] == "") || ($_REQUEST['dCity'] == "") || ($_REQUEST['dMobile'] == "")){
  // msg displayed if required field missing
  $msg = '<script>alert("Fill All Fileds"); </script>';
  echo $msg;
 } else {
   // Assigning User Values to Variable
   $vNo = $_REQUEST['vNo'];
    $driver = $_REQUEST['driver'];
    $dCity = $_REQUEST['dCity'];
    $dMobile = $_REQUEST['dMobile'];
   $SQLInsert = "INSERT INTO vehical_db (vehical_no, v_driver, d_city, d_mobile) VALUES ('$vNo', '$driver', '$dCity', $dMobile)";
   if($conn->query($SQLInsert) == TRUE){
    // below msg display on form submit success
    $msg = '<script>alert("Added Successfully"); </script>';
    echo $msg;
   } else {
    // below msg display on form submit failed
    $msg = '<script>alert("Unable to Add"); </script>';
    echo $msg;
   }
 }
 }
?>
<div class="col-sm-6" style="margin-top: 55px; margin-right: 430px;">
  <h3 class="text-center">Add New Vehical</h3>
  <form action="" method="POST">
    <div class="form-group">
      <label for="vehical_no">Vehical No</label>
      <input type="text" class="form-control" id="vehical_no" name="vNo">
    </div>
    <div class="form-group">
      <label for="v_driver">Driver</label>
      <input type="text" class="form-control" id="v_driver" name="driver">
    </div>
    <div class="form-group">
      <label for="d_city">City</label>
      <input type="text" class="form-control" id="d_city" name="dCity">
    </div>
    <div class="form-group">
      <label for="d_mobile">Mobile</label>
      <input type="text" class="form-control" id="d_mobile" name="dMobile">
    </div>
    <br>
    <div class="text-center">
      <button type="submit" class="btn btn-primary" id="vehisubmit" name="vehisubmit">Submit</button>
      <a href="vehical.php" class="btn btn-secondary">Close</a>
    </div>

  </form>
</div>

<?php
include('source/adminfooter.php'); 
?>