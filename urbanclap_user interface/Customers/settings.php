<?php
session_start();

if(!$_SESSION['user_email'])
{

    header("Location: ../index.php");
}

?>
<?php
include("db_conection.php");
if(isset($_POST['user_save']))
{

 $user_name=$_POST['user_name'];
 $user_lastname=$_POST['user_lastname'];
 $user_address=$_POST['user_address'];
 $user_password=$_POST['user_password'];
 $user_id=$_POST['user_id'];
 
 
$update_profile="update customer set password='$user_password', c_name='$user_name', user_lastname='$user_lastname', user_address='$user_address' where user_id='$user_id'";
    if(mysqli_query($dbcon,$update_profile))
    {
	echo "<script>alert('Account successfully updated!')</script>";
        echo"<script>window.open('index.php','_self')</script>";
    }else{
	echo "<script>alert('Error Found!')</script>";
	
	}

}

?>









