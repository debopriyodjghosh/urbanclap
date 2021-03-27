<?php
include "db_conection.php";
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
$sp_rate = $_POST["sp_rate"];
$sp_ac = $_POST["sp_ac"];
$sp_ifsc = $_POST["sp_ifsc"];
$sp_city = $_POST["sp_city"];
$s_name = $_POST["s_name"];
$pass = $_POST["pass"];

$sql = "INSERT INTO `service_provider`( `sp_name`, `sp_add`, `sp_contact`, `sp_email`, `sp_exp`, `sp_rate`, `sp_account_no`, `sp_IFSC_no`, `sp_city`, `s_name`, `password`) VALUES ( '$sp_name', '$sp_add', '$sp_contact', '$sp_email', '$sp_exp', '$sp_rate', '$sp_ac', '$sp_ifsc', '$sp_city', '$s_name', '$pass')";

if ($dbcon->query($sql) === TRUE) {
	$sql = "UPDATE service set No_sp =No_sp + 1 where s_name='$s_name'";
	$result = $dbcon->query($sql);
	echo "<script>alert('You are registered successfully!')</script>";
	echo "<script>window.open('index.php?','_self')</script>";

	#header("Location: index.php");
	?>
	
	<a href="index.php"><h2>Back to home</h2></a><?php

}
else {
echo "<script>alert('Try with different id. You are already registered !')</script>";
echo "<script>window.open('spregfrm.php?','_self')</script>";?>
<a href="spregfrm.php"><h2>Back to previous page</h2></a>   
<?php 
}
?>
</html>