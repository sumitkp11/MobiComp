<?php
   include('session.php');
   if(!isset($_SESSION["username"]))  
 {  
      header("location:admin.php");  
 }  
?>
<html>
<head>
    <title>Notifier Desktop | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel='icon' href='favicon.ico' type='image/x-icon'/ >
    
</head>

<body bgcolor="#f1f1f1">
    
      <!-- Responsive header -->
    <div class="header">
  <a  href="javascript:void(0)" onclick="window.location.href='welcome.php';" class="logo">Mobile Comparison | Welcome</a>
  <div class="header-right">
    <a class="active" href="javascript:void(0)" onclick="window.location.href='welcome.php';">Home</a>
    <a  href="javascript:void(0)" onclick="window.location.href='post_notification.php';"></a>
    <a  href="javascript:void(0)" onclick="window.location.href='post_lottery_number.php';">Post Lottery #</a>
    <a href="javascript:void(0)" onclick="window.location.href='logout.php';">Sign Out</a>
    
  </div>
</div>
     <?php  
                echo '<h1>Welcome - '.$_SESSION["username"].'</h1>';
                ?>
  <p>
      <?php
$link = mysqli_connect("localhost", "id12395231_sumit97", "sumit1197", "id12395231_sumit97");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution of first phone
$phone1 = $_POST['phone1_search'];
echo $phone1;
$sql  = "SELECT * FROM phones WHERE model = '$phone1' ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border=\"2\">";
            echo "<tr>";
                echo "<th>MODEL</th>";
                echo "<th>DISPLAY SIZE</th>";
                echo "<th>CPU</th>";
                echo "<th>RAM</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['display-size'] . "</td>";
                echo "<td>" . $row['cpu'] . "</td>";
                echo "<td>" . $row['ram'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Attempt select query execution of second phone
$phone2 = $_POST['phone2_search'];
echo $phone2;
$sql  = "SELECT * FROM phones WHERE model = '$phone2' ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border=\"2\">";
            echo "<tr>";
                echo "<th>MODEL</th>";
                echo "<th>DISPLAY SIZE</th>";
                echo "<th>CPU</th>";
                echo "<th>RAM</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['display-size'] . "</td>";
                echo "<td>" . $row['cpu'] . "</td>";
                echo "<td>" . $row['ram'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>
  </p>
      
</body>    

</html>
