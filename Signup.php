<?php error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];   
$subject=$_POST['subject'];
$message=$_POST['message'];

$sql="INSERT INTO tblenquiry(FullName,EmailId,Subject,Description) VALUES(:name,:email,:subject,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
 echo "<script>alert('Query sent successfully');</script>";
 echo "<script>window.location.href ='contact.php'</script>";
}
else 
{
 echo "<script>alert('Something went wrong. Please try again.');</script>";
}

}

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CWMS | Contact Us</title>
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
        <script>
        function validatePassword() {
            var p = document.getElementById('pass').value,
                errors = [];
            if (p.length <= 8) {
                errors.push("Your password must be at least 8 characters"); 
            }
            if (p.search(/[a-z]/i) < 0) {
                errors.push("Your password must contain at least one letter.");
            }
            if (p.search(/[0-9]/) < 0) {
                errors.push("Your password must contain at least one digit."); 
            }
            if (errors.length > 0) {
                alert(errors.join("\n"));
                return false;
            }
            return true;
        }
    </script>
    </head>

    <body>
<?php include_once('includes/header.php');?>

        
        
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Sign Up</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <h2>Sign Up for Booking</h2>
                </div>
                <div class="row">
<?php 
$sql = "SELECT * from tblpages where type='contact'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{       
?>


                    
                <?php } ?>
                
        <div class="cotainer ">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    
                        
                            <form name="f" action="registration.php" action="JavaScript:validatePassword()" onsubmit="return validateForm()" method="POST">

                                

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-6">User Name
                                        </label>
                                    <div class="col">
                                        <input type="text" id="user" class="form-control" name="user"
                                            required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col">Email
                                        </label>
                                    <div class="col justify-content-center">
                                        <input type="text" id="email" class="form-control justify-content-center" name="email"
                                            required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="p_no" class="col-md-6">Phone No
                                        </label>
                                    <div class="col">
                                        <input type="text" id="pno" class="form-control" name="pno"
                                            required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-6">Password</label>
                                    <div class="col">
                                        <input type="password" id="pass" class="form-control" name="pass"
                                            required>
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="password" class="col-md-6">Retype Password</label>
                                    <div class="col">
                                        <input type="password" id="repassword" class="form-control" name="repass"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                <input name="Submit"  type="submit" value="Register" />
                                        
                                    </button>
                                </div>
                            </form>
                        <?php 
                            if(isset($_SESSION["error"]))
                            {
                                echo '<script>
                                alert("User already exists");
                                </script>';
                            }
                        ?>
                        </form>
                </div>
            </div>
        </div>
        </div>
    </div>


        
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
   <script>
        function validatePassword() {
    var p = document.getElementById('pass').value,
        errors = [];
    if (p.length <= 8) {
        errors.push("Your password must be at least 8 characters"); 
    }
    if (p.search(/[a-z]/i) < 0) {
        errors.push("Your password must contain at least one letter.");
    }
    if (p.search(/[0-9]/) < 0) {
        errors.push("Your password must contain at least one digit."); 
    }
    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }
    return true;
}
    </script>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>