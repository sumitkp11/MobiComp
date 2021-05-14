<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'id12395231_sumit97');
   define('DB_PASSWORD', 'sumit1197');
   define('DB_DATABASE', 'id12395231_sumit97');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   session_start();
   
   $user_check = $_SESSION['username'];
   
   $ses_sql = mysqli_query($db,"select username from notifier_login where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
    if(!isset($_SESSION['username'])){
      header("location:lounge_area.php");
      die();
   }
?>