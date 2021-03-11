<?php
session_start();

if(!$_SESSION['admin_username'])
{

    header("Location: ../index.php");
}

?>


 
<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'config.php';
	
	if(isset($_GET['view_id']) && !empty($_GET['view_id']))
	{
		$view_id = $_GET['view_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM users WHERE user_id=:user_id');
		$stmt_edit->execute(array(':user_id'=>$view_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: customers.php");
	}
	
	
?>
<?php
include "nav.php";
?>
        <div id="page-wrapper">
            
			
	
			 <div class="alert alert-danger">
                        
                          <center> <h3><strong>Customer Order Details</strong> </h3></center>
						  
						  </div>
						  
						  <br />
						  
						  <div class="table-responsive">
            <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Price</th>
				  <th>Quantity</th>
                  <th>Total</th>
				  <th>Date Ordered</th>
                 
                </tr>
              </thead>
              <tbody>
			  <?php
include("config.php");
	$stmt = $DB_con->prepare("SELECT * FROM orderdetails where user_id='$user_id' and order_status='Ordered'");
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			
			
			?>
                <tr>
                  
                 <td><?php echo $order_name; ?></td>
				 <td>&#8369; <?php echo $order_price; ?> </td>
				 <td><?php echo $order_quantity; ?></td>
				 <td>&#8369; <?php echo $order_total; ?></td>
				  <td><?php echo $order_date; ?></td>
				 
				 
                </tr>
               
              <?php
		}
		
		include("config.php");
		 $stmt_edit = $DB_con->prepare("select sum(order_total) as totalx from orderdetails where user_id=:user_id and order_status='Ordered'");
		$stmt_edit->execute(array(':user_id'=>$user_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
		
		echo "<tr>";
		echo "<td colspan='3' align='right' style='font-size:20px;'>Customer: ".$user_firstname." ".$user_lastname." | <span style='color:red'>Total Price Ordered:</span>";
		echo "</td>";
		
		echo "<td style='font-size:18px;'><span style='color:red;'>&#8369; ".$totalx."</span>";
		echo "</td>";
		
		 echo "<td>";
		 echo "<a class='btn btn-danger' href='customers.php'><span class='glyphicon glyphicon-backward'></span> Back<a/>'";
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
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No ordered items yet...
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
