<!DOCTYPE html>
<html lang>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>




<?php
include('db.php');

$message = "";
if (isset($_POST['submit'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($connection, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "select * from tbl_data where username = '$username' and 
			password = md5('$password')";
			
			$result = mysqli_query($connection,$query);
			$row = mysqli_num_rows($result);	

    if ($row) {
        // Start a session and store user information if login is successful
        session_start();
        header('location:booking.php');
        $_SESSION['username'] = $username;
        exit(); // Make sure to exit after header to prevent further execution
    } else {
        $message = "No account found!";
    }

    mysqli_close($connection);
}
?>






  
  <div class="wrapper">
          <div class="logindesign">
             
              <form action="" method="POST">
              <center><h1>Login</h1></center>
                  <center style="color:black;"><?php echo $message; ?> </center>

                  <div class="input-box">
                  <input type="text" placeholder="Username" name="username" value="" required>
                  <i class='bx bxs-user'></i>
                  </div>

                  <div class="input-box">
                  <input type="text" placeholder="Password" name="password"required>
                  <i class='bx bxs-lock-alt' ></i>
                  </div>

                  <button class="btn" type="submit" name="submit"><b>Login</b></button><br>


              </form>
              <div class="register-link">
                  <p> Don't have an account?<a href="registration.php"> Registration</a></p>
              </div>
           </div>
    </div>

</body>
</html>





 <!--- <div class="wrapper">
  <form action="" method ="post">
  <center </center>
      <h1>Login</h1>
      <div class="input-box">
    
        <input type="text" placeholder="Username" name="uname" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        
      
        <input type="password" placeholder="Password" name="password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Dont have an account? <a href="registration.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>---->