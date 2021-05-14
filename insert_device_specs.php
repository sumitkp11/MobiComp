<?php
$servername = "localhost";
$db_username = "id12395231_sumit97";
$db_password = "sumit1197";
$db_name = "id12395231_sumit97";

$device_oem = $_POST['oem'];
$device_model = $_POST['model'];
$device_display_size = $_POST['display_size'];
$device_cpu = $_POST['cpu'];
$device_ram = $_POST['ram'];
$device_internal_memory = $_POST['internal_memory'];
$device_price = $_POST['price'];
// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO phones (oem,model,display_size,cpu,ram,internal_memory,price)
VALUES ('$device_oem','$device_model','$device_display_size','$device_cpu','$device_ram','$device_internal_memory','$device_price')";

$sql2 = "INSERT INTO phones_rating(model,total_votes,likes,dislikes) VALUES ('$device_model',0,0,0)";

if ($conn->query($sql) && $conn->query($sql2) == TRUE) {
    echo "Your specs for the device".$device_model."has been inserted successfully";
	echo "<script>window.location = 'https://sumitkp.xyz/mobi_comp/oem_welcome.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "Press back to try again or copy the URL in the address bar: https://sumitkp.xyz/mobi_comp/insert_device.php ";
}

$conn->close();
?>