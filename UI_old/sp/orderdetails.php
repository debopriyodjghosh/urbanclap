<?php
session_start();

if(!$_SESSION['admin_username'])
{

    header("Location: ../index.php");
}

?>

<?php

	require_once 'config.php';
	
	if(isset($_GET['delete_id']))
	{
		
		
		
	
		$stmt_delete = $DB_con->prepare('DELETE FROM orderdetails WHERE order_id =:order_id');
		$stmt_delete->bindParam(':order_id',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: orderdetails.php");
	}

?>

<?php
	include 'nav.php';
		?>
        <div id="page-wrapper">
            
			
			
			
			
			
		
			
			
		 <div class="alert alert-danger">
                        
                          <center> <h3><strong>Order Details Management</strong> </h3></center>
						  
						  </div>
						  
						  <br />
						  
						  <div class="table-responsive">
            <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Date Ordered</th>
                  <th>Customer Name</th>
				  <th>Item</th>
                  <th>Price</th>
				  <th>Quantity</th>
				  <th>Total</th>
				  <th>Actions</th>
                 
                </tr>
              </thead>
              <tbody>
			  <?php
include("config.php");
	$stmt = $DB_con->prepare('select order_id, order_date,users.user_firstname, users.user_lastname, order_name, order_price, order_quantity, order_total from orderdetails, users where orderdetails.user_id=users.user_id and order_status="Ordered" order by order_date desc');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			
			
			?>
                <tr>
                  
                 <td><?php echo $order_date; ?></td>
				 <td><?php echo $user_firstname; ?> <?php echo $user_lastname; ?></td>
				 <td><?php echo $order_name; ?></td>
				 <td>&#8369; <?php echo $order_price; ?></td>
				 <td><?php echo $order_quantity; ?></td>
				 <td>&#8369; <?php echo $order_total; ?></td>
				 
				 <td>
				
				 
				
				<a class="btn btn-danger" href="?delete_id=<?php echo $row['order_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this item ordered?')">
				  <span class='glyphicon glyphicon-trash'></span>
				  Remove Item Ordered</a>
                  
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
                       &copy 2016 Urban Services| All Rights Reserved |  Design by : EDGE Team

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
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	
?>
		
	</div>
	</div>
					
            
                </div>
            </div>

           

           
        </div>
		
		
		
    </div>
    <!-- /#wrapper -->

	
	<!-- Mediul Modal -->
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
          <div class="modal-dialog modal-md">
            <div style="color:white;background-color:#008CBA" class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 style="color:white" class="modal-title" id="myModalLabel">Upload Items</h2>
              </div>
              <div class="modal-body">
         
				
			
				
				 <form enctype="multipart/form-data" method="post" action="additems.php">
                   <fieldset>
					
						
                            <p>Name of Item:</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="Name of Item" name="item_name" type="text" required>
                           
							 
							</div>
							
							
							
							
							
							
							
							
							<p>Price:</p>
                            <div class="form-group">
							
                                <input id="priceinput" class="form-control" placeholder="Price" name="item_price" type="text" required>
                           
							 
							</div>
							
							
							<p>Choose Image:</p>
							<div class="form-group">
						
							 
                                <input class="form-control"  type="file" name="item_image" accept="image/*" required/>
                           
							</div>
				   
				   
					 </fieldset>
                  
            
              </div>
              <div class="modal-footer">
               
                <button class="btn btn-success btn-md" name="item_save">Save</button>
				
				 <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
				
				
				   </form>
              </div>
            </div>
          </div>
        </div>
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
