<?php
session_start();
 include("../config.php");
 ini_set("display_errors","on");

    date_default_timezone_set('Africa/Lagos');      
    $Date = date("M j, Y"); 
    $Time = date("G:i:s");    
    
$ID = $_SESSION['login_user'];
$sql = "insert into login_admin ( id, log_time, log_date, log_type) values ('{$ID}','{$Time}','{$Date}','logout')";
 if(mysqli_query($conn,$sql)){ }
   if(session_destroy()) { echo "<script>window.location.replace('login.php');</script>"; }
?>