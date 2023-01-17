<?php 
session_start();
error_reporting(0);
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
    </head>

    <body>
<?php include_once('includes/headerlogout.php');?>
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <h2>View By Place</h2>
                </div>

       <div class="container">
        <div class="col-md-12 text-center">
            <form method = "post">
            <div class="form-group row">
            <label for="email_address" class="col-md-4 col-form-label text-md-right">Place</label>
                <div class="col-md-6">
                <input type="text" id="place" class="form-control" name="place" required autofocus>
                </div>
            </div>
             <button type="submit" class="btn btn-custom" name="bt1">Search</button>
            </form>
        </div>
       </div>
            </div>
        </div>
        <div class="container">
            <h2>Recomended Places</h2>
            <table id="table">
            <caption></caption>
            <thead>
              <tr>
              <th>Wasing Point No.</th>
                <th >Washing Point Name</th>
                <th>Washing Point Address</th>							
              </tr>
            </thead>
            <tbody>
            <?php
            if(isset($_POST['bt1']))
            {   
                $place = $_POST['place'];
                $sql = "SELECT * FROM tblwashingpoints WHERE city LIKE '%$place%'";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                    foreach($results as $result)
                    {   ?>
                        <div class="container">
                            <tr>
                            <td><?php echo htmlentities($result->id);?></td>
							<td><?php echo htmlentities($result->washingPointName);?></td>
							<td><?php echo htmlentities($result->washingPointAddress);?></td>
                            </tr>
                            <?php } ?>
                            <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>
                            </div>
                <?php } ?>
            
            </tbody>
			</table>
		</div>
        <br><br>

        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <h2>Get Booking Status</h2>
                </div>

       <div class="container">
        <div class="col-md-12 text-center">
            <a type="Button" class="btn btn-custom" href="getBookings.php">Know Now</a>
        </div>
        <br><br>
           
                </div>
            </div>
        </div>

        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <h2>New Booking</h2>
                </div>
                <div class="col-md-12 text-center">
                 <a type="button" class="btn btn-primarcustom" href="Bookingpage.php">Book Now</a>
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







