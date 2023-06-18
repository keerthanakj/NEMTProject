<?php
define('TITLE','Service Order');
define('PAGE', 'serviceorder');
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

<div class="col-sm-6" style="margin-top: 55px; margin-right: 400px;">
 <h3 class="text-center">Assigned Service Details</h3>
 <?php
 if(isset($_REQUEST['view'])){
  $SQLInsert = "SELECT * FROM assignservice_db WHERE service_id = {$_REQUEST['id']}";
 $result = $conn->query($SQLInsert);
 $row = $result->fetch_assoc();
 }
 ?>
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
        <td>Care Ride Sign</td>
        <td></td>
      </tr>
    </tbody>
    </table>
    <div class="text-center">
    <form class="d-print-none d-inline mr-3"><input class="btn btn-primary" type="submit" value="Print" onClick="window.print()"></form>
    <form class="d-print-none d-inline" action="serviceorder.php"><input class="btn btn-secondary" type="submit" value="Close"></form>
    </div>
</div>

 <?php
include('source/adminfooter.php');
?>