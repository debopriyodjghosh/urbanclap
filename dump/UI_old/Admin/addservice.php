<?php
session_start();

if(!$_SESSION['admin_username'])
{

    header("Location: ../index.php");//redirect to login page to secure the welcome page without login access.
}

?>

<?php
include("db_conection.php");

if(isset($_POST['service_save']))
{
$s_name = $_POST['s_name'];
$s_price = $_POST['s_price'];
$s_desc = $_POST['s_desc'];

 
 $check_item="select * from service WHERE s_name='$s_name'";
    $run_query=mysqli_query($dbcon,$check_item);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Service is already exist, Please try another one!')</script>";
 echo"<script>window.open('index.php','_self')</script>";
exit();
    }
 
$imgFile = $_FILES['item_image']['name'];
$tmp_dir = $_FILES['item_image']['tmp_name'];
$imgSize = $_FILES['item_image']['size'];

$upload_dir = 'service_images/';
$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
$itempic = rand(1000,1000000).".".$imgExt;


				
	
			if(in_array($imgExt, $valid_extensions)){			
		
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$itempic);
					$saveitem="insert into service (s_name,s_price,s_desc,s_img) VALUE ('$s_name','$s_price','$s_desc','$itempic')";
					mysqli_query($dbcon,$saveitem);
					 echo "<script>alert('Data successfully saved!')</script>";				
					 echo "<script>window.open('items.php','_self')</script>";
				}
				else{
					
					 echo "<script>alert('Sorry, your file is too large.')</script>";				
					 echo "<script>window.open('items.php','_self')</script>";
				}
			}
			else{
				
				 echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";				
					 echo "<script>window.open('items.php','_self')</script>";
				
			}
		
	
		

}

?>









