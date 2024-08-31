<?php 
define('db_server','localhost');
define('db_username','root');
define('db_password','');
define('db_name','hotel');

$connection = mysqli_connect(db_server,db_username,db_password,db_name);

if($connection == false){die("Error: Could not connect. " . mysqli_connection_error());}
    //echo "Active connection!  " . mysqli_get_host_info($connection)

?>