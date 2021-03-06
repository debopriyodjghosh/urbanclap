<?php
session_start();

?>
<?php
include("db_conection.php");
if(isset($_POST['register']))
{
$c_name = $_POST['c_name'];
$c_add = $_POST['c_address'];
$c_city = $_POST['c_city'];
$c_contact = $_POST['c_contact'];
$c_email = $_POST['c_email'];
$password = $_POST['c_password'];




$check_c="select * from customer WHERE c_email='$c_email'";
    $run_query=mysqli_query($dbcon,$check_c);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Customer is already exist, Please try another one!')</script>";
 echo"<script>window.open('index.php','_self')</script>";
exit();
    }
 
$saveaccount="insert into customer (c_name,c_add,c_city,c_contact,c_email,password) VALUE ('$c_name','$c_add','$c_city','$c_contact','$c_email','$password')";
mysqli_query($dbcon,$saveaccount);
echo "<script>alert('Data successfully saved, You may now login!')</script>";				
echo "<script>window.open('index.php','_self')</script>";

}

?>
