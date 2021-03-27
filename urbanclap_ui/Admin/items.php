<?php
session_start();

if(!$_SESSION['admin_username'])
{

    header("Location: ../index.php");
}

?>

<?php

	require_once 'config.php';
	
	if(isset($_GET['s_name']))
	{
		
		$stmt_select = $DB_con->prepare('SELECT s_img FROM service WHERE s_name =:s_name');
		$stmt_select->execute(array(':s_name'=>$_GET['s_name']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("service_images/".$imgRow['s_img']);
		
	
		$stmt_delete = $DB_con->prepare('DELETE FROM service WHERE s_name =:s_name');
		$stmt_delete->bindParam(':s_name',$_GET['s_name']);
		$stmt_delete->execute();
		
		header("Location: items.php");
	}

?><?php
include "nav.php";
?>
        <div id="page-wrapper">
            
			
			
			
			
			
			
			
			
	
			 <div class="alert alert-danger">
                        
                          <center> <h3><strong>Service Management</strong> </h3></center>
						  
						  </div>
						  
						  <br />
						  
						  <div class="table-responsive">
            <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Name of Service</th>
				  <th>Price</th>
				  <th>Description</th>
				  <th>Toal SP no.</th>
                  <th>Actions</th>
				 
                 
                </tr>
              </thead>
              <tbody>
			  <?php
include("config.php");
	$stmt = $DB_con->prepare('SELECT * FROM service');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			
			
			?>
                <tr>
                  <td>
				<center> <img src="service_images/<?php echo $s_img; ?>" class="img img-rounded"  width="50" height="50" /></center>
				 </td>
                 <td><?php echo $s_name; ?></td>
				 <td>&#8377; <?php echo $s_price; ?></td>
				 <td><?php echo $s_desc; ?></td>
				 <td><?php echo $No_sp; ?></td>
				 <td>
				
				 
				
				 <!--<a class="btn btn-info" href="edititem.php?edit_id=<?php echo $row['s_name']; ?>" title="click for edit" onclick="return confirm('Are you sure edit this item?')"><span class='glyphicon glyphicon-pencil'></span> Edit Item</a>--> 
				
                  <a class="btn btn-danger" href="?s_name=<?php echo $row['s_name']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this item?')"><span class='glyphicon glyphicon-trash'></span> Remove Item</a>
				
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
	
	<br />
	<br />
						  
						  
						  
			
			
            
                </div>
            </div>

           

           
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
