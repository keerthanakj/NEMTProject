<?php
define('TITLE','Dashboard');
define('PAGE', 'dashboard');
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
$SQLInsert = "SELECT max(service_id) FROM submitrequest_db";
$result = $conn->query($SQLInsert);
$row = $result->fetch_row();
$submitrequest = $row[0];

$SQLInsert = "SELECT max(service_id) FROM assignservice_db";
$result = $conn->query($SQLInsert);
$row = $result->fetch_row();
$assignservice = $row[0];

$SQLInsert ="SELECT * FROM vehical_db";
$result = $conn->query($SQLInsert);
$totalvehi = $result->num_rows;

$SQLInsert ="SELECT * FROM careride_db";
$result = $conn->query($SQLInsert);
$totalcare = $result->num_rows;

?>


            <div class="col-sm-9 col-md-10"><!------start dashboard 2nd column----->
                <div class="row text-center mx-5">
                    <div class="col-sm-3 mt-5">
                        <div class="card text-white bg-danger mb-3" style="max-width:12rem;">
                            <div class="card-header">Request Received</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $submitrequest; ?></h4>
                                <a  class="btn text-white" href="request.php">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-5">
                        <div class="card text-white bg-success mb-3" style="max-width:12rem;">
                            <div class="card-header">Assigned Service</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $assignservice; ?></h4>
                                <a  class="btn text-white" href="serviceorder.php">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-5">
                        <div class="card text-white bg-primary mb-3" style="max-width:12rem;">
                            <div class="card-header">Vehical</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $totalvehi; ?></h4>
                                <a  class="btn text-white" href="vehical.php">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-5">
                        <div class="card text-white bg-warning mb-3" style="max-width:12rem;">
                            <div class="card-header">Care Ride</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $totalcare; ?></h4>
                                <a  class="btn text-white" href="careride.php">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-5 mt-5 text-center">
                    <p class="bg-dark text-white p-2">List of Requester</p>
                    <?php 
                    $SQLInsert = "SELECT * FROM requesterlogin_db";
                    $result = $conn->query($SQLInsert);
                    if($result->num_rows > 0)
                    {
                        echo '<table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Requester ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>';
                        while($row = $result->fetch_assoc())
                        {
                            echo '<tr>';
                                echo '<td>'.$row["r_login_id"].'</td>';
                                echo '<td>'.$row["r_name"].'</td>';
                                echo '<td>'.$row["r_email"].'</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>
                        </table>';
                    }
                    else
                    {
                        echo '0 Result';
                    }
                    ?>
                </div>
            </div><!-----end dashboard 2nd column----->

<?php
include('source/adminfooter.php');
?>