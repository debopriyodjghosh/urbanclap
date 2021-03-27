<?php
session_start();

if (!$_SESSION['admin_username']) 
{

	header("Location: ../index.php");
}

?>
<?php

require_once 'config.php';

if (isset($_GET['delete_id'])) {

	$stmt_delete = $DB_con->prepare('DELETE FROM customer WHERE c_email =:c_email');
	$stmt_delete->bindParam(':c_email', $_GET['delete_id']);
	$stmt_delete->execute();

	header("Location: customers.php");
}

?>

<?php

require_once 'config.php';

if (isset($_GET['order_id'])) {

	$stmt_delete = $DB_con->prepare('update orderdetails set order_status="Ordered_Finished"  WHERE user_id =:user_id and order_status="Ordered"');
	$stmt_delete->bindParam(':user_id', $_GET['order_id']);
	$stmt_delete->execute();

	header("Location: customers.php");
}

?><?php
include "nav.php";
?>

        <div id="page-wrapper">
            
			
	
			 <div class="alert alert-danger">
                          <center> <h3><strong>Customer Management</strong> </h3></center>  </div>	  <br />
						  
						  <div class="table-responsive">
            <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  
                  <th>Name</th>
				  <th>Address</th>
				  <th>City</th>
				  <th>Contact</th>
				  <th>Email</th>
                  <th>Actions</th>
                 
                </tr>
              </thead>
              <tbody>
			  <?php
include("config.php");
$stmt = $DB_con->prepare('SELECT * FROM customer');
$stmt->execute();

if ($stmt->rowCount() > 0) {
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);


?>
                <tr>
				<td><?php echo $c_name; ?></td>
				<td><?php echo $c_add; ?></td>
				<td><?php echo $c_city; ?></td>
				<td><?php echo $c_contact; ?></td>
                 <td><?php echo $c_email; ?></td>
				 
				 
				 <td>
				
				 
				
				 <!--<a class="btn btn-success" href="view_orders.php?view_id=<?php echo $row['c_email']; ?>"><span class='glyphicon glyphicon-shopping-cart'></span> View Orders</a> 
				  <a class="btn btn-warning" href="?order_id=<?php echo $row['c_email']; ?>" title="click for delete" onclick="return confirm('Are you sure to reset the customer items ordered?')">
				  <span class='glyphicon glyphicon-ban-circle'></span>
				  Reset Order</a>
				 <a class="btn btn-primary" href="previous_orders.php?previous_id=<?php echo $row['c_email']; ?>"><span class='glyphicon glyphicon-eye-open'></span> Previous Items Ordered</a> -->
				
				
                  <a class="btn btn-danger" href="?delete_id=<?php echo $row['c_email']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this customer?')">
				  <span class='glyphicon glyphicon-trash'></span>
				  Remove Account</a>
				
                  </td>
                </tr>
               
              <?php
	}
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
else {
?>
		
			
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
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

		
		<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	  $('#example').dataTable();
	});
    </script>
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
