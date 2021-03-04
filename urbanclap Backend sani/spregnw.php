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

<head>

</head>

<body>

    <form name="signup" action="spregnew.php" method="post">
        <h3>SP Create your account </h3>

        <input type="text" value="" placeholder="Full Name" name="sp_name" autocomplete="off" required="">

        <input type="text" value="" placeholder="Address" name="sp_add" autocomplete="off" required="">

        <input type="text" value="" placeholder="City" name="sp_city" autocomplete="off" required="">

        <input type="text" value="" placeholder="Phone" name="sp_contact" autocomplete="off" required="">

        <input type="text" value="" placeholder="Email" name="sp_email" autocomplete="off" required="">
        Service Name:
        <select name="s_name">
            <option>~SELECT Service~</option>
            <?php

            $sql = "SELECT * FROM service where No_sp<20";
            $result = $conn->query($sql);

            while ($row = $result->fetch_array()) {
                echo "<option value='" . $row["s_name"] . "'>" . $row["s_name"] . "</option>";
            }

            ?>
        </select> <br><br>


        <input type="text" value="" placeholder="Experience" name="sp_exp" autocomplete="off" required="">

        <input type="text" value="" placeholder="Account No" name="sp_ac" autocomplete="off" required="">

        <input type="text" value="" placeholder="IFSC Code" name="sp_ifsc" autocomplete="off" required="">

        <input type="text" value="" placeholder="Rating" name="sp_rating" autocomplete="off" required="">

        <input type="password" value="" placeholder="Password" name="pass" required="">

        <input type="submit" name="submit" id="submit" value="CREATE ACCOUNT">
    </form>

</body>

</html>