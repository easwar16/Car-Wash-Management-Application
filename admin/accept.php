<?php
    session_start();
    error_reporting(0);
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "cwmsdb";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error()); 
    }
    $id = $_POST['id'];
    $query = "select * from tblcarwashbooking where bookingId = '$id'; ";
    $q=mysqli_query($con,$query);
    if($_POST['action']=="accept")
    {
      if(mysqli_num_rows($q))
      {
          $res = "UPDATE tblcarwashbooking SET status='Approved' WHERE bookingId = '$id';"; 
          echo "<script>alert('Account has been accepted.')</script>";
          mysqli_query($con,$res);
          header("Location: accept-reject-pg.php");

      }
    }
    else if($_POST['action']=="reject")
    {
      if(mysqli_num_rows($q))
      {
          $res = "UPDATE tblcarwashbooking SET status='Rejected' WHERE bookingId = '$id';"; 
          echo "<script>alert('Account has been accepted.')</script>";
          mysqli_query($con,$res);
          header("Location: accept-reject-pg.php");

      }
    }
?>
