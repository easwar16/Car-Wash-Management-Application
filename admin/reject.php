<?php
                  session_start();
                  error_reporting(0);
                  if(isset($_POST['bt2']))
                  {
                  include('config.php');
                  $id = $_GET['id'];
    
                  $query = "UPDATE tblcarwashbooking SET `status`='Rejected' WHERE booking_id = '$id';";
                    if(performQuery($query)){
                      echo "Account has been rejected.";

                    }else{
                      echo "Unknown error occured. Please try again.";
                    }

                  ?>
                  ?>
                  <?php } ?>