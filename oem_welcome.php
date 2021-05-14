<?php
   include('session.php');
   if(!isset($_SESSION["username"]))  
 {  
      header("location:admin.php");  
 }  
?>
<html>
<head>
    <title>MobiComp| OEM Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel='icon' href='favicon.ico' type='image/x-icon'/ >
    
</head>

<body bgcolor="#f1f1f1">
    
      <!-- Responsive header -->
    <div class="header">
  <a  href="javascript:void(0)" onclick="window.location.href='oem_welcome.php';" class="logo">OEM Panel | Welcome</a>
  <div class="header-right">
    <a class="active" href="javascript:void(0)" onclick="window.location.href='oem_welcome.php';">Home</a>
    <a  href="javascript:void(0)" onclick="window.location.href='oem_insert_device.php';">Insert Device</a>
    <a  href="javascript:void(0)" onclick="window.location.href='oem_modify_device.php';">Modify Specs</a>
    <a href="javascript:void(0)" onclick="window.location.href='logout.php';">Sign Out</a>
    
  </div>
</div>
     <?php  
                echo '<h1>Welcome - '.$_SESSION["username"].'</h1>';
                ?>
  <p>
      Describe above menu:
       <ul>
           <li><b>Home: </b>Go to Welcome OEM Panel Home.</li>
           <li><b>Insert Device: </b>Enter specs of new phones</li>
           <li><b>Modify Specs: </b>Modify or Delete specs of phones.</li>
           <li><b>Sign out: </b> Sign out from your session.</li>
       </ul>
  </p>
      
</body>    

</html>
