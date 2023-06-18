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

?>

<div class="col-sm-9 col-md-10 mt-5 text-center">
    <!--Table-->
    <p class=" bg-dark text-white p-2">List of Caretaker</p>
    <?php
    $SQLInsert = "SELECT * FROM careridelogin_db";
    $result = $conn->query($SQLInsert);
    if($result->num_rows > 0){
 echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">Caretaker ID</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">City</th>
    <th scope="col">Phone No</th>
    <th scope="col">Assign Service</th>
    <th scope="col">Action</th>
   </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
   echo '<tr>';
    echo '<th scope="row">'.$row["c_login_id"].'</th>';
    echo '<td>'.$row["c_name"].'</td>';
    echo '<td>'.$row["c_email"].'</td>';
    echo '<td>'.$row["c_city"].'</td>';
    echo '<td>'.$row["c_phone"].'</td>';
    echo '<td><form action="" method="POST" class="d-inline">
    <input type="hidden" name="id" value='.$row["c_login_id"].'><button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-pen-alt"></i></form></td>';
    echo '<td><form action="editcareride.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["c_login_id"] .'><button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-edit"></i></button></form>  
    <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["c_login_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
   </tr>';
    echo '</tr>'
    ;
  }

 echo '</tbody>
 </table>';
} else {
  echo "0 Result";
}
if(isset($_REQUEST['delete'])){
  $SQLInsert = "DELETE FROM careridelogin_db WHERE c_login_id = {$_REQUEST['id']}";
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

<?php
include('source/adminfooter.php');
?>