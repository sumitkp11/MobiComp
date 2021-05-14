<?php

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'id12395231_sumit97');
   define('DB_PASSWORD', 'sumit1197');
   define('DB_DATABASE', 'id12395231_sumit97');
   $connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   session_start();
  
   if(isset($_POST["login"]))  
 {  
      if(empty($_POST['username']) || empty($_POST['password']))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST['username']);  
           $password = mysqli_real_escape_string($connect, $_POST['password']);  
           $query = "SELECT * FROM notifier_login WHERE username = '$username'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;  
                          $_SESSION['username'] = $username;  
                          header("location: oem_welcome.php");  
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Cannot match user data")</script>';  
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Unable to connect to DB")</script>';  
           }  
      }  
 }  
?>
<html>
<head>
    <title>MobiComp| OEM Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel='icon' href='favicon.ico' type='image/x-icon'/ >
    <style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>

<body bgcolor="#f1f1f1">
     <!-- Responsive header -->
   <div class="header">
  <a href="http://sumitkp.xyz/notifier_desktop/admin.php" class="logo">Notifier | Admin Panel</a>
  <div class="header-right">
    <a class="active"  href="javascript:void(0)" onclick="window.location.href='index.php';">Home</a>
    
    <a  href="javascript:void(0)" onclick="window.location.href='logout.php';">Sign Out</a>
    
  </div>
</div>
  <h2>Login Form</h2>
    <p>For testing:<br> <b>Username:</b>qwe<br><b>Password:</b>asd<br></p>
<form method="post">
  <fieldset>

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="login" value="login">Login</button>
    
  </div>
    
    </fieldset>
  
</form>
    
    <br>
    <br>






    </body>    

</html>
