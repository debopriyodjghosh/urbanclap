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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class='glyphicon glyphicon-shopping-cart'></span> Total Price Ordered: &#8369; <?php //echo $total; ?> </b></a>
                       
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

			 
			<div class="alert alert-default" style="color:white;background-color:#008CBA">
         <center><h3> <span class="glyphicon glyphicon-shopping-cart"></span> This is our reknowned service providers, Book now!</h3></center>
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





            echo "<div class='col-sm-3'>
              <div class='panel panel-default' style='border-color:#008CBA;'>
                <div class='panel-heading' style='color:white;background-color : #033c73;'>
                  <center>
                  <strong><textarea style='text-align:center;background-color: #93eacc;' class='form-control' rows='1'
                      disabled>".$query2['sp_name']."</textarea></strong>
                  </center>
                </div>

                <div class='panel-body'>
                
                <center>
                <h4> Service: ".$query2['s_name']." </h4>
              </center>
              <center>
              <h4> Experience: ".$query2['sp_exp']." yrs </h4>
            </center>
            <center>
                <h4> City: ".$query2['sp_city']." </h4>
              </center>

                <center>
                <h4> Contact: ".$query2['sp_contact']." </h4>
              </center>
              
             

              
                  <center>
                    <h4> Price: &#8377; ".$query2['sp_rate']." </h4>
                  </center>


                  <a class='btn btn-block btn-danger' href='add_to_cart.php?cart=".$query2['sp_email']."'><span
                      class='glyphicon glyphicon-shopping-cart'></span> Add to cart</a>
                </div>
              </div>
            </div>";


            }

echo "<div class='container'>";
echo "</div>";



  $sql1 = "select * from service_provider";
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
