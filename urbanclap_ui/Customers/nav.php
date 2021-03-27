
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

    <!--search-->
    
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
   
    
    <link href = "css/jquery-ui.css" rel = "stylesheet">

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
                        <li class="nav-item"><a class="nav-link" href="cart_items.php"> &nbsp; <i class='fa fa-cart-plus'></i><span class="link-text"> My Cart</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="orders.php"> &nbsp; <i class='glyphicon glyphicon-list-alt'></i><span class="link-text"> Pay Now</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="view_purchased.php"> &nbsp; <i class='glyphicon glyphicon-eye-open'></i><span class="link-text"> Order History</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#setAccount"> &nbsp; <i class='fa fa-gear'></i><span class="link-text"> Update Profile</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php"> &nbsp; <i class='glyphicon glyphicon-off'></i><span class="link-text"> Logout</span></a></li>
                    </ul>
                </div>


                <!-- TOP NAV -->
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <!-- <li class="dropdown messages-dropdown">
                        <a href="#"><i class="fa fa-calendar"></i>  <?php
// $Today=date('y:m:d');
// $new=date('l, F d, Y',strtotime($Today));
// echo $new; 
?></a>
                        
                    </li> 
					<li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class='glyphicon glyphicon-shopping-cart'></span> Total Price Ordered: &#8369; <?php //echo $total; 
?> </b></a>
                       
                    </li>-->


                    <!-- <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php //echo $user_email; 
?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a data-toggle="modal" data-target="#setAccount"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </nav>
