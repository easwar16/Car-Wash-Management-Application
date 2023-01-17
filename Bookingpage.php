<?php 
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "cwmsdb";  

include('includes/config.php');
  
$con = mysqli_connect($host, $user, $password, $db_name);  

if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error()); 
}
if(isset($_POST['book']))
{
    $ptype=$_POST['packagetype'];
    $wpoint=$_POST['washingpoint'];   
    $wpoin=$_POST['City'];
    $fname=$_POST['fname'];
    $mobile=$_POST['contactno'];
    $date=$_POST['washdate'];
    $time=$_POST['washtime'];
    $message=$_POST['message'];
    $status='Pending';
    $bno=mt_rand(100000000, 999999999);
    $r="SELECT * FROM tblcarwashbooking WHERE washDate='$date'";
    $res=mysqli_query($con,$r);
    $rowcnt=mysqli_num_rows($res);
    $sql="INSERT INTO tblcarwashbooking(bookingId,packageType,carWashPoint,fullName,mobileNumber,washDate,washTime,message,status,City) VALUES(:bno,:ptype,:wpoint,:fname,:mobile,:date,:time,:message,:status,:wpoin)";
    $query = $dbh->prepare($sql);
    if($rowcnt == 5)
    {
        echo "<script>alert('Select Different Date')</script>";
        header("Lecation: bookingpage.php");
    }
    else
    {
        $query->bindParam(':bno',$bno,PDO::PARAM_STR);
        $query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
        $query->bindParam(':wpoint',$wpoint,PDO::PARAM_STR);
        $query->bindParam(':fname',$fname,PDO::PARAM_STR);
        $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
        $query->bindParam(':date',$date,PDO::PARAM_STR);
        $query->bindParam(':time',$time,PDO::PARAM_STR);
        $query->bindParam(':message',$message,PDO::PARAM_STR);
        $query->bindParam(':status',$status,PDO::PARAM_STR);
        $query->bindParam(':wpoin',$wpoin,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
        
        echo '<script>alert("Your booking done successfully. Booking number is "+"'.$bno.'")</script>';
        echo "<script>window.location.href ='booking-pg.php'</script>";
        }
        else 
        {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        }

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CWMS | Booking</title>
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
            function dateval() {
                var today = new Date();
                d = document.f.washdate.value;
                today = Date.parse(today);
                d = Date.parse(d);
                if(d<today)
                {
                    alert("Date is not valid");
                    return false;
                }
            }
                
        </script>
    </head>

    <body>
<?php include_once('includes/headerlogout.php');?>

 <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <h2>New Booking</h2>
                </div>
        </div> 
        
<form name="f" onsubmit="return dateval()" method="POST">   
  <p>
  <select name="packagetype" required class="form-control">
                    <option value="">Select Services</option>
                        <?php $sql = "SELECT * from tblservices";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        foreach($results as $result)
                        {               ?>  
                            <option value="<?php echo htmlentities($result->S_id);?>"><?php echo htmlentities($result->services);?> </option>
                        <?php } ?>
                </select>
            </p>
            <p>
                <select name="washingpoint" required class="form-control">
                    <option value="">Select Washing Point</option>
                        <?php $sql = "SELECT * from tblwashingpoints";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        foreach($results as $result)
                        {               ?>  
                            <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->washingPointName);?> (<?php echo htmlentities($result->washingPointAddress);?>)</option>
                        <?php } ?>
                </select>
            </p>
            <p>
                <select name="City" required class="form-control">
                    <option value="">Select City</option>
                        <?php $sql = "SELECT * from tblwashingpoints";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        foreach($results as $result)
                        {               ?>  
                            <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->City);?></option>
                        <?php } ?>
                </select>
            </p>
            <p><input type="text" name="fname" class="form-control" required placeholder="Full Name"></p>
            <p><input type="text" name="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Mobile No."></p>
            <p>Wash Date <br /><input type="date" name="washdate" required class="form-control"></p>
             <p>Wash Time <br /><input type="time" name="washtime" required class="form-control"></p>
             <p><textarea name="message"  class="form-control" placeholder="Message if any"></textarea></p><div class="container">
            <div class="col-md-12 text-center">
                <button class="btn btn-custom" type="submit" name="book">Book Now</button>
            </div>
      </form>
        
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
        <script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
   <!--  -->

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>