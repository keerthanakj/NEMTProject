<?php
define('TITLE','Vehical');
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
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <!--Table-->
    <p class=" bg-dark text-white p-2">List of Vehicals</p>
    <?php
    $SQLInsert = "SELECT * FROM vehical_db";
    $result = $conn->query($SQLInsert);
    if($result->num_rows > 0){
 echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">Vehical ID</th>
    <th scope="col">Vehical No</th>
    <th scope="col">Driver</th>
    <th scope="col">City</th>
    <th scope="col">Mobile</th>
    <th scope="col">Action</th>
   </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
   echo '<tr>';
    echo '<th scope="row">'.$row["vehical_id"].'</th>';
    echo '<td>'. $row["vehical_no"].'</td>';
    echo '<td>'.$row["v_driver"].'</td>';
    echo '<td>'.$row["d_city"].'</td>';
    echo '<td>'.$row["d_mobile"].'</td>';
    echo '<td><form action="editvehical.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["vehical_id"] .'><button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-pen"></i></button></form>  
    <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["vehical_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
   </tr>';
  }

 echo '</tbody>
 </table>';
} else {
  echo "0 Result";
}
if(isset($_REQUEST['delete'])){
  $SQLInsert = "DELETE FROM vehical_db WHERE vehical_id = {$_REQUEST['id']}";
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

<div class="text-center" style="margin-left: 600px;">
    <a class="btn btn-danger box" href="insertvehical.php"><i class="fas fa-plus fa-2x"></i></a>
</div>

<?php
include('source/adminfooter.php');
?>