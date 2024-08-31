<?php session_start();

    if(!isset($_SESSION['user'])){
        header('location:index.php');
    }

    else{
        $user = $_SESSION['user'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class = "logout-box">
    <h3>Dear <?php echo $user . ","; ?></h3>
    <p>Warmest greetings! We are delighted to inform you that you have successfully logged in to our website and completed your final exam. Congratulations on this significant achievement!</p>
    <p>Click here to <a href="logout.php">LOG OUT</a></p>
    </div>
</body>
</html>