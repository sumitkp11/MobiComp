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
    <a  href="javascript:void(0)" onclick="window.location.href='oem_modify_device.php';">Modify Device</a>
    <a href="javascript:void(0)" onclick="window.location.href='logout.php';">Sign Out</a>
    
  </div>
</div>
     <?php  
                echo '<h1>Welcome - '.$_SESSION["username"].'</h1>';
                ?>
 
 <!-- Start of Insert New Device -->
<div id="notification_form">
<form action="insert_device_specs.php" method="post">
    <fieldset>
            <legend>Insert New Phone</legend>
        <div>
            <label for="New Device"><Enter specs of your Device:</b></label>
            <br>
            <br>
            OEM: <input type="text"   name="oem" value="<?php echo $_SESSION["username"]; ?>" readonly>
            <input type="hidden" name="oem" value="<?php echo $_SESSION["username"]; ?>" >
            <br>
            <br>
            Model: <input type="text"   name="model" required>
            <br>
            <br>
            Display Size: <input type="text"   name="display_size" required>
            <br>
            <br>
            CPU: <input type="text"   name="cpu" required>
            <br>
            <br>
            RAM: <input type="text"   name="ram" required>
            <br>
            <br>
            Internal Memory: <input type="text"   name="internal_memory" required>
            <br>
            <br>
            Price: <input type="text"   name="price" required>
            <br>
            <br>
            <input id="submitbutton" type="submit" value="Submit" name="submit_device" />
            
            <?php echo $success_notification; ?>
        </div>
        <br>
    </fieldset>
</form>
</div>
<!-- End of Insert New Device -->
     
     
 </form>
      
</body>    

</html>
