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
echo $_SESSION['c_email'];
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Service list</title>
</head>
<body>
    <form name="cart" action="urbancart.php" method="post">
        Service Name:
            <?php

            $sql = "SELECT * FROM service";
            $result = $conn->query($sql);

            while ($row = $result->fetch_array()) {?>
                <input type="submit" name="s_name" id="submit" value="<?php echo $row["s_name"] ?>">
            <?php } ?>
    </form>
</body>
</html>