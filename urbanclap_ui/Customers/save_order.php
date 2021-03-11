
<?php
#include("db_conection.php");
$dbcon = mysqli_connect("localhost", "root", "");
mysqli_select_db($dbcon, "urbanclap");
if (isset($_POST['order_save'])) 
{
    $c_email = $_POST['user_email'];    $sp_email = $_POST['sp_email'];    $order_price = $_POST['sp_rate'];    $order_add = $_POST['order_add'];    $order_date = $_POST['order_date'];    $order_name = $_POST['order_name'];    $order_status = 'Pending';





    
$save_order_details = "insert into orderdetails (order_name,c_email,sp_email,order_add,order_price,order_status,order_date) VALUE ('$order_name','$c_email','$sp_email','$order_add','$order_price','$order_status','$order_date')";    mysqli_query($dbcon, $save_order_details);    echo "<script>alert('Service successfully added to cart!')</script>";
    
echo "<script>window.open('shop.php?id=1','_self')</script>";










}

?>
