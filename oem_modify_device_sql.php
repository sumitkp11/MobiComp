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

$sql = "UPDATE phones SET display_size='$device_display_size', cpu = '$device_cpu', ram = '$device_ram', internal_memory = '$device_internal_memory', price = '$device_price' WHERE model = '$device_model' ";


if ($conn->query($sql) === TRUE) {
    
    echo "Your specs for the device".$device_model."has been modified successfully";
	echo "<script>window.location = 'https://sumitkp.xyz/mobi_comp/oem_modify_device.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "Press back to try again or copy the URL in the address bar: https://sumitkp.xyz/mobi_comp/oem_modify_device.php ";
}

$conn->close();
?>