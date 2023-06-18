<?php
define('TITLE','Caretaker');
define('PAGE', 'careride');
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
if(isset($_REQUEST['careupdate'])){
    // Checking for Empty Fields
    if(($_REQUEST['c_login_id'] == "") || ($_REQUEST['cName'] == "") || ($_REQUEST['cCity'] == "") || ($_REQUEST['cPhone'] == "") || ($_REQUEST['cEmail'] == "")){
     // msg displayed if required field missing
     $msg = '<script>alert("Fill All Fileds"); </script>';
     echo $msg;
    } else {
      // Assigning User Values to Variable
      $cid = $_REQUEST['c_login_id'];
      $cName = $_REQUEST['cName'];
      $cCity = $_REQUEST['cCity'];
      $cPhone = $_REQUEST['cPhone'];
      $cEmail = $_REQUEST['cEmail'];
  
    $SQLInsert = "UPDATE careride_db SET c_login_id = '$cid', c_name = '$cName', c_city = '$cCity', c_phone = '$cPhone', c_email = '$cEmail' WHERE c_login_id = '$cid'";
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
    <h3 class="text-center">Update Caretaker Details</h3>
    <?php
   if(isset($_REQUEST['view'])){
    $SQLInsert = "SELECT * FROM careridelogin_db WHERE c_login_id = {$_REQUEST['id']}";
   $result = $conn->query($SQLInsert);
   $row = $result->fetch_assoc();
   }
   ?>
    <form action="" method="POST">
    <div class="form-group">
        <label for="c_login_id">Caretaker ID</label>
        <input type="text" class="form-control" id="c_login_id" name="c_login_id" value="<?php if(isset($row['c_login_id'])) {echo $row['c_login_id']; }?>">
      </div>
      <div class="form-group">
        <label for="c_name">Name</label>
        <input type="text" class="form-control" id="c_name" name="cName" value="<?php if(isset($row['c_name'])) {echo $row['c_name']; }?>">
      </div>
      <div class="form-group">
        <label for="c_city">City</label>
        <input type="text" class="form-control" id="c_city" name="cCity" value="<?php if(isset($row['c_city'])) {echo $row['c_city']; }?>">
      </div>
      <div class="form-group">
        <label for="c_mobile">Phone</label>
        <input type="text" class="form-control" id="c_phone" name="cPhone" value="<?php if(isset($row['c_phone'])) {echo $row['c_phone']; }?>">
      </div>
      <div class="form-group">
        <label for="c_email">Email</label>
        <input type="text" class="form-control" id="c_email" name="cEmail" value="<?php if(isset($row['c_email'])) {echo $row['c_email']; }?>">
      </div>
    <br>
      <div class="text-center">
        <button type="submit" class="btn btn-primary" id="careupdate" name="careupdate">Update</button>
        <a href="careride.php" class="btn btn-secondary">Close</a>
      </div>
    </form>
  </div>

<?php
include('source/adminfooter.php'); 
?>