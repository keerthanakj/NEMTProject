<?php
define('TITLE','Booking Report');
define('PAGE', 'bookingreport');
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
<div class="col-sm-6 mt-5" style="margin-right: 400px;">
  <form action="" method="POST" class="d-print-none">
    <div class="form-row">
      <div class="form-group col-md-7">
      <label><h5>Service Appointments as per date</h5> From: </label>
        <input type="date" class="form-control" id="startdate" name="startdate">
      </div>To:
      <div class="form-group col-md-7">
        <input type="date" class="form-control" id="enddate" name="enddate">
      </div>
      <br>
      <div class="form-group">
        <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
      </div>
    </div>
  </form>
  <?php
  if(isset($_REQUEST['searchsubmit'])){
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];
    $sql = "SELECT * FROM assignservice_db WHERE a_date BETWEEN '$startdate' AND '$enddate'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
     echo '
  <p class=" bg-dark text-white p-2 mt-4">Details</p>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Service ID</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Category</th>
      <th scope="col">Aged:Patient Age</th>
      <th scope="col">dis:Patient Age</th>
      <th scope="col">Address</th>
      <th scope="col">Phone no</th>
      <th scope="col">Hospital Name</th>
      <th scope="col">Hospital Address</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Assigned Vehical</th>
      <th scope="col">Assigned Care Ride</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
    echo '<tr>
    <th scope="row">'.$row["service_id"].'</th>
    <td>'.$row["p_name"].'</td>
    <td>'.$row["gender"].'</td>
    <td>'.$row["category"].'</td>
    <td>'.$row["p_aged"].'</td>
    <td>'.$row["p_disabled"].'</td>
    <td>'.$row["p_address"].'</td>
    <td>'.$row["p_phone"].'</td>
    <td>'.$row["h_name"].'</td>
    <td>'.$row["h_address"].'</td>
    <td>'.$row["a_date"].'</td>
    <td>'.$row["a_time"].'</td>
    <td>'.$row["assign_vehical"].'</td>
    <td>'.$row["assign_careride"].'</td>
      </tr>';
    }
    echo '<tr>
    <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form></td>
  </tr></tbody>
  </table>';
  } else {
    echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
  }
 }
  ?>
</div>
</div>
</div>

<?php
include('source/adminfooter.php');
?>