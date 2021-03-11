<?php
session_start();

if (!$_SESSION['sp_email']) {
    echo "$sp_email";
    header("Location: ../index.php");
}

?>
<?php
include("config.php");
if (isset($_POST['sp_save'])) {

    $sp_name = $_POST['sp_name'];
    $sp_add = $_POST['sp_add'];
    $sp_city = $_POST['sp_city'];
    $sp_contact = $_POST['sp_contact'];
    $sp_email = $_POST['sp_email'];
    $password = $_POST['password'];
    echo "$sp_email";


    $update_profile = "update service_provider set password='$password', sp_name='$sp_name', sp_add='$sp_add', sp_city='$sp_city', sp_contact='$sp_contact' where sp_email='$sp_email'";
    if (mysqli_query($dbcon, $update_profile)) {
        echo "<script>alert('Account successfully updated!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else {
        echo "<script>alert('Error Found!')</script>";
    }
}

?>









