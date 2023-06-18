<?php

define('TITLE', 'Service Booking');
define('PAGE', 'book');
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

$SQLInsert = "SELECT * FROM submitrequest_db WHERE service_id = {$_SESSION['myid']}";
$result = $conn->query($SQLInsert);
if($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    echo "<div class='col-sm-9 col-md-10 ml-5 mt-5'> 
    <em style='font-size:14px;'>Note - Remember Your Service Id to Check Your Service Status</em>
    <br>
    <br>
    <table class= 'table'>
    <tbody>
        <tr>
            <th>Service ID:</th>
            <td>".$row['service_id']."</td>
        </tr>
        <tr>
            <th>Patient Name:</th>
            <td>".$row['p_name']."</td>
        </tr>
        <tr>
            <th>Category:</th>
            <td>".$row['category']."</td>
        </tr>
        <tr>
            <th>Patient Age:</th>
            <td>".$row['p_aged']."</td>
            <td>".$row['p_disabled']."</td>
        </tr>
        <tr>
            <th>Description:</th>
            <td>".$row['p_dis']."</td>
        </tr>
        <tr>
            <th>Phone no:</th>
            <td>".$row['p_phone']."</td>
        </tr>
        <tr>
            <th>Hospital Name:</th>
            <td>".$row['h_name']."</td>
        </tr>
            <th>Appointment Date:</th>
            <td>".$row['a_date']."</td>
        </tr>
        <tr>
            <th>Appointment Time:</th>
            <td>".$row['a_time']."</td>
        </tr>
        <tr>
            <th>Appointment File Upload:</th>
            <td>".$row['a_file']."</td>
        </tr>

        <tr>
        <td><form class='d-print-none'><input class='hero-btn mb-2 btn-primary text-white shadow-sm' type='submit' value='Print' onClick='window.print()'</form><br>
        <em style='font-size:14px;'>Note - By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy</em></td>
        </tr>
        
    </div>";    
} 
else
{
    echo "Failed";
}

?>
  
<?php
include('source/footer.php');
?>