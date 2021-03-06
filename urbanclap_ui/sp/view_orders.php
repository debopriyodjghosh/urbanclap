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

if (isset($_GET['order_id'])) {

	$stmt_reject = $DB_con->prepare('UPDATE orderdetails set order_status="Rejected by SP"  WHERE order_id =:order_id');
	$stmt_reject->bindParam(':order_id', $_GET['order_id']);
	$stmt_reject->execute();

	header("Location: view_orders.php");
}

?>

<?php

include("config.php");

if (isset($_GET['accept_id'])) {

	$stmt_reject = $DB_con->prepare('UPDATE orderdetails set order_status="Payment_finished & Accepted"  WHERE order_id =:accept_id');
	$stmt_reject->bindParam(':accept_id', $_GET['accept_id']);
	$stmt_reject->execute();

	header("Location: view_orders.php");
}

?>



<?php
include "nav.php";?>
        <div id="page-wrapper">
            <div class="alert alert-default" style="color:white;background-color:#008CBA">
                <center>
                    <h3> <span class="glyphicon glyphicon-list-alt"></span> My Service Request</h3>
                </center>
            </div><br />
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
                            <th>Actions</th>                            
                            <th>Customer Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                                <?php
                                include("config.php");
                                $stmt = $DB_con->prepare("SELECT * FROM orderdetails where sp_email='$sp_email' order by order_id desc");
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
                                    <td><?php echo $order_price; ?> </td>
									<td><?php echo $order_status; ?></td>
                                    <td>
                                        <?php
                                        if($order_status=='Payment_finished'){
                                            ?><a class="btn btn-success" href="?accept_id=<?php echo $row['order_id']; ?>" title="click for Accept" onclick="return confirm('Are you sure to Accept this order?')">
                                            <span class='glyphicon glyphicon-check'></span> Accept</a>
                                            <a class="btn btn-danger" href="?order_id=<?php echo $row['order_id']; ?>" title="click for Reject" onclick="return confirm('Are you sure to reject this order?')">
				                            <span class='glyphicon glyphicon-remove'></span> Reject</a>
                                            <?php }?>
                                    </td>
                                    <?php
                                    include("config.php");
                                    $stm = $DB_con->prepare("SELECT c_contact FROM customer where c_email=(select c_email from orderdetails where sp_email='$sp_email' and order_id='$order_id')");
                                    $stm->execute();
                                    if ($stm->rowCount() > 0) {
                                        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
                                            extract($row);}}  ?>
                                      <td><?php echo $c_contact; ?></td>                                      
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