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
session_start();
$action = isset($_GET['action'])?$_GET['action']:"";
if($action=='empty') {
      $sp_email = $_GET['sp_email'];
      $cart=$_SESSION['cartlist'];
      unset($cart[$sp_email]);
      $_SESSION['cartlist']= $cart;    
}
if($action=='emptyall') {
      $_SESSION['cartlist']=array();     
}
?>
<html>
<head>
      <title></title>
</head>
      <body>
            <div>
                  <a href="cart.php?action=emptyall" class="btn btn-info">Empty ALL</a>
            </div>
            <form method="post" action="order.php">
                  <div>
                        <input type="text" value="" placeholder="Enter Address" name='address' autocomplete="off" required="">
                  </div>
                 <?php foreach ($_SESSION['cartlist'] as $cart) {
                        $sp_email=$cart['sp_email'];
                        $sql="SELECT * FROM service_provider WHERE sp_email='$sp_email'";
                        $result = $conn->query($sql);
                        $sp=$result->fetch_array();?>
                        <div>
                              <div class="caption">
                                    <p style="text-align:center;"><?php echo $sp['sp_name'];?></p>
                                    <p style="text-align:center;"><?php echo $cart['c_email'];?></p>
                                    <p style="text-align:center;"><?php echo $cart['date'];?></p>
                                    <p style="text-align:center;">
                                          <a href="cart.php?action=empty&sp_email=<?php echo $sp_email?>" class="btn btn-info">Delete</a>
                                    </p>
                              </div>
                        </div>
                  <?php }?>
                  <div>
                        <input type="submit" name="order" id="submit" value="order">
                  </div>
            </form>
      </body>
</html>