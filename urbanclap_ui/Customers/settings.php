<?php
session_start();

if (!$_SESSION['user_email']) {

    header("Location: ../index.php");
}

?>
<?php
include("db_conection.php");
if (isset($_POST['user_save'])) {

    $c_name = $_POST['c_name'];
    $c_add = $_POST['c_add'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_email = $_POST['c_email'];
    $password = $_POST['password'];


    $update_profile = "update customer set password='$password', c_name='$c_name', c_add='$c_add', c_city='$c_city', c_contact='$c_contact' where c_email='$c_email'";
    if (mysqli_query($dbcon, $update_profile)) {
        echo "<script>alert('Account successfully updated!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else {
        echo "<script>alert('Error Found!')</script>";
    }
}

?>









