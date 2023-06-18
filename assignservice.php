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
    <div class="col-sm-6" style="margin-top: 55px; margin-right: 430px;">
    <h3 class="text-center">Assigning Service</h3>
    </div>
<?php
include('source/adminfooter.php'); 
?>