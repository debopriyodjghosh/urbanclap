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
<title>User Sign Up</title>
<?php
$c_name = $_POST["c_name"];
$c_add = $_POST["c_add"];
$c_contact = $_POST["c_contact"];
$c_email = $_POST["c_email"];
$c_rating = $_POST["c_rating"];
$pass = $_POST["pass"];

$sql = "INSERT INTO `customer`( `c_name`, `c_add`, `c_contact`, `c_email`, `c_rating`, `pass`  ) VALUES ( '$c_name', '$c_add', '$c_contact', '$c_email',	'$c_rating', '$pass')";

if ($conn->query($sql) === TRUE) {
?>
    <label style="color:#3CB371"><b>New User Created successfully </b></label>
<?php
} else {
?>
    <label style="color:#FF6347"><b>User Already Exists, Try with Different ID<br>or<br>Wrong Info Provided</b></label><?php
                                                                                                                    }

                                                                                                                    $conn->close();
                                                                                                                        ?>





</body>

</html>