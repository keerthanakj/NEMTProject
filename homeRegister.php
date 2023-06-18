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
    <h1>Register Now</h1>
    </section>

     <!---------registration---------->
     <?php include('register.php') ?>

     <!----------Footer------->
     <footer class="container-fluid bg-dark mt-5 text-white">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6">
                    <span class="pr-2 text-right">Follow Us: 
                    <a href="#" target="blank" class="pr-2 fi-color">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" target="blank" class="pr-2 fi-color">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" target="blank" class="pr-2 fi-color">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" target="blank" class="pr-2 fi-color">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" target="blank" class="pr-2 fi-color">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                    </span>
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
    <script src="link/js/popper.main.js"></script>
    <script src="link/js/jquery.min.js"></script>
    <script src="link/js/all.min.js"></script>
    <script src="link/js/bootstrap.min.js"></script>
    <script src="link/js/sweetalert.min.js"></script>
    
</body>
</html>