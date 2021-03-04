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
if (!isset($_POST['s_name'])) {
	echo "string";
	header("Location:demohome.php");
}
session_start();
$s_name=$_POST['s_name'];
?>
<html>
<head>

	<title>cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div"><?php echo $s_name ?></a> </div>
	<br></br>
	<div>
		<form action="urbancart.php?action=SearchResult" method="post">
			City Name:
        	<select name="choose_city">
	            <option>~SELECT CITY~</option>
	            <?php

	            $sql = "SELECT distinct sp_city FROM service_provider where sp_s_name='$s_name'";
	            $result = $conn->query($sql);

	            while ($row = $result->fetch_array()) {
	                echo "<option value='" . $row["sp_city"] . "'>" . $row["sp_city"] . "</option>";
	            }
	            ?>
	        </select> <br><br>
	        <input type="submit" name="c_s_name" id="submit" value="Search">
	        <input type="hidden" name="s_name" value="<?php print $s_name?>">
		</form>
	</div>
</body>
</html>