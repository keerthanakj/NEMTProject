<?php    
define('TITLE', 'Update Requester');
define('PAGE', 'requesters');
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
if(isset($_REQUEST['requpdate'])){
    // Checking for Empty Fields
    if(($_REQUEST['r_login_id'] == "") || ($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "")){
     // msg displayed if required field missing
     $msg = '<script>alert("Fill All Fileds"); </script>';
     echo $msg;
    } else {
      // Assigning User Values to Variable
      $rid = $_REQUEST['r_login_id'];
      $rName = $_REQUEST['rName'];
      $rEmail = $_REQUEST['rEmail'];
  
    $SQLInsert = "UPDATE requesterlogin_db SET r_login_id = '$rid', r_name = '$rName', r_email = '$rEmail' WHERE r_login_id = '$rid'";
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
    <h3 class="text-center">Update Requester Details</h3>
    <?php
   if(isset($_REQUEST['view'])){
    $SQLInsert = "SELECT * FROM requesterlogin_db WHERE r_login_id = {$_REQUEST['id']}";
   $result = $conn->query($SQLInsert);
   $row = $result->fetch_assoc();
   }
   ?>
    <form action="" method="POST">
      <div class="form-group">
        <label for="r_login_id">Requester ID</label>
        <input type="text" class="form-control" id="r_login_id" name="r_login_id" value="<?php if(isset($row['r_login_id'])) {echo $row['r_login_id']; }?>">
      </div>
      <div class="form-group">
        <label for="r_name">Name</label>
        <input type="text" class="form-control" id="r_name" name="rName" value="<?php if(isset($row['r_name'])) {echo $row['r_name']; }?>">
      </div>
      <div class="form-group">
        <label for="r_email">Email</label>
        <input type="text" class="form-control" id="r_email" name="rEmail" value="<?php if(isset($row['r_email'])) {echo $row['r_email']; }?>">
      </div>
    <br>
      <div class="text-center">
        <button type="submit" class="btn btn-primary" id="requpdate" name="requpdate">Update</button>
        <a href="requesters.php" class="btn btn-secondary">Close</a>
      </div>
    </form>
  </div>

<?php
include('source/adminfooter.php'); 
?>  