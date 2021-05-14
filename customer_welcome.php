<?php
   include('session.php');
   if(!isset($_SESSION["username"]))  
 {  
      header("location:admin.php");  
 }  
?>
<html>
<head>
    <title>Mobile Comparison | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    
    <link rel='icon' href='favicon.ico' type='image/x-icon'/ >
    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    
<style type="text/css">
.about1
{
    margin: 0 auto;
     padding: 20px;

</style>

<!-- START of rating system -->

	<script type="text/javascript">
  
    function insert_like_phone1()
    {
	  $.ajax({
	    type: 'post',
	    url: 'store_rating.php',
	     data: {
	      post_like:"like"
	    },
	    success: function (response) {
 	      $('#totalvotes').slideDown()
	      {			
	        $('#totalvotes').html(response);
	      }
	    }
	    });
    }

    function insert_dislike_phone1()
    {
	  $.ajax({
	    type: 'post',
	    url: 'store_rating.php',
	    data: {
	      post_dislike:"dislike"
	    },
	    success: function (response) {
 	      $('#totalvotes').slideDown()
	      {			
	        $('#totalvotes').html(response);
	      }
	    }
	    });
    }
    
    
    function insert_like_phone2()
    {
	  $.ajax({
	    type: 'post',
	    url: 'store_rating2.php',
	     data: {
	      post_like2:"like"
	    },
	    success: function (response) {
 	      $('#totalvotes2').slideDown()
	      {			
	        $('#totalvotes2').html(response);
	      }
	    }
	    });
    }

    function insert_dislike_phone2()
    {
	  $.ajax({
	    type: 'post',
	    url: 'store_rating2.php',
	    data: {
	      post_dislike2:"dislike"
	    },
	    success: function (response) {
 	      $('#totalvotes2').slideDown()
	      {			
	        $('#totalvotes2').html(response);
	      }
	    }
	    });
    }
</script>
<!-- END of rating system -->
  
</head>

<body bgcolor="#f1f1f1">
    
      <!-- Responsive header -->
    <div class="header">
  <a  href="javascript:void(0)" onclick="window.location.href='welcome.php';" class="logo">Mobile Comparison | Welcome</a>
  <div class="header-right">
    <a class="active" href="javascript:void(0)" onclick="window.location.href='welcome.php';">Home</a>
    <a  href="javascript:void(0)" onclick="window.location.href='post_notification.php';"></a>
    
    <a href="javascript:void(0)" onclick="window.location.href='logout.php';">Sign Out</a>
    
  </div>
</div>
<hr>
     <?php  
                echo '<h2>Welcome User: '.$_SESSION["username"].'</h2>';
                ?>
  <p>
    <!-- START OF DROP DOWN LIST OF PHONE MODELS -->
    <p>Incomplete - Fetching list of mobile phones directly from database.</p>
     <div class="col-md-12">
         
						<h3 id="about" class="title text-center">Choose phones to<span> compare:</span></h3>
						<h3><center>You can select only two <span> phones</span> at a time.</center></h3>
						<center>
<form action="#about"  method="POST" >
<input type="text" list="phone1" name="phone1_search" placeholder="Enter first phone" alight="left" required>
  <datalist id="phone1">
  <option value="iPhone 6">
</datalist>

<input type="text" list="phone2" name="phone2_search" placeholder="Enter second phone" alight="right" required>
  <datalist id="phone2">
  <option value="iPhone 6">
  <option value="iPhone 6s">
  <option value="iPhone 6 Plus">
</datalist>
		 <br><br><input type="submit" value="COMPARE">
		 </form>
		
						<div class="space"></div>
						
						<div class="space"></div>
						
						
					</div> 
	<!-- END OF DROP DOWN LIST OF PHONE MODELS -->
  </p>
  
<!-- START OF DISPLAYING SPECS IN TABLES -->
      <section id='about'>
          <div class="about1">
<center>
 <?php
$link = mysqli_connect("localhost", "id12395231_sumit97", "sumit1197", "id12395231_sumit97");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution of first phone
$phone1 = $_POST['phone1_search'];
 $_SESSION["phone1"]= $_POST['phone1_search'];
echo $phone1;
$sql  = "SELECT * FROM phones WHERE model = '$phone1' ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border=\"2\">";
            echo "<tr>";
                echo "<th>Model</th>";
                echo "<th>Display Size</th>";
                echo "<th>CPU</th>";
                echo "<th>RAM</th>";
                echo "<th>Internal Memory</th>";
                echo "<th>Price(INR)</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['display_size'] . "</td>";
                echo "<td>" . $row['cpu'] . "</td>";
                echo "<td>" . $row['ram'] . "</td>";
                 echo "<td>" . $row['internal_memory'] . "</td>";
                  echo "<td>" . $row['price'] . "</td>";
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
echo "<br>";
echo "<br>";
// Attempt select query execution of second phone
$phone2 = $_POST['phone2_search'];
 $_SESSION["phone2"]= $_POST['phone2_search'];
echo $phone2;
$sql  = "SELECT * FROM phones WHERE model = '$phone2' ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border=\"2\">";
            echo "<tr>";
                echo "<th>Model</th>";
                echo "<th>Display Size</th>";
                echo "<th>CPU</th>";
                echo "<th>RAM</th>";
                echo "<th>Internal Memory</th>";
                echo "<th>Price(INR)</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['display_size'] . "</td>";
                echo "<td>" . $row['cpu'] . "</td>";
                echo "<td>" . $row['ram'] . "</td>";
                 echo "<td>" . $row['internal_memory'] . "</td>";
                  echo "<td>" . $row['price'] . "</td>";
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
</center>
  </p>
  <br>
  <br>
  </div>
      </section>
<!-- END OF DISPLAYING SPECS IN TABLES -->
<hr> 
<!-- START of Mobile Rating System -->

<div class="column">
<h2>Mobile Ratings:</h2>
<p><b>For <?php echo $_POST['phone1_search']; ?></b></p>
                                        <input type="image" src="images/like.png" onclick="insert_like_phone1();" id="like_button">
                                          <input type="image" src="images/dislike.png" onclick="insert_dislike_phone1();" id="dislike_button">
                                          <div id="totalvotes"></div>
</div>

<div class="column">

<p><b>For <?php echo $_POST['phone2_search']; ?></b></p>
                                        <input type="image" src="images/like.png" onclick="insert_like_phone2();" id="like_button">
                                          <input type="image" src="images/dislike.png" onclick="insert_dislike_phone2();" id="dislike_button">
                                          <div id="totalvotes2"></div>
</div>
<!-- END of Mobile Rating System -->
<hr>
<h2>Comments:</h2>
</body>    

</html>
