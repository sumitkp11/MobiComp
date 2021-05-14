<?php
define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'id12395231_sumit97');
   define('DB_PASSWORD', 'sumit1197');
   define('DB_DATABASE', 'id12395231_sumit97');
   $connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password1 = password_hash($password, PASSWORD_DEFAULT);  
           $query = "INSERT INTO customer_login(username, password) VALUES('$username', '$password1')";  
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Registration Done")</script>';  
           }  
      }  
 }  
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifier | Register</title>
</head>
<body>
    <h3 align="center">Register</h3>  
                <br />  
                <form method="post" >  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="text" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                     <p align="center"><a href="admin.php?action=login">Login</a></p>  
                </form>  
</body>
</html>
