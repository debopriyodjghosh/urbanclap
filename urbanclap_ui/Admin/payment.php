<?php
session_start();

if(!$_SESSION['admin_username'])
{

    header("Location: ../index.php");
}

?>


 
<?php
require_once 'config.php';
if (isset($_GET['refund_id'])) {
	$stmt_delete = $DB_con->prepare('UPDATE orderdetails set order_status="Refunded"  WHERE order_id =:refund_id ');
	$stmt_delete->bindParam(':refund_id', $_GET['refund_id']);
	$stmt_delete->execute();
	header("Location: payment.php");
}

?>
<?php
require_once 'config.php';
if (isset($_GET['payment_id'])) {
	$stmt_delete = $DB_con->prepare('UPDATE orderdetails set payment_status="Paid"  WHERE order_id =:payment_id and payment_status="Due"');
	$stmt_delete->bindParam(':payment_id', $_GET['payment_id']);
	$stmt_delete->execute();
	header("Location: payment.php");
}

?>
<?php
require_once 'config.php';
if (isset($_GET['refund_id'])) {
	$stmt_delete = $DB_con->prepare('UPDATE orderdetails set order_status="Refunded"  WHERE order_id =:refund_id');
	$stmt_delete->bindParam(':refund_id', $_GET['refund_id']);
	$stmt_delete->execute();
	header("Location: payment.php");
}

?>
<?php
require_once 'config.php';
if (isset($_GET['settle_id'])) {
	$stmt_delete = $DB_con->prepare('UPDATE orderdetails set payment_status="Due to Refund payment Rejected"  WHERE order_id =:settle_id and payment_status="Due"');
	$stmt_delete->bindParam(':settle_id', $_GET['settle_id']);
	$stmt_delete->execute();
	header("Location: payment.php");
}

?>
<?php
require_once 'config.php';
if (isset($_GET['settle1_id'])) {
	$stmt_delete = $DB_con->prepare('UPDATE orderdetails set order_status="Refund Rejected"  WHERE order_id =:settle1_id');
	$stmt_delete->bindParam(':settle1_id', $_GET['settle1_id']);
	$stmt_delete->execute();
	header("Location: payment.php");
}

?>
<?php
include "nav.php";
?>
<div id="page-wrapper">
	<div class="alert alert-danger">
		<center>
			<h3><strong>Payment Details</strong> </h3>
		</center>
	</div>
	<br />
	<div class="table-responsive">
		<table class="display table table-bordered" id="example" cellspacing="0" width="100%">
              <thead>
                <tr><th>Oid</th>
					<th>Service</th>
                    <th>Date</th>
					<th>Order Status</th>
                    <th>Payment Status</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
							<?php
							include("config.php");
							$stmt = $DB_con->prepare("SELECT * FROM orderdetails where payment_status='Due' or order_status='Refund Claimed' order by order_id desc");
							$stmt->execute();
							
							if($stmt->rowCount() > 0)
							{
								while($row=$stmt->fetch(PDO::FETCH_ASSOC))
								{
															extract($row);
															?>
										<tr>
										<td><?php echo $order_id; ?></td>
										<td><?php echo $order_name; ?></td>
										<td><?php $newDate = date("d-m-Y", strtotime($order_date));  echo $newDate; ?> </td> 
										<td><?php echo $order_status; ?></td>
										<td><?php echo $payment_status; ?></td>
										<td>&#8377; <?php echo $order_price; ?> </td>
										<td>
											<?php if( $order_status=='Order Finished' and $payment_status=='Due' ){
														?> <a class="btn btn-info" href="?payment_id=<?php echo $row['order_id']; ?>" title="click for pay" onclick="return confirm('Are you sure to pay this service provider?')">
														<span class='glyphicon glyphicon-paste'></span>	Pay SP</a>
														<?php }
														
													?>
													<?php
													if ( $order_status=='Refund Claimed' and $payment_status=='Due') {
														?>
														<a class="btn btn-primary" href="?settle_id=<?php echo $row['order_id']; ?>" title="click for unsettle order" onclick="return confirm('Are you sure to not pay this service provider?')">
														<span class='glyphicon glyphicon-hourglass'></span>Don't Pay SP</a> 
														<a class="btn btn-info" href="?payment_id=<?php echo $row['order_id']; ?>" title="click for pay" onclick="return confirm('Are you sure to pay this service provider?')">
														<span class='glyphicon glyphicon-paste'></span>	Pay SP</a>
														<?php }

													elseif ( $order_status=='Refund Claimed' and $payment_status=='Paid') 
													{?>
													<a class="btn btn-warning" href="payment.php?settle1_id=<?php echo $row['order_id']; ?>" title="click for refund" onclick="return confirm('Are you sure to cancel refund the customer ?')"><span class='glyphicon glyphicon-repeat'>
													</span> Cancel Refund</a> 
													<?php}
													?>
													

													


													<?php 
									} ?>
                  						</td>
               						 	</tr>
             					 		<?php
								} ?>
		<?php
		include("config.php");
		 $stmt_t = $DB_con->prepare("SELECT sum(order_price) as totalx from orderdetails where order_status='Refund Claimed'");
		$stmt_t->execute(array(':order_id'=>$order_id));
		$edit_row = $stmt_t->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);

		echo "<tr>";
		echo "<td colspan='3' align='right' style='font-size:20px;'> Customer Refund Due : | <span style='color:red'>Total : </span>";
		echo "</td>";
		echo "<td style='font-size:18px;'><span style='color:red;'>&#8377; ".$totalx."</span>";
		echo "</td>";
		echo "</tr>";
?><?php
		include("config.php");
		 $stmt_e = $DB_con->prepare("SELECT sum(order_price) as totalx from orderdetails where order_status='Order Finished' and payment_status='Due'");
		$stmt_e->execute(array(':order_id'=>$order_id));
		$edit_ro = $stmt_e->fetch(PDO::FETCH_ASSOC);
		extract($edit_ro);

		echo "<tr>";
		echo "<td colspan='4' align='right' style='font-size:20px;'> Service Provider Payment Due : | <span style='color:green'>Total : </span>";
		echo "</td>";
		echo "<td style='font-size:18px;'><span style='color:Green;'>&#8377; ".$totalx."</span>";
		echo "</td>";
		echo "</tr>";
		
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
		echo "<br />";
		echo '<div class="alert alert-default" style="background-color:#033c73;">
                       <p style="color:white;text-align:center;">
                       By Group One |  2021 B.Tech V SEM CU.

						</p>
                        
                    </div>
	</div>';
	
		echo "</div>";
	}
	else
	{
		?>
		
			
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Payments yet...
            </div>
        </div>
        <?php
	}
	
?>
		
	</div>
	</div>
	
	<br />
	<br />
           

           
        </div>
		
		
		
    </div>
    <!-- /#wrapper -->

	
	<!-- Mediul Modal -->
    <?php
include "addservice.php";
?>

	
<script>
    $(document).ready(function() {
        $('#priceinput').keypress(function (event) {
            return isNumber(event, this)
        });
    });
  
    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }    
</script>
</body>
</html>
