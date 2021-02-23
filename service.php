<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urbanclap";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>


<html>
<title>service list</title>


	
<?php

$s_name=$_POST["s_name"];
$s_desc=$_POST["s_desc"];

$sql = "INSERT INTO `service` ( `s_name`, `s_desc`) VALUES ( '$s_name', '$s_desc')";

if ($conn->query($sql) === TRUE) {
    ?>
	<label style="color:#3CB371"><b>New Service added </b></label>
<?php
}
 else {
    ?>
	<label style="color:#FF6347"><b>User Already Exists<br>or<br>Wrong Info Provided</b></label><?php
}

$conn->close();
?>





</body>
</html>