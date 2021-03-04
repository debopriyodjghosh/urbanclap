<?php
session_start();
if (!$_SESSION['user_email']) {
    header("Location: ../index.php");
}
?>

<?php
include("config.php");
extract($_SESSION);
$stmt_edit = $DB_con->prepare('SELECT * FROM customer WHERE c_email =:user_email');
$stmt_edit->execute(array(':user_email' => $user_email));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);

?>



<?php

error_reporting(~E_NOTICE);

require_once 'config.php';

if (isset($_GET['cart']) && !empty($_GET['cart'])) {
    $id = $_GET['cart'];
    $stmt_edit = $DB_con->prepare('SELECT * FROM service_provider WHERE sp_email =:sp_email');
    $stmt_edit->execute(array(':sp_email' => $id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
} else {
    header("Location: shop.php");
}


?>

<?php
include "nav.php";?>


        <div id="page-wrapper">

            <form role="form" method="post" action="save_order.php">
                <?php
                if (isset($errMSG)) {
                ?>
                <?php
                }
                ?>
                <div class="alert alert-default" style="color:white;background-color:#008CBA">
                    <center>
                        <h3> <span class="glyphicon glyphicon-info-sign"></span> Order Details</h3>
                    </center>
                </div>

                <td><input class="form-control" type="hidden" name="user_email" value="<?php echo $c_email; ?>" /></td>
                <td><input class="form-control" type="hidden" name="sp_email" value="<?php echo $sp_email; ?>" /></td>
                <td><input class="form-control" type="hidden" name="sp_rate" value="<?php echo $sp_rate; ?>" /></td>
                <td><input class="form-control" type="hidden" name="order_name" value="<?php echo $s_name; ?>" /></td>

                <table class="table table-bordered table-responsive">
                    <tr>
                        <td><label class="control-label">Name of Provider</label></td>
                        <td><input class="form-control" type="text" name="v1" value="<?php echo $sp_name; ?>" disabled /></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">City</label></td>
                        <td><input class="form-control" type="text" name="v2" value="<?php echo $sp_city; ?>" disabled /></td>
                    </tr>

                    <tr>
                        <td><label class="control-label">Service</label></td>
                        <td><input class="form-control" type="text" name="v3" value="<?php echo $s_name; ?>" disabled /></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Experience</label></td>
                        <td><input class="form-control" type="text" name="v4" value="<?php echo $sp_exp; ?> yrs" disabled /></td>
                    </tr>

                    <tr>
                        <td><label class="control-label">Contact</label></td>
                        <td><input class="form-control" type="text" name="v5" value="<?php echo $sp_contact; ?>" disabled /></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Price.</label></td>
                        <td><input class="form-control" type="text" name="v6" value="<?php echo $sp_rate; ?>" disabled /></td>
                    </tr>
                    <tr>
                        <!--<td><label class="control-label">Image.</label></td>
                            <td>
                                <p><img class="img img-thumbnail" src="../Admin/item_images/<?php //echo $item_image; 
                                                                                            ?>" style="height:250px;width:350px;" /></p>
                            </td>
                                <tr>
                            <td><label class="control-label">Quantity.</label></td>
                            <td><input class="form-control" type="text" placeholder="Quantity" name="order_quantity" value="1" onkeypress="return isNumber(event)" onpaste="return false"  required />
                            </td>-->

                        <td><label class="control-label">Order Address</label></td>
                        <td><input class="form-control" type="text" name="order_add" required></td>


                    </tr>
                    <tr>
                        <td><label class="control-label">Order Date</label></td>
                        <td><input class="form-control" type="date" name="order_date" required></td>
                    </tr>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" name="order_save" class="btn btn-primary">
                                <span class="glyphicon glyphicon-shopping-cart"></span> OK
                            </button>
                            <a class="btn btn-danger" href="shop.php?id=1"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>

                        </td>
                    </tr>

                </table>

            </form>





            <br />

            <div class="alert alert-default" style="background-color:#033c73;">
                <p style="color:white;text-align:center;">
                    &copy 2016 Urban Services| All Rights Reserved | Design by : EDGE Team

                </p>

            </div>

        </div>
    </div>




    </div>



    </div>
    <!-- /#wrapper -->
    <?php
include "edit_ac.php";
?>

</body>

<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>

</html>