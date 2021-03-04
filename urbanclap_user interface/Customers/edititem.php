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
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM items WHERE item_id =:item_id');
		$stmt_edit->execute(array(':item_id'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: items.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$item_name = $_POST['item_name'];
		$item_price = $_POST['item_price'];
		
			
		$imgFile = $_FILES['item_image']['name'];
		$tmp_dir = $_FILES['item_image']['tmp_name'];
		$imgSize = $_FILES['item_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'item_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$itempic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['item_image']);
					move_uploaded_file($tmp_dir,$upload_dir.$itempic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
					echo "<script>alert('Sorry, your file is too large it should be less then 5MB')</script>";				
					 
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";	
              echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";					
			}	
		}
		else
		{
		
			$itempic = $edit_row['item_image']; 
		}	
						
		

		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE items
									     SET item_name=:item_name, 
											 item_price=:item_price, 
										     item_image=:item_image 
								       WHERE item_id=:item_id');
			$stmt->bindParam(':item_name',$item_name);
			$stmt->bindParam(':item_price',$item_price);
			$stmt->bindParam(':item_image',$itempic);
			$stmt->bindParam(':item_id',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='items.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
				 echo "<script>alert('Sorry Data Could Not Updated !')</script>";				
			}
		
		}
		
						
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Services</title>
	 <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Urban Services</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <!-- LEFT NAV  -->
                <div class="navbar-left">
                <ul class="navbar-nav-left" id="menu_bar">
                    <li class="nav-item"><a class="nav-link" href="index.php"> &nbsp; <i class='glyphicon glyphicon-home'></i><span class="link-text"> Home</span></a></li>
					<li class="nav-item"><a class="nav-link" href="shop.php?id=1"> &nbsp; <i class='glyphicon glyphicon-shopping-cart'></i><span class="link-text"> Book Now</span></a></li>
					<li class="nav-item"><a class="nav-link" href="cart_items.php"> &nbsp; <i class='fa fa-cart-plus'></i><span class="link-text"> Order Cart</span></a></li>
					<li class="nav-item"><a class="nav-link" href="orders.php"> &nbsp; <i class='glyphicon glyphicon-list-alt'></i><span class="link-text"> My Booked Services</span></a></li>
					<li class="nav-item"><a class="nav-link" href="view_purchased.php"> &nbsp; <i class='glyphicon glyphicon-eye-open'></i><span class="link-text"> Order History</span></a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#setAccount"> &nbsp; <i class='fa fa-gear'></i><span class="link-text"> Account Settings</span></a></li>
					<li class="nav-item"><a class="nav-link" href="logout.php"> &nbsp; <i class='glyphicon glyphicon-off'></i><span class="link-text"> Logout</span></a></li>                    
                </ul>
                </div>
               

                <!-- TOP NAV -->
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <!-- <li class="dropdown messages-dropdown">
                        <a href="#"><i class="fa fa-calendar"></i>  <?php
                            // $Today=date('y:m:d');
                            // $new=date('l, F d, Y',strtotime($Today));
                            // echo $new; ?></a>
                        
                    </li> -->
					<li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class='glyphicon glyphicon-shopping-cart'></span> Total Price Ordered: &#8369; <?php echo $total; ?> </b></a>
                       
                    </li>
					
					
                     <!-- <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php //echo $user_email; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a data-toggle="modal" data-target="#setAccount"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            
			
			
			
			
			
			
			
			
		<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
       
        <?php
	}
	?>
			 <div class="alert alert-info">
                        
                          <center> <h3><strong>Update Item</strong> </h3></center>
						  
						  </div>
						  
						 <table class="table table-bordered table-responsive">
	 
    <tr>
    	<td><label class="control-label">Name of Item.</label></td>
        <td><input class="form-control" type="text" name="item_name" value="<?php echo $item_name; ?>" required /></td>
    </tr>
	
	 <tr>
    	<td><label class="control-label">Price.</label></td>
        <td><input id="inputprice" class="form-control" type="text" name="item_price" value="<?php echo $item_price; ?>" required /></td>
    </tr>
	
	
    <tr>
    	<td><label class="control-label">Image.</label></td>
        <td>
        	<p><img class="img img-thumbnail" src="item_images/<?php echo $item_image; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="item_image" accept="image/*" />
        </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="items.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>
						  
						
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

	<div class="modal fade" id="setAccount" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
    <div class="modal-dialog modal-sm">
        <div style="color:white;background-color:#008CBA" class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h2 style="color:white" class="modal-title" id="myModalLabel">Account Settings</h2>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" action="settings.php">
                    <fieldset>
                        <p>Name:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="Name" name="c_name" type="text"
                                value="<?php  echo $c_name; ?>" required>
                        </div>
                        <p>Address:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="Address" name="c_add" type="text"
                                value="<?php  echo $c_add; ?>" required>
                        </div>
                        <p>City:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="City" name="c_city" type="text"
                                value="<?php  echo $c_city; ?>" required>
                        </div>
                        <p>Mobile:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="Mobile" name="c_contact" type="text"
                                value="<?php  echo $c_contact; ?>" required>
                        </div>
                        <p>Password:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password"
                                value="<?php  echo $password; ?>" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control hide" name="c_email" type="text" value="<?php  echo $user_email; ?>"
                                required>
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
