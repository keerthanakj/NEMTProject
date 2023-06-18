<?php

define('TITLE', 'Status');
define('PAGE', 'servicestatus');
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

?>

<!----Start 2nd column------>
<div class="col-sm-6 mt-5" style="margin-right: 400px;">
    <form action="" method="POST" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Service ID: </label>
            <input type="text" class="form-control" name="checkid" id="checkid" onkeypress="isInputNumber(event)">
        </div>
        <br>
        <button type="submit" class="hero-btn bg-primary text-white">Search</button>
    </form>
    <?php 
    if(isset($_REQUEST['checkid']))
    {
        $SQLInsert = "SELECT * FROM assignservice_db WHERE service_id = {$_REQUEST['checkid']}";
        $result = $conn->query($SQLInsert);
        $row = $result->fetch_assoc();
        if(($row['service_id']) == $_REQUEST['checkid'])
        {
    ?>
    <h3 class="text-center mt-5">Assigned Service Details</h3>
    <table class="table table-bordered">
    <tbody>
      <tr>
        <td>Service ID</td>
        <td>
          <?php if(isset($row['service_id'])) {echo $row['service_id']; } ?>
        </td>
      </tr>
      <tr>
        <td>Patient Name</td>
        <td>
          <?php if(isset($row['p_name'])) {echo $row['p_name']; } ?>
        </td>
      </tr>
      <tr>
        <td>Gender</td>
        <td>
          <?php if(isset($row['gender'])) {echo $row['gender']; } ?>
        </td>
      </tr>
      <tr>
        <td>Category</td>
        <td>
          <?php if(isset($row['category'])) {echo $row['category']; } ?>
        </td>
      </tr>
      <tr>
        <td>Patient Age</td>
        <td>
          <?php if(isset($row['p_aged'])) {echo $row['p_aged']; } ?>
          <?php if(isset($row['p_disabled'])) {echo $row['p_disabled']; } ?>
        </td>
      </tr>
      <tr>
        <td>Description</td>
        <td>
          <?php if(isset($row['p_dis'])) {echo $row['p_dis']; } ?>
        </td>
      </tr>
      <tr>
        <td>Address</td>
        <td>
          <?php if(isset($row['p_address'])) {echo $row['p_address']; } ?>
        </td>
      </tr>
      <tr>
        <td>City</td>
        <td>
          <?php if(isset($row['p_city'])) {echo $row['p_city']; } ?>
        </td>
      </tr>
      <tr>
        <td>State</td>
        <td>
          <?php if(isset($row['p_state'])) {echo $row['p_state']; } ?>
        </td>
      </tr>
      <tr>
        <td>Pincode</td>
        <td>
          <?php if(isset($row['p_pincode'])) {echo $row['p_pincode']; } ?>
        </td>
      </tr>
      <tr>
        <td>Phone no</td>
        <td>
          <?php if(isset($row['p_phone'])) {echo $row['p_phone']; } ?>
        </td>
      </tr>
      <br>
      <tr>
        <td>Hospital Name</td>
        <td>
          <?php if(isset($row['h_name'])) {echo $row['h_name']; } ?>
        </td>
      </tr>
      <tr>
        <td>Hospital Address</td>
        <td>
          <?php if(isset($row['h_address'])) {echo $row['h_address']; } ?>
        </td>
      </tr>
      <tr>
        <td>City</td>
        <td>
          <?php if(isset($row['h_city'])) {echo $row['h_city']; } ?>
        </td>
      </tr>
      <tr>
        <td>State</td>
        <td>
          <?php if(isset($row['h_state'])) {echo $row['h_state']; } ?>
        </td>
      </tr>
      <tr>
        <td>Pincode</td>
        <td>
          <?php if(isset($row['h_pincode'])) {echo $row['h_pincode']; } ?>
        </td>
      </tr>
      <tr>
        <td>Appointment Date</td>
        <td>
          <?php if(isset($row['a_date'])) {echo $row['a_date']; } ?>
        </td>
      </tr>
      <tr>
        <td>Appointment Time</td>
        <td>
          <?php if(isset($row['a_time'])) {echo $row['a_time']; } ?>
        </td>
      </tr>
      <tr>
        <td>Assigned Vehical</td>
        <td>
          <?php if(isset($row['assign_vehical'])) {echo $row['assign_vehical']; } ?>
        </td>
      </tr>
      <tr>
        <td>Assigned Caretaker</td>
        <td>
          <?php if(isset($row['assign_careride'])) {echo $row['assign_careride']; } ?>
        </td>
      </tr>
      <tr>
        <td>Patient Sign or guardian sign</td>
        <td></td>
      </tr>
      <tr>
        <td>Caretaker Sign</td>
        <td></td>
      </tr>
    </tbody>
    </table>
    <div class="text-center">
    <form class="d-print-none d-inline mr-3"><input class="btn btn-primary" type="submit" value="Print" onClick="window.print()"></form>
    <form class="d-print-none d-inline" action="servicestatus.php"><input class="btn btn-secondary" type="submit" value="Close"></form>
    </div>
  <?php }
  else {
      $msg = '<script>alert("Your Request is Still Pending");</script>';
      echo $msg;
    }
 }
 ?>
</div>
<!----end 2nd column------->
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>

<?php
include('source/footer.php');
?>