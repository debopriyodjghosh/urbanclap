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
		$stmt_edit = $DB_con->prepare('SELECT * FROM customer WHERE c_email=:view_id');
		$stmt_edit->execute(array(':view_id'=>$view_id));
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
                <tr><th>Service</th>
                    <th>Date</th>
					<th>Status</th>
                    <th>Price</th></tr>
              </thead>
              <tbody>
									<?php
						include("config.php");
							$stmt = $DB_con->prepare("SELECT * FROM orderdetails where c_email='$view_id'");
							$stmt->execute();
							
							if($stmt->rowCount() > 0)
							{
								while($row=$stmt->fetch(PDO::FETCH_ASSOC))
								{
									extract($row);
									
									
									?>
                <tr>
                  
                 <td><?php echo $order_name; ?></td>
				 <td><?php $newDate = date("d-m-Y", strtotime($order_date));  echo $newDate; ?> </td> 
				 <td><?php echo $order_status; ?></td>
				 <td>&#8377; <?php echo $order_price; ?> </td>
				 
				 
				 
                </tr>
               
              <?php
		}
		
		include("config.php");
		 $stmt_edit = $DB_con->prepare("select sum(order_price) as totalx from orderdetails where c_email=:view_id and order_status='Order Finished'");
		$stmt_edit->execute(array(':view_id'=>$view_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
		
		echo "<tr>";
		echo "<td>";
		 echo "<a class='btn btn-warning' href='customers.php'><span class='glyphicon glyphicon-backward'></span> Back<a/>'";
		 echo "</td>";
		echo "<td colspan='2' align='right' style='font-size:20px;'>Customer: ".$c_email." | <span style='color:red'>Total Price Ordered:</span>";
		echo "</td>";
		echo "<td style='font-size:18px;'><span style='color:red;'>&#8377; ".$totalx."</span>";
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
