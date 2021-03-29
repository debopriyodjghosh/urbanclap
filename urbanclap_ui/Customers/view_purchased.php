<?php
session_start();

if (!$_SESSION['user_email']) {

    header("Location: ../index.php");
}

?>

<?php
include("config.php");
extract($_SESSION);
$stmt_edit = $DB_con->prepare('SELECT * FROM customer WHERE c_email =:user_email');
$stmt_edit->execute(array(':user_email' => $user_email));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);

?>
<?php
include("config.php");
$stmt_edit = $DB_con->prepare("select sum(order_price) as total from orderdetails where c_email=:user_email and order_status='Ordered'");
$stmt_edit->execute(array(':user_email' => $c_email));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);

?>
<?php
include("config.php");
if (isset($_GET['order_id'])) {

	$stmt_reject = $DB_con->prepare('UPDATE orderdetails set order_status="Rejected"  WHERE order_id =:order_id');
	$stmt_reject->bindParam(':order_id', $_GET['order_id']);
	$stmt_reject->execute();

	header("Location: view_purchased.php");
}
?>
<?php

include("config.php");

if (isset($_GET['claim_id'])) {

	$stmt_delete = $DB_con->prepare('UPDATE orderdetails set order_status="Refund Claimed"  WHERE order_id =:claim_id');
	$stmt_delete->bindParam(':claim_id', $_GET['claim_id']);
	$stmt_delete->execute();

	header("Location: view_purchased.php");
}

?>




<?php
include 'nav.php';
?>

<div id="page-wrapper">
    <div class="alert alert-default" style="color:white;background-color:#008CBA">
        <center>
            <h3> <span class="glyphicon glyphicon-eye-open"></span> Previous Items Ordered</h3>
        </center>
    </div>
    <br />

    <div class="table-responsive">
        <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Oid</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Address</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php
                include("config.php");
                $stmt = $DB_con->prepare("SELECT * FROM orderdetails where c_email='$c_email' order by order_id desc");
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                ?>
                        <tr>
                        <td><?php echo $order_id; ?></td>
                            <td><?php echo $order_name; ?></td>
                            <td><?php $newDate = date("d-m-Y", strtotime($order_date));  echo $newDate; ?> </td>
                            <td><?php echo $order_add; ?></td>
                            <td>&#8377; <?php echo $order_price; ?> </td>
                            <td><?php echo $order_status; ?></td>
                            <?php
                             if($order_status=='Pending'){
                                ?><td><a class="btn btn-info" href='cart_items.php'> Place Order</a>
                                <a class="btn btn-danger" href="?order_id=<?php echo $row['order_id']; ?>" title="click for reject" onclick="return confirm('Are you sure to reject this order?')">
				                    <span class='glyphicon glyphicon-remove'></span> Reject Order</a></td>
                                <?php
                            }
                            elseif($order_status=='Ordered'){
                                ?><td><a class="btn btn-success" href='orders.php'> Pay Now</a>
                                <a class="btn btn-danger" href="?order_id=<?php echo $row['order_id']; ?>" title="click for reject" onclick="return confirm('Are you sure to reject this order?')">
				                    <span class='glyphicon glyphicon-remove'></span> Reject Order</a></td>
                                <?php
                            }
                            elseif($order_status=='Payment_finished'){
                                ?> <td><a class="btn btn-warning" href="?claim_id=<?php echo $row['order_id']; ?>" title="click for claim" onclick="return confirm('Are you sure to claim refund for this order?')">
                                <span class='glyphicon glyphicon-send'></span> Claim Refund</a></td>
                                 <?php 
                            }
                            elseif($order_status=='Payment_finished & Accepted'){
                                ?><td><a class="btn btn-warning" href="?claim_id=<?php echo $row['order_id']; ?>" title="click for claim" onclick="return confirm('Are you sure to claim refund for this order?')">
                                <span class='glyphicon glyphicon-send'></span> Claim Refund</a></td>
                                <?php
                            }
                            elseif($order_status=='Order Finished'){
                                if($payment_status=='Due'){?>
                                    <td><a class="btn btn-warning" href="?claim_id=<?php echo $row['order_id']; ?>" title="click for claim" onclick="return confirm('Are you sure to claim refund for this order?')">
                                    <span class='glyphicon glyphicon-send'></span> Claim Refund</a></td> <?php
                                }else{?>
                                    <td><a class="btn btn-primary"> Thank you</a></td><?php
                                }
                        }
                            elseif($order_status=='Rejected by SP'){
                                ?><td><a class="btn btn-primary"> Sorry</a><a class="btn btn-warning" href="?claim_id=<?php echo $row['order_id']; ?>" title="click for claim" onclick="return confirm('Are you sure to claim refund for this order?')">
                                <span class='glyphicon glyphicon-send'></span> Claim Refund</a></td>
                                <?php
                            }
                            elseif($order_status=='Refunded' or $order_status=='Rejected'){
                                ?><td><a class="btn btn-primary"> Thank you</a></td>
                                <?php
                            }
                            
                           
                            ?>
                        </tr>
                    <?php
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                    echo "<br />";
                    echo '<div class="alert alert-default" style="background-color:#033c73;">
                       <p style="color:white;text-align:center;">
                       By Group One |  2021 B.Tech V SEM CU.</p>
                        </div>
	                    </div>';
                    echo "</div>";
                } else {
                    ?>
                    <div class="col-xs-12">
                        <div class="alert alert-warning">
                            <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Item Found ...
                        </div>
                    </div>
                <?php
                }

                ?>








    </div>
</div>




</div>



</div>
<!-- /#wrapper -->
<?php
include "edit_ac.php";
?>

<script>
    $(document).ready(function() {
        $('#priceinput').keypress(function(event) {
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