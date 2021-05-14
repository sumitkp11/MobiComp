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
    <style>
        /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
    </style>
    
<!-- START OF LIVE SEARCH JAVASCRIPT -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("oem_device_backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
<!-- END OF LIVE SEARCH JAVASCRIPT -->
   
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
<form action="#modify" method="post">
    <fieldset>
            <legend>Modify Device Specs</legend>
            <!--Start of Live Search Here-->
							    <div class="search-box">
							 <form action="oem_modify_device.php#modify" method="POST" >
							   <input type="text" name="search_oem_device" placeholder="Search OEM Device" autocomplete="off"  />
							 	<center> <div class="center-content">
											<input type="submit" value="SEARCH" class="btn btn-lg">
										  </div>
										 
								    </center>
							  <div class="result"></div>
							  </form>
							 
						
							</div>

							<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js">
							</script>
							</center>
							
				<!--End of Live Search Here-->			
						
            
            
            
            <!--
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
-->
     
     
 </form>
 
<section id="modify" class="modify">
    <center><h1>You have selected <?php echo $_POST['search_oem_device'];?> model:</h1></center>
    <form action="oem_modify_device_sql.php" method="post">
         <label for="Modify Current Device"><Enter specs of your Device:</b></label>
            <br>
            <br>
            <!-- OEM: <input type="text"   name="oem" value="<?php echo $_SESSION["username"]; ?>" readonly>
            <input type="hidden" name="oem" value="<?php echo $_SESSION["username"]; ?>" > 
            <br>
            <br> -->
            Model: <input type="text"   name="model" value="<?php echo $_POST['search_oem_device']; ?>" readonly>
             <input type="hidden" name="model" value="<?php echo $_POST['search_oem_device']; ?>" >
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
        
        
    </form>
        
    
    
</section>
      
</body>    

</html>
