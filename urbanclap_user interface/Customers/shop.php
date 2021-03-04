<?php
session_start();

if(!$_SESSION['user_email'])
{

    header("Location: ../index.php");
}

?>

<?php
 include("config.php");
 extract($_SESSION); 
		  $stmt_edit = $DB_con->prepare('SELECT * FROM customer WHERE c_email =:user_email');
		$stmt_edit->execute(array(':user_email'=>$user_email));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
		?>
		<?php
 include("config.php");
		  $stmt_edit = $DB_con->prepare("select sum(order_total) as total from orderdetails where user_id=:user_id and order_status='Ordered'");
		$stmt_edit->execute(array(':user_id'=>$user_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
		?>

<?php
	include 'nav.php';
		?>
      
				<div id="page-wrapper">

			 
			<div class="alert alert-default" style="color:white;background-color:#008CBA">
         <center><h3> <span class="glyphicon glyphicon-shopping-cart"></span> This is our skateboard stocks, Shop now!</h3></center>
        </div>
			
					<br />
					

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urbanclap";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}









$start=0;
$limit=8;

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}


#$query=mysql_query("select * from items LIMIT $start, $limit");


  $sql = "select * from service_provider LIMIT $start, $limit";
            $result = $conn->query($sql);

            while ($query2 = $result->fetch_assoc()) {
              



	
	echo "<div class='col-sm-3'><div class='panel panel-default' style='border-color:#008CBA;'>
            <div class='panel-heading' style='color:white;background-color : #033c73;'>
            <center> 
<textarea style='text-align:center;background-color: white;' class='form-control' rows='1' disabled>".$query2['item_name']."</textarea>
			</center>
            </div>
            <div class='panel-body'>
           <a class='fancybox-buttons' href='../Admin/item_images/".$query2['item_image']."' data-fancybox-group='button' title='Page ".$id."- ".$query2['item_name']."'>
					
					<img src='../Admin/item_images/".$query2['item_image']."' class='img img-thumbnail'  style='width:350px;height:150px;' />
					</a>
				
					
					<center><h4> Price: &#8369; ".$query2['item_price']." </h4></center>
		
					
										<a class='btn btn-block btn-danger' href='add_to_cart.php?cart=".$query2['item_id']."'><span class='glyphicon glyphicon-shopping-cart'></span> Add to cart</a>
            </div>
          </div>
        </div>";
			
	
}

echo "<div class='container'>";
echo "</div>";



  $sql1 = "select * from items";
            $result1 = $conn->query($sql1);



$rows=mysqli_num_rows( $result1);


$total=ceil($rows/$limit);
echo "<br /><ul class='pager'>";
if($id>1)
{
	echo "<li><a style='color:white;background-color : #033c73;' href='?id=".($id-1)."'>Previous Page</a><li>";
}
if($id!=$total)
{
	echo "<li><a style='color:white;background-color : #033c73;' href='?id=".($id+1)."' class='pager'>Next Page</a></li>";
}
echo "</ul>";


echo "<center><ul class='pagination pagination-lg'>";
		for($i=1;$i<=$total;$i++)
		{
			if($i==$id) { echo "<li class='pagination active'><a style='color:white;background-color : #033c73;'>".$i."</a></li>"; }
			
	
			
			else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
		}
echo "</ul></center>";
?>
					
					
					
					
					
					
					
					<br />
			
			<div class="alert alert-default" style="background-color:#033c73;">
                       <p style="color:white;text-align:center;">
                       &copy 2016 Urban Services| All Rights Reserved |  Design by : EDGE Team

						</p>
                        
                    </div>
            
                </div>
            </div>

           

           
        </div>
		
		
		
    </div>
    <!-- /#wrapper -->

	
	<!-- Mediul Modal -->
  <div class="modal fade" id="setAccount" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
          <div class="modal-dialog modal-sm">
            <div style="color:white;background-color:#008CBA" class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 style="color:white" class="modal-title" id="myModalLabel">Account Settings</h2>
              </div>
              <div class="modal-body">
         
				
			
				
				 <form enctype="multipart/form-data" method="post" action="settings.php">
                   <fieldset>
					
						
                            <p>Firstname:</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="Firstname" name="user_firstname" type="text" value="<?php  echo $user_firstname; ?>" required>
                           
							 
							</div>
							
							
							<p>Lastname:</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="Lastname" name="user_lastname" type="text" value="<?php  echo $user_lastname; ?>" required>
                           
							 
							</div>
							
							<p>Address:</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="Address" name="user_address" type="text" value="<?php  echo $user_address; ?>" required>
                           
							 
							</div>
							
							<p>Password:</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="Password" name="user_password" type="password" value="<?php  echo $user_password; ?>" required>
                           
							 
							</div>
							
							<div class="form-group">
							
                                <input class="form-control hide" name="user_id" type="text" value="<?php  echo $user_id; ?>" required>
                           
							 
							</div>
							
							
							
							
				
							
				   
				   
					 </fieldset>
                  
            
              </div>
              <div class="modal-footer">
               
                <button class="btn btn-block btn-success btn-md" name="user_save">Save</button>
				
				 <button type="button" class="btn btn-block btn-danger btn-md" data-dismiss="modal">Cancel</button>
				
				
				   </form>
              </div>
            </div>
          </div>
        </div>
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
