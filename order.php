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
$add=$_POST['address'];
	foreach ($_SESSION['cartlist'] as $cart) {
		$c_email=$cart["c_email"];
		$sp_email=$cart["sp_email"];
		$date=$cart["date"];
		$sql = "INSERT INTO `order`( `o_c_email`, `o_sp_email` , `o_add`, `o_date`, `o_status`  ) VALUES ( '$c_email', '$sp_email', '$add', '$date', 'payment pending')";
		if ($conn->query($sql) === TRUE) {
			echo "order success";
			$_SESSION['cartlist']=array();
		}
	}
?>