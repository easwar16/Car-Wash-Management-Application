<?php 
session_start();
error_reporting(0);
include('includes/config.php');
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
         <div class="col-md-12 text-center">
          <h2>Bookings</h2>
            <div class="container">
            <form method = "post">
            <div class="form-group row">
            </div>
             <button type="submit" class="btn btn-custom" name="bt2">Search</button>
            </form>
                <div class="section-header text-center">
                <div class="container">
                <table id="table">
                <caption></caption>
                <thead>
                  <tr>
                  <th>FullName</th>
                  <th>Washing Date</th>
                  <th>Washing Time</th>
                  <th >Status</th>					
                  </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST['bt2']))
                {   $name = $_SESSION['username'];
                    $sql = "SELECT * FROM tblcarwashbooking WHERE fullname='$name'";
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
                                <td><?php echo htmlentities($result->fullName);?></td>
                                <td><?php echo htmlentities($result->washDate);?></td>
                                <td><?php echo htmlentities($result->washTime);?></td>
                                <td><?php echo htmlentities($result->status);?></td>
                                </tr>
                                <?php } ?>
                                <?php } else { ?>
                                <tr>
                                  <td colspan="6" style="color:red;">No Record found</td>

                                </tr>
                                <?php } ?>
                                                </div>
                                    <?php } ?>
                                    <?php   ?>
                                
                                
                                    </tbody>
                              </table>
                            </div> 
                </div>
              </div>
          </div>

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
