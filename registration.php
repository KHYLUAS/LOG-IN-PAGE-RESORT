<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form </title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<?php
      include ('db.php');
      $username="";
      $email="";
      $password = "";
      $message="";

      // When form submitted, insert values into the database.
      if (isset($_POST['submit'])) {
          // removes backslashes
          $username = stripslashes($_POST['username']);
          //escapes special characters in a string
          $username = mysqli_real_escape_string($connection, $username);
          $email    = stripslashes($_POST['email']);
          $email    = mysqli_real_escape_string($connection, $email);
          $password = stripslashes($_POST['password']);
          $password = mysqli_real_escape_string($connection, $password);

          $sql="SELECT * FROM tbl_data WHERE username='$username'";
          $result= mysqli_query($connection,$sql);
          $row=mysqli_fetch_assoc($result);
         
          if ($row) {
                       
                    $message="Username: already exist!";
                    
          } else {
            
            $query    = "INSERT into tbl_data (username, password, email)
            VALUES ('$username', '" .md5($password) . "', '$email')";
            if(mysqli_query($connection,$query))
            {
               $message="Created account succesfully.";
               $firstname="";
               $lastname="";
               $password="";
               $email="";
            }
            else
            {  
                 $message="ERROR".$query."<br>".mysqli_error($connection);
    
            }
          }
          mysqli_close($connection);
      }
    ?>




<div class="wrapper">
<div class="logindesign">

        <form action="" method="POST">
            <center><h3>Registration</h3></center>
            <center style="color:black;"><?php echo $message; ?></center>

            <div class="input-box">
            <input type="text" placeholder="Username" name="username" value="" required>
            <i class='bx bxs-user'></i>
             </div>
          
             <div class="input-box">
            <input type="text" placeholder="Password" name="password" value="<?php echo $password; ?>" required>
            <i class='bx bxs-lock-alt' ></i>
               </div>

             <div class="input-box">  
            <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            <i class='bx bxs-envelope' ></i>
            </div>

            <button class="btn" type="submit" name="submit" value="create"><b>Create Account</b></button>
        </form>

        <div class="register-link">
            <p>Already have an account? <a href="index.php">Click here to Log in</a></p>
        </div>
    </div>
</div>


<!--</body>
</html>
<body>
<div class="wrapper">
    <form action="" method ="post">
    <center ></center>
      <h1>Registration</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" name="uname" value="" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Password" name="password" value="" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Email" name="mail" value="" required>
        <i class='bx bxs-envelope' ></i>
      </div>
     
      <button type="submit" class="btn">Sign up</button>
      <div class="register-link">
        <p>Already have an account?<a href="index.php"> Click here to Log in</a></p>
      </div>
    </form>
  </div>
</body>
</html>--->




