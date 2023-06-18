<?php

define('TITLE','Booking');
define('PAGE', 'servicebooking');
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
if(isset($_REQUEST['namesubmit']))
{
    if(($_REQUEST['pname'] == "") || ($_REQUEST['rgender'] == "") || ($_REQUEST['rcate'] == "") || ($_REQUEST['rdis'] == "") || ($_REQUEST['raddress'] == "") || ($_REQUEST['rcity'] == "") || ($_REQUEST['rstate'] == "") || ($_REQUEST['rpin'] == "") || ($_REQUEST['rphone'] == "")
    || ($_REQUEST['rhname'] == "") || ($_REQUEST['rhaddress'] == "") || ($_REQUEST['rhcity'] == "") || ($_REQUEST['rhstate'] == "") || ($_REQUEST['rhpin'] == "") || ($_REQUEST['radate'] == "") ||($_REQUEST['ratime'] == "") || ($_FILES['myfile'] == ""))
    {
        $msg = "<script>alert('Fill All Fields');</script>";
        echo $msg;
    }
    else
    {
        $pname = $_REQUEST['pname'];
        $rgender = $_REQUEST['rgender'];
        $rcate = $_REQUEST['rcate'];
        $raged = $_REQUEST['raged'];
        $rdisabled =$_REQUEST['rdisabled'];
        $rdis = $_REQUEST['rdis'];
        $raddress = $_REQUEST['raddress'];
        $rcity = $_REQUEST['rcity'];
        $rstate = $_REQUEST['rstate'];
        $rpin = $_REQUEST['rpin'];
        $rphone = $_REQUEST['rphone'];
        $rhname = $_REQUEST['rhname'];
        $rhaddress = $_REQUEST['rhaddress'];
        $rhcity = $_REQUEST['rhcity'];
        $rhstate = $_REQUEST['rhstate'];
        $rhpin = $_REQUEST['rhpin'];
        $radate = $_REQUEST['radate'];
        $ratime = $_REQUEST['ratime'];
        if(isset($_FILES['myfile']['name']))
        {
            $rfile = $_FILES['myfile']['name'];
            $ext = explode(",",$rfile);
            $cn = count($ext);
            $tmp = $_FILES['myfile']['tmp_name'];
            move_uploaded_file($tmp, "uploaded_img/".$rfile);

            $SQLInsert = "INSERT INTO submitrequest_db (p_name,gender,category,p_aged,p_disabled,p_dis,p_address,p_city,p_state,p_pincode,p_phone,h_name,h_address,h_city,h_state,h_pincode,a_date,a_time,a_file) VALUES('$pname','$rgender','$rcate','$raged','$rdisabled','$rdis','$raddress','$rcity','$rstate','$rpin','$rphone','$rhname','$rhaddress','$rhcity','$rhstate','$rhpin','$radate','$ratime','$rfile')";
            if($conn->query($SQLInsert) == TRUE) 
            {
                $genid = mysqli_insert_id($conn);
                $msg = "<script>alert('Request Submitted Successfully');</script>";
                echo $msg;
                $_SESSION['myid'] = $genid;
                echo "<script> location.href='servicebookingpass.php'</script>";
            }   
            else
            {
                $msg = "<script>alert('Unabled to Submit Your Request');</script>";
                echo $msg;
            }
        }
        else
        {
            $msg = "<script>alert('Unabled to upload the image');</script>";
            echo $mag;
        }
    }
}

?>


        <!----start submit request form 2nd column-------->
            <div class="col-sm-9 col-md-10" style="margin-left: -220px;"> 
                <form class="mx-5 mt-5" action="servicebooking.php" method="POST" enctype ="multipart/form-data">
                    <h5>Patient Details:</h5>
                        <div class="form-group">
                            <label>Patient Name:</label>
                            <input type="text" class="form-control" placeholder="Enter Patient Name" name="pname">
                        </div>
                    <div class="form-check-inline" >
                        <label>Gender:  </label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="Male" name="rgender">
                            <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="Female" name="rgender">
                            <label class="form-check-label">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="Other" name="rgender">
                            <label class="form-check-label">Other</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-check-inline">
                        <label>Category:   </label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="Aged" name="rcate" onclick="showAged()">
                            <label for="aged" class="form-check-label">Aged</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" Value="Disabled" name="rcate" onclick="showDisabled()">
                            <label for="disabled" class="form-check-label">Disabled</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div id="agedDIV" class="none form-group col-sm-6">
                        <label>Patient Age:</label>
                        <select type="text" class="form-control form-select" name="raged">
                                <option value="" Selected>Choose</option>
                                <option value="45 - 50">45 - 60</option>
                                <option value="60 - 80">60 - 80</option>
                                <option value="80 - 100">80 - 100</option>
                                <option value="above 100">above 100</option>
                        </select>
                        </div>
                    
                        <div id="disabledDIV" class="none form-group col-sm-6">
                        <label>Patient Age:</label>
                        <input type="text" class="form-control" placeholder="Enter Patient Age" name="rdisabled">
                        </div>       
                    
                        <style> 
                            .none { display:none; }, 
                            .showDIV { display:block; } 
                        </style>
                
                        <div class="form-group col-sm-6">
                        <label>Description: </label>
                        <select type="text" class="form-control form-select" name="rdis">
                                <option value="" Selected>Choose</option>
                                <option value="Weekly">Weekly Checkup</option>
                                <option value="Monthly">Monthly Checkup</option>
                                <option value="Yearly">Yearly Checkup</option>
                                <option value="Rarely">Rarely Checkup</option>
                         </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address: </label>
                        <textarea rows="1" class="form-control" name="raddress" placeholder="Enter your Address" required></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-sm-6">
                            <label class="form-label">City:</label>
                            <select type="text" class="form-control form-select" placeholder="City" name="rcity">
                                <option value="" Selected>Choose</option>
                                <option value="Shivamogga">Shivamogga</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="form-label">State:</label>
                            <select type="text" class="form-control form-select" placeholder="State" name="rstate">
                                <option value="" Selected>Choose</option>
                                <option value="Karnataka">Karnataka</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-sm-6">
                            <label>Pincode:</label>
                            <input type="text" class="form-control" placeholder="Enter your pincode" name="rpin" onkeypress="isInputNumber(event)">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Phone no:</label>
                            <input type="text" class="form-control" placeholder="Enter Phone Number" name="rphone" onkeypress="isInputNumber(event)">
                        </div>
                    </div>
            </div>
            <div class="col-sm-8 col-md-9 mt-4" style="margin-left: 270px;">    
                    <h5>Hospital Details:</h5>
                    <div class="form-group">
                        <label>Hospital Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Hospital Name" name="rhname">
                    </div>
                    <div class="form-group">
                        <label>Hospital Address: </label>
                        <textarea rows="1" class="form-control" name="rhaddress" placeholder="Enter Hospital Address" required></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-sm-3">
                            <label class="form-label">City:</tylabel>
                            <select type="text" class="form-control form-select" placeholder="City" name="rhcity">
                                <option value="" Selected>Choose</option>
                                <option value="Shivamogga">Shivamogga</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="form-label">State:</label>
                            <select type="text" class="form-select" placeholder="State" name="rhstate">
                                <option value="" Selected>Choose</option>
                                <option value="Karnataka">Karnataka</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Pincode:</label>
                            <input type="text" class="form-control" placeholder="Pincode" name="rhpin" onkeypress="isInputNumber(event)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-sm-6">
                            <label>Appointment Date:</label>
                            <input type="date" class="form-control" placeholder="Enter Appointment Date" name="radate">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Appointment Time:</label>
                            <input type="time" class="form-control" placeholder="Enter Appointment Time" name="ratime">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Appointment File Upload:</label>
                        <input type="file" class="form-control" name="myfile">
                    
                    <br>
                    <button type="submit" class="hero-btn mb-2 btn-primary text-white shadow-sm" name="namesubmit">Submit</button>
                    <button type="reset" class="hero-btn mb-2 btn-secondary text-white shadow-sm" name="namereset">Reset</button>
                    </div>               
                </form>
            </div> 
            <!----end submit request form 2nd column-------->
    <!-- Only Number for input fields -->
    <script>
    function isInputNumber(evt) 
    {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch)))
        {
            evt.preventDefault();
        }
    }
    </script>
<script> 
function showAged()
{
$("#agedDIV").removeClass("none");
$("#agedDIV").addClass("showDIV");

//Make sure disabledDIV is not visible
$("#disabledDIV").removeClass("showDIV");
$("#disabledDIV").addClass("none");
}

function showDisabled()
{
$("#disabledDIV").removeClass("none");
$("#disabledDIV").addClass("showDIV");

//Make sure agedDIV is not visible
$("#agedDIV").removeClass("showDIV");
$("#agedDIV").addClass("none");
}
</script> 

<?php
include('source/footer.php');
?>