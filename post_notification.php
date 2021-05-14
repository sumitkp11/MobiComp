<?php
   include('session.php');
   include('insert_notification.php');
   
   if(!isset($_SESSION["username"]))  
 {  
      header("location:index.php");  
 }  
   
?>
<html>
<head>
    <title>Notifier Desktop | Post Notification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel='icon' href='favicon.ico' type='image/x-icon'/ >
    
</head>

<body bgcolor="#f1f1f1">
   
     <!-- Responsive header -->
    <div class="header">
  <a  href="javascript:void(0)" onclick="window.location.href='post_notification.php';" class="logo">Post Notification</a>
  <div class="header-right">
    <a class="active" href="welcome.php">Home</a>
    <a  href="javascript:void(0)" onclick="window.location.href='post_notification.php';">Post Notification</a>
    <a  href="javascript:void(0)" onclick="window.location.href='post_lottery_number.php';">Post Lottery #</a>
    <a href="javascript:void(0)" onclick="window.location.href='logout.php';">Sign Out</a>
    
  </div>
</div>
  <?php  
                echo '<h1>Welcome - '.$_SESSION["username"].'</h1>';
                ?>
  <p>
      Describe above menu:
       <ul>
           <li><b>Home: </b>Go to Welcome admin page.</li>
           <li><b>Post Notification: </b> Post a new notification.</li>
           <li><b>Post Lottery Number: </b>Post a new Lottery number.</li>
           <li><b>Sign out: </b> Sign out from your session.</li>
       </ul>
  </p>
 <h2>Post Notification:</h2>

<!-- Start of Post Notification -->
<div id="notification_form">
<form action="post_notification.php#notification_form" method="post">
    <fieldset>
            <legend>Post Notification</legend>
        <div>
            <label for="notification"><b>Notification:</b></label>
            <br>
            <br>
            <input type="text"   name="notification" required>
            <br>
            <br>
            <input id="submitbutton" type="submit" value="Submit" />
            
            <?php echo $success_notification; ?>
        </div>
        <br>
    </fieldset>
</form>
</div>
<!-- End of Post Notification -->




<br><br>
<p>You are currently viewing desktop version of this site. </p>
   
   
    </body>    

</html>
