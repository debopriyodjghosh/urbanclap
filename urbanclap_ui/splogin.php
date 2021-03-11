<?php
session_start();

?>
<?php

include("db_conection.php");




if(isset($_POST['user_login']))
{
    $sp_email=$_POST['sp_email'];
    $password=$_POST['user_password'];
	

    $check_user="SELECT * from service_provider where sp_email='$sp_email' and password='$password'";
    

 
    $run=mysqli_query($dbcon,$check_user);

    if(mysqli_num_rows($run))
    {
	 echo "<script>alert('You're successfully login!')</script>";
       
 echo "<script>window.open('sp/index.php','_self')</script>";
       
$_SESSION['sp_email']=$sp_email;



    }
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script>";
		  echo "<script>window.open('index.php','_self')</script>";
		
		 exit();
		
    }
}
?>