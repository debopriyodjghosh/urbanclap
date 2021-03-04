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
session_start();
?>


<html>
<title>SP User Sign Up</title>



<?php

$sp_name = $_POST["sp_name"];
$sp_add = $_POST["sp_add"];
$sp_contact = $_POST["sp_contact"];
$sp_email = $_POST["sp_email"];
$sp_exp = $_POST["sp_exp"];
$sp_rating = $_POST["sp_rate"];

$sp_ac = $_POST["sp_ac"];
$sp_ifsc = $_POST["sp_ifsc"];

$sp_city = $_POST["sp_city"];
$s_name = $_POST["s_name"];

$pass = $_POST["pass"];


$sql = "INSERT INTO `service_provider`( `sp_name`, `sp_add`, `sp_contact`, `sp_email`, `sp_exp`, `sp_rate`, `sp_account_no`, `sp_IFSC_no`, `sp_city`, `s_name`, `password`) VALUES ( '$sp_name', '$sp_add', '$sp_contact', '$sp_email', '$sp_exp', '$sp_rate', '$sp_ac', '$sp_ifsc', '$sp_city', '$s_name', '$pass')";

if ($conn->query($sql) === TRUE) {

	$sql = "UPDATE service set No_sp =No_sp + 1 where s_name='$s_name'";
	$result = $conn->query($sql);


?>
	<label style="color:#FF6347"><b>success</b></label>
<?php
} else {
?>
	<label style="color:#FF6347"><b>User Already Exists, Try with Different ID<br>or<br>Wrong Info Provided</b></label><?php
</body>

</html>