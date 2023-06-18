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

<div class="col-sm-9 col-md-10 mt-5">
<?php 
 $SQLInsert = "SELECT * FROM assignservice_db";
 $result = $conn->query($SQLInsert);
 if($result->num_rows > 0){
  echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">Service ID</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Category</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Phone no</th>
      <th scope="col">vehical</th>
      <th scope="col">Caretaker</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
    echo '<tr>
    <th scope="row">'.$row["service_id"].'</th>
    <td>'.$row["p_name"].'</td>
    <td>'.$row["category"].'</td>
    <td>'.$row["p_address"].'</td>
    <td>'.$row["p_city"].'</td>
    <td>'.$row["p_phone"].'</td>
    <td>'.$row["assign_vehical"].'</td>
    <td>'.$row["assign_careride"].'</td>
    <td><form action="viewassignservice.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["service_id"] .'><button type="submit" class="btn btn-warning" name="view" value="View"><i class="far fa-eye"></i></button></form>
    <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["service_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form>
    </td>
    </tr>';
   }
   echo '</tbody> </table>';
  } else {
    echo "0 Result";
  }
  if(isset($_REQUEST['delete'])){
    $SQLInsert = "DELETE FROM assignservice_db WHERE service_id = {$_REQUEST['id']}";
    if($conn->query($SQLInsert) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
    }
  ?>
</div>
</div>
</div>
<?php
include('source/adminfooter.php');
?>