<?php

define('TITLE', 'Payment');
define('PAGE', 'servicepayment');
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
$SQLInsert = "SELECT r_name, r_email FROM requesterlogin_db WHERE r_email = '$rEmail'";
$result = $conn->query($SQLInsert);
if($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $rName = $row['r_name'];
}


if(isset($_REQUEST['payment']))
{
    //checking for empty field
    if(($_REQUEST['cc_num'] == "") || ($_REQUEST['cc_exp'] == "") || ($_REQUEST['cc_cvc'] == "") || ($_REQUEST['cc_holder'] == ""))
    {
        $msg = '<script>alert("All Fields are required");</script>';
        echo $msg;
    }
    else
    {
        //assigning  user values to variables
        $cc_num = $_REQUEST['cc_num'];
        $cc_exp = $_REQUEST['cc_exp'];
        $cc_cvc = $_REQUEST['cc_cvc'];
        $cc_holder = $_REQUEST['cc_holder'];

        $SQL = "INSERT INTO payment_db (cc_num, cc_exp, cc_cvc, cc_holder) VALUES('$cc_num','$cc_exp','$cc_cvc','$cc_holder')";
        if($conn->query($SQL) == TRUE)
        {
            $msg = '<script>alert("Payment Successfulled");</script>';
            echo $msg;
        } 
        else
        {
            $msg = '<script>alert("Unabled to pay");</script>';
            echo $msg;
        }

    }
}
?>

            <div class='position-absolute card col-sm-6 ml-5 mt-5' style='margin-left: 630px;'>
                <div class='card-header text-center'>
                <h4 class='text-primary'>Payment</h4>
                </div>
                <div class='card-body'>
                <form class='mx-5' action='servicepayment.php' method='POST'>
                    <div class='form-group'>
                        <label for='rName'>Name</label><input type='text' class='form-control' name='rName' value='<?php echo $rName ?>' readonly>
                    </div>
                    <div class='form-group'>
                        <label for='rEmail'>Email</label><input type='email' class='form-control' name='rEmail' value='<?php echo $rEmail ?>' readonly>
                    </div>
                    <br>
                    <div class='card'>
                    
                        <div class='card-header row'>
                            <div class='col-md-6'>
                                <h6 class='text-primary'>CREDIT CARD PAYMENT</h6>
                            </div>
                            <div class='col-md-6 text-right' style="margin-right: -5px">
                                <img class="img-fluid" width=100% src="img/images.png">
                            </div>
                        </div>
                        <div class='card-body' style='height: 300px'>
                            <div class='form-group'>
                            <form action='' method='POST'>
                            <label for='cc-number' class='control-label'>CARD NUMBER</label>
                            <input type='text' id='cc-number' class='form-control' placeholder='**** **** **** ****' name='cc_num'>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                <div class='form-group'>
                                    <label for='cc-exp' class='control-label'>CARD EXPIRY</label>
                                    <input type='text' id='cc-exp' class='form-control' placeholder='** / **' name='cc_exp'>
                                </div>
                                </div>
                                <div class='col-md-6'>
                                <div class='form-group'>
                                    <label for='cc-cvc' class='control-label'>CARD CVC</label>
                                    <input type='text' id='cc-cvc' class='form-control' placeholder='****' name='cc_cvc'>
                                </div>
                                </div>
                                <div class='form-group'>
                                    <label for='numeric' class='control-label'>CARD HOLDER NAME</label>
                                    <input type='text' class='form-control' name='cc_holder'>
                                </div>
                                
                                <br>
                                <br>
                                <div>
                                <br>
                                <div class='form-group'>
                                    <button type='submit' class='hero-btn mb-2 btn-primary text-white shadow-sm' name='payment'>Make Payment</button>
                                </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </form>
                </div>
            </div>
<?php
include('source/footer.php');
?>