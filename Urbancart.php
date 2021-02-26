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
//get action string
$action = isset($_GET['action'])?$_GET['action']:"";
//$s_name=$_POST["s_name"];
//echo $s_name;
session_start();
echo $_SESSION['c_email'];
?>
<html>
<head>

	<title>cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div"><?php echo $_POST["s_name"] ?></a> </div>
	<div>
		<form action="urbancart.php?action=SearchResult" method="post">
			City Name:
			<?php $s_name=$_POST["s_name"] ?>
        	<select name="sp_city">
	            <option>~SELECT City~</option>
	            <?php

	            $sql = "SELECT distinct c_add FROM customer";
	            $result = $conn->query($sql);

	            while ($row = $result->fetch_array()) {
	                echo "<option value='" . $row["c_add"] . "'>" . $row["c_add"] . "</option>";
	            }

	            ?>
	        </select> <br><br>
	        <input type="submit" name="c_s_name" id="submit" value="Search">
	        <input type="hidden" name="s_name" value="<?php print $s_name?>">
		</form>
	</div>
</body>
</html>