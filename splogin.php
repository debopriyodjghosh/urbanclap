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


<?php

$sp_email = $_POST["sp_email"];
$pass = $_POST["pass"];
$flag = 0;

$sql = "SELECT * from service_provider where sp_email='$sp_email' and pass='$pass'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $c_email = $row["sp_email"];
        $flag = 1;
    }


}

if ($flag == 1) 
{
?>
    <html>
    <body>
    </center>
<p align="center">success</p></body>
</html>
<?php
}


if ($flag == 0) 
{
?>
    <html>
    <body>
    </center>
<p align="center">wrong credential</p></body>
</html>
<?php
}
?>