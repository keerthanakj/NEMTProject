<?php

include('source/db_connect.php');

if(isset($_REQUEST['submit']))
{
    if(($_REQUEST['name'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['subject'] == "") || ($_REQUEST['message'] == ""))
    {
        $msg = '<script>alert("All fields are required");</script>';
        echo $msg;
    }
    else
    {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $subject = $_REQUEST['subject'];
        $message = $_REQUEST['message'];

        $SQL = "INSERT INTO contact_db (c_name, c_email, c_subject, c_msg) VALUES('$name', '$email', '$subject', '$message')";
        if($conn->query($SQL) == TRUE)
        {
            $msg = '<script>alert("Message sent Successfully");</script>';
            echo $msg;
        } 
        else
        {
            $msg = '<script>alert("Unabled to send your message");</script>';
            echo $msg;
        }
    }
}
?>
<html>
<head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0">
    <title>NEMT service</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://kit.fontawesome.com/3073eef095.js" crossorigin="anonymous"></script>
    <script src="link/js/all.min.js"></script>
    <script src="link/js/bootstrap.min.js"></script>
    <script src="link/js/jquery.min.js"></script>
    <script src="link/js/popper.main.js"></script>
    <link rel="stylesheet" href="link/css/bootstrap.min.css">
</head>
<body>
    <section class="sub-header">
        <nav>
            <a href="home.html"><img src="img/logo.png"></a>
            <div class="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="service.html">Service</a></li>
                    <li><a href="homeRegister.php">Register</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <a href="login.php">
                    <button type="button" class="login-btn">Log In</button>
                    </a>
                </ul>
            </div>
        </nav>
        <br>
    <h1>Contact Us</h1>
    </section>
    
    <!--------contact us--------->
    <section>
    <div class="contact-us">
        <div class="row">
            <div class="contact-col">
                <div>
                    <p class="text-primary" style="font-size: 28px; margin: 10px">
                    <i class="fa fa-home"></i>
                    </p>
                    <span>
                        <h5>XYZ Road, ABC Building</h5>
                        <p>Shivamogga, Karnataka, India</p>
                    </span>
                </div>
                <div>
                    <p class="text-primary" style="font-size: 28px; margin: 10px">
                    <i class="fa fa-phone"></i>
                    </p>
                    <span>
                        <h5>+1 0123456789</h5>
                        <p>Contact Number</p>
                    </span>
                </div>
                <div>
                    <p class="text-primary" style="font-size: 28px; margin: 10px">
                    <i class="fas fa-envelope"></i>
                    </p>
                    <span>
                        <h5>infous29@gmail.com</h5>
                        <p>Email us your query</p>
                    </span>
                </div>
            </div>
            <div class="contact-col">
                <h2>Send Feedback</h2>
                <form action="" method="POST" class="contact-form">
                     <input type="text" name="name" placeholder="Enter your name" required>
                    <input type="email" name="email" placeholder="Enter email address" required>
                    <input type="text" name="subject" placeholder="Subject" required>
                    <textarea rows="8" name="message" placeholder="Message" required></textarea>
                    <button type="submit" class="hero-btn blue-btn" name="submit">Send Message</button>
                </form>
            </div>
        </div>
    </div>
    </section>
    <!----------Footer------->
    <footer class="container-fluid bg-dark mt-5 text-white">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6">
                    <span class="pr-2 text-right">Follow Us: </span>
                    <a href="#" target="blank" class="pr-2 fi-color text-primary">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" target="blank" class="pr-2 fi-color text-primary">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" target="blank" class="pr-2 fi-color">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" target="blank" class="pr-2 fi-color text-primary">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" target="blank" class="pr-2 fi-color text-primary">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <small>Designed by EduriteCollegeStudents &copy; 2021</small>
                    <small><a href="adminlogin.php">Admin Login</a>
                    <a href="careridelogin.php">Caretaker Login</a></small>
                </div>
            </div>
        </div>
    </footer>
     <!------Javascript-------->
     <script src="link/js/all.min.js"></script>
     <script src="link/js/bootstrap.min.js"></script>
     <script src="link/js/jquery.min.js"></script>
     <script src="link/js/popper.min.js"></script>
     <script src="link/js/sweetalert.min.js"></script>
</body>
</html>