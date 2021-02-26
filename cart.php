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
$sp_s_name=$_POST["s_name"];
$sql = "SELECT * FROM service_provider where sp_s_name='$sp_s_name'";
            if ($result = $conn->query($sql)) {
            	if($result->num_rows>0){
            		while ($row = $result->fetch_array()) {
	                	echo $row["sp_name"];?>
	                	<br></br>
	            	<?php }
            	}
            	else{
            		echo"no data";
            	}
            }
            else{
            	echo"FAIL TO EXECUTE THE QUERY";
            }
?>