<?php
session_start(); 
$phone2 = $_SESSION["phone2"];

if(isset($_POST['post_like2']))
{
    

    $link = mysqli_connect("localhost", "id12395231_sumit97", "sumit1197", "id12395231_sumit97"); 
	// Check connection
    	if($link === false){
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	} 
 
  
  $update = "UPDATE phones_rating SET total_votes=total_votes+1,likes=likes+1 WHERE model ='$phone2' ";
  $select = "SELECT * FROM phones_rating";
   if($update_result = mysqli_query($link, $update)){
  if($result = mysqli_query($link, $select)){
	if(mysqli_num_rows($result) > 0){
  while($row=mysqli_fetch_array($result))
  {
	$total_votes=$row['total_votes'];
	$likes=$row['likes'];
	$dislikeS=$row['dislikeS'];

    echo "<p id='total_rating'>Total Ratings ( ".$total_votes." )</p>";
    echo "<p id='total_like'><img src='images/like.png'>".$likes." people like this phone";
    echo "<p id='total_dislike'><img src='images/dislike.png'>".$dislikeS." people dislike this phone";
    exit();
  }
  // Close result set
    										mysqli_free_result($result);
    									} else{
    										echo "No records matching your query were found.";
    									}
    								} else{
    									echo "ERROR: Could not able to execute $select. " . mysqli_error($link);
    								}
}
else{
    									echo "ERROR: Could not able to execute $update. " . mysqli_error($link);
    								}
}


if(isset($_POST['post_dislike2']))
{
    
  $link = mysqli_connect("localhost", "id12395231_sumit97", "sumit1197", "id12395231_sumit97"); 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
  
  //$dish_name = $_SESSION['dish_name'];
  $update = "UPDATE phones_rating SET total_votes=total_votes+1,dislikes=dislikes+1 WHERE model = '$phone2' ";
  $select = "SELECT * FROM phones_rating";
  
     if($update_result = mysqli_query($link, $update)){
    if($result = mysqli_query($link, $select)){
	if(mysqli_num_rows($result) > 0){
  while($row=mysqli_fetch_array($result))
  {
  	$total_votes=$row['total_votes'];
	$likes=$row['likes'];
	$dislikes=$row['dislikes'];

    echo "<p id='total_rating'>Out of ".$total_votes." people:";
    echo "<p id='total_like'><img src='like.png'>".$likes." people like this phone.";
    echo "<p id='total_dislike'><img src='dislike.png'>".$dislikes." people dislike this phone";
    exit();
  }
  // Close result set
  
mysqli_free_result($result);
}
else{
    	echo "No records matching your query were found.";
	}
    									
    } else{
    									echo "ERROR: Could not able to execute $select. " . mysqli_error($link);
    								}
}
else{
    									echo "ERROR: Could not able to execute $update. " . mysqli_error($link);
    								}
}
?>