<?php
include('config.php');

if(isset($_POST["action"]))
{
		$query = "
	SELECT * FROM service_provider WHERE
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= " sp_rate BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'";
	}
	if(isset($_POST["ram"]))
	{
		$ram_filter = implode("','", $_POST["ram"]);
		$query .= "
		AND s_name IN('".$ram_filter."')
		";
	}

	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		AND sp_city IN('".$brand_filter."')
		";
	}?><?php
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';	
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= 
			"<div class='col-sm-3'>
				<div class='panel panel-default' style='border-color:#008CBA;'>
					<div class='panel-heading' style='color:white;background-color : #033c73;'>
						<center><strong><textarea style='text-align:center;background-color: #93eacc;' class='form-control' rows='1'
						disabled>" . $row['sp_name'] . "</textarea></strong></center>
					</div>
					<div class='panel-body'>			
						<center> <h4> Service: " . $row['s_name'] . " </h4>	</center>
						<center><h4> Experience: " . $row['sp_exp'] . " yrs </h4></center>
						<center> <h4> City: " . $row['sp_city'] . " </h4></center>
						<center><h4> Contact: " . $row['sp_contact'] . " </h4></center>	
						<center><h4> Price: &#8377; " . $row['sp_rate'] . " </h4></center>
						<a class='btn btn-block btn-danger' href='add_to_cart.php?cart=" . $row['sp_email'] . "'><span class='glyphicon glyphicon-shopping-cart'></span> Add to cart</a>
					</div>
				</div>
			</div>";
		  }
		}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;//add pagination
	
}
?>
</div>

</div>
</div>

			
