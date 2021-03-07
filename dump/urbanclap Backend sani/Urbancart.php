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
//get action string
$action = isset($_GET['action'])?$_GET['action']:"";
//$s_name=$_POST["s_name"];
//echo $s_name;
session_start();
$choose_city=$_POST['choose_city'];

if($action=='addcart' && $_SERVER['REQUEST_METHOD']=='POST') {
	
	//Finding the product by code
	$sp_email=$_POST['sp_email'];
	$date=$_POST['choose_date'];
	$query = "SELECT * FROM service_provider where sp_email = '$sp_email'";
	$stmt = $conn->query($query);
	$_SESSION['cartlist'][$sp_email] =array('sp_email'=>$sp_email,'c_email'=>$_SESSION['c_email'],'date'=>$date);
	$action="SearchResult";
}
?>
<html>
<head>

	<title>cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<?php if($action=='SearchResult'&&$_SERVER['REQUEST_METHOD']=='POST'){
				$query = "SELECT * FROM service_provider where sp_city='$choose_city'";
				$stmt = $conn->query($query);
				?>
				<div class="row">
				    <div class="container" style="width:600px;">
				      <?php while($service_provider = $stmt->fetch_array()){?>
						  	<div class="col-md-4">
						          <div class="caption">
							            <p style="text-align:center;"><?php echo $service_provider['sp_name'];?></p>
							            <p style="text-align:center;color:#04B745;">
							            	<b>
							            		<?php echo $service_provider['sp_exp'];?>		
							            	</b>
							            </p>
					            		<form method="post" action="urbancart.php?action=addcart">
							              	<p style="text-align:center;color:#04B745;">
							              		<input type="date" name="choose_date" id="date" required="">
							              	</p>
							              	<p style="text-align:center;color:#04B745;">
								                
								                <button type="submit" class="btn btn-warning">Add To Cart</button>
								                <input type="hidden" name="sp_email" value="<?php echo $service_provider['sp_email'];?>">
								                <input type="hidden" name="s_name" value="<?php print $s_name?>">
								                <input type="hidden" name="choose_city" value="<?php print $choose_city?>">
							              	</p>
						            	</form>
						          	</div>
						        </div>
						  	</div>
	  					<?php }?>
	  					<div>
							<form action="cart.php" method="post">
								<input type="submit" name="go_to_cart" id="submit" value="go_to_cart">
							</form>
						</div>
					</div>
				</div>
	<?php }?>
</body>
</html>