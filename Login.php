<?php error_reporting(0);
include('includes/config.php');
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CWMS | LOGIN</title>
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        
    </head>

    <body>
<?php include_once('includes/header.php');?>

        
        
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>LOGIN</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <h2>LOGIN</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form action="authentication.php" method="POST">

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">User Name
                                        </label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="user"
                                            required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="pass"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                        </div>

                        <?php
                            if(isset($_SESSION["error"]))
                            {
                                echo '<script>
                                alert("Username/Password is wrong");
                                </script>';
                            }
                            if(isset($_SESSION["success"]))
                            {
                                echo '<script>
                                alert("Registration Successful");
                                </script>';
                            }
                        ?> 

                        </form>
                        </div>
                    </div>
           
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Footer Start -->



  <?php include_once('includes/footer.php');?>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
   <!--  -->

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>