<?php
$servername = "localhost";
$db_username = "id12395231_sumit97";
$db_password = "sumit1197";
$db_name = "id12395231_sumit97";

$oem_username = $_POST['username'];
$oem_password = $_POST['password'];
$oem_password_secure = password_hash($password, PASSWORD_DEFAULT);  
// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO notifier_login (username,password)
VALUES ('$oem_username','$oem_password_secure')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you for registering as OEM";
	echo "<script>window.location = 'https://sumitkp.xyz/mobi_comp/lounge_area.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>