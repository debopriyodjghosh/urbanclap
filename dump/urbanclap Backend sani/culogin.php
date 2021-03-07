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


<?php

$c_email = $_POST["c_email"];
$pass = $_POST["pass"];
$flag = 0;
$_SESSION['c_email']=$c_email;
$sql = "SELECT * from customer where c_email='$c_email' and password='$pass'";
if($result = $conn->query($sql)){
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $c_email = $row["c_email"];
            $_SESSION['c_city']=$row["c_city"];
            $flag = 1;
        }
    }
}

if ($flag == 1) {
?>
    <html>

    <body>
        </center>
        <p align="center">success</p>
        <?php header("Location: demohome.php"); ?>
    </body>

    </html>
<?php
}


if ($flag == 0) {
?>
    <html>

    <body>
        </center>
        <p align="center">wrong credential</p>
    </body>

    </html>
<?php
}
?>