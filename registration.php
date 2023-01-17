<?php      
    session_start();
    include('connection.php');  
    $email = $_POST['email'];
    $username = $_POST['user']; 
    $password = $_POST['pass']; 
    $pno = $_POST['pno'];
    $error = "username/password incorrect";
    $success = "Registration Successful"; 
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email); 
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($con, $email);
        $pno = mysqli_real_escape_string($con, $pno);
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $query = "select *from users where username='$username'";
        $result = mysqli_query($con, $query);  

        if(mysqli_num_rows($result) != 0) { // if user exists
          $_SESSION['error'] = $error;
          header("Location: Signup.php");
        }
        else {
          $query = "INSERT INTO users (username, email, p_no, Password) 
                      VALUES('$username', '$email', '$pno', '$password')";
          $_SESSION['success'] = $success;
          mysqli_query($con, $query);
          header("Location: login.php");
        }
?>  