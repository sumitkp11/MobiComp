<?php  
 //logout.php  
 session_start();  
 session_destroy();  
 header("location:lounge_area.php");  
 ?>  