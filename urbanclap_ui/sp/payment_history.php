<?php
session_start();

if (!$_SESSION['sp_email']) {

    header("Location: ../index.php");
}

?>

<?php
include("config.php");
extract($_SESSION);
$stmt_edit = $DB_con->prepare('SELECT * FROM service_provider WHERE sp_email =:sp_email');
$stmt_edit->execute(array(':sp_email' => $sp_email));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);

?>
<?php

include("config.php");

if (isset($_GET['finish_id'])) {

	$stmt_reject = $DB_con->prepare('UPDATE orderdetails set order_status="Order Finished"  WHERE order_id =:finish_id');
	$stmt_reject->bindParam(':finish_id', $_GET['finish_id']);
	$stmt_reject->execute();

	header("Location: payment_history.php");
}

?>

<?php

include("config.php");

if (isset($_GET['claim_id'])) {

	$stmt_reject = $DB_con->prepare('UPDATE orderdetails set payment_status="Due"  WHERE order_id =:claim_id');
	$stmt_reject->bindParam(':claim_id', $_GET['claim_id']);
	$stmt_reject->execute();

	header("Location: payment_history.php");
}

?>




<?php
include "nav.php";?>
        <div id="page-wrapper">
            <div class="alert alert-default" style="color:white;background-color:#008CBA">
                <center>
                    <h3> <span class="glyphicon glyphicon-list-alt"></span> My Payment</h3>
                </center>
            </div><br />
            <div class="table-responsive">
                <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th>Oid</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Price</th>
							<th>Order Status</th>    
                            <th>Payment Status</th>                        
                            <th>Actions</th>                            
                            
                        </tr>
                    </thead>
                    <tbody>
                                <?php
                                include("config.php");
                                $stmt = $DB_con->prepare("SELECT * FROM orderdetails where sp_email='$sp_email' ORDER BY order_id DESC");
                                $stmt->execute();
                                if ($stmt->rowCount() > 0) {
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        extract($row);
                                ?>
                                <tr><td><?php echo $order_id; ?> </td>
                                    <td><?php echo $order_name; ?></td>
                                    
   
                                    <td><?php $newDate = date("d-m-Y", strtotime($order_date));  echo $newDate; ?> </td>
                                    
                                    <td><?php echo $order_price; ?> </td>
									<td><?php echo $order_status; ?></td>
                                    <td><?php echo $payment_status; ?></td>
                                    <td>
                                    <?php
                             if( $order_status=='Payment_finished & Accepted' ){
                                ?><a class="btn btn-success" href="?finish_id=<?php echo $row['order_id']; ?>" title="click for Finish" onclick="return confirm('Are you sure to finish this order?')">
                                <span class='glyphicon glyphicon-ok-sign'></span> Order Finished</a>
                                <?php }

                                elseif($order_status=='Order Finished' ){
                                    if($payment_status=='Paid'){
                                        ?> <a class="btn btn-primary"> Thank you</a>
                                        <?php }elseif($payment_status==''){
                                ?> <a class="btn btn-success" href="?claim_id=<?php echo $row['order_id']; ?>" title="click for Accept" onclick="return confirm('Are you sure to Accept this order?')">
                                <span class='glyphicon glyphicon-check'></span> Claim Payment</a></td>
                                <?php }}
                            else {?>
                                <a class="btn btn-info"> Thank you</a><?php
                            }?>
                                   
                                       
                                    

                                      
                                </tr>
                                
                            <?php



                            }
						}else {
                            ?>
                            <div class="col-xs-12">
                                <div class="alert alert-warning">
                                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Item Found ...
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    <!-- /#wrapper -->
<?php
include "updtprof.php";
?>
		
    
		<!--<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	  $('#example').dataTable();
	});
    </script>-->
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