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

require_once 'config.php';

if (isset($_GET['delete_id'])) {


    $stmt_delete = $DB_con->prepare('DELETE FROM orderdetails WHERE order_id =:order_id');
    $stmt_delete->bindParam(':order_id', $_GET['delete_id']);
    $stmt_delete->execute();

    header("Location: cart_items.php");
}

?>
<?php

require_once 'config.php';

if (isset($_GET['update_id'])) {
    $stmt_delete = $DB_con->prepare('update orderdetails set order_status="Ordered" WHERE order_status="Pending" and c_email =:user_email');
    $stmt_delete->bindParam(':user_email', $_GET['update_id']);
    $stmt_delete->execute();
    echo "<script>alert('Item/s successfully ordered!')</script>";

    header("Location: orders.php");
}

?><?php
include "nav.php"; ?>
        <div id="page-wrapper">
            <div class="alert alert-default" style="color:white;background-color:#008CBA">
                <center>
                    <h3> <span class="fa fa-cart-plus"></span> Shopping Cart Lists, Order Now!</h3>
                </center>
            </div>
            <br />

            <div class="table-responsive">
                <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>



                        <?php
include("config.php");
$stmt = $DB_con->prepare("SELECT * FROM orderdetails where order_status='Pending' and c_email='$user_email'");
$stmt->execute();
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
?>
                                <tr>

                                    <td><?php echo $order_name; ?></td>

                                    <td>&#8377;<?php echo $order_price; ?></td>

                                    <td><?php echo $order_add; ?></td>

                                    <td><?php echo $order_date; ?> </td>

                                    <td>
                                        <a class="btn btn-block btn-danger" href="?delete_id=<?php echo $row['order_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this item?')"><span class='glyphicon glyphicon-trash'></span> Remove Item</a>

                                    </td>



                                <?php
    }
    include("config.php");
    $stmt_edit = $DB_con->prepare("select sum(order_price) as totalx from orderdetails where c_email=:user_email and order_status='Pending'");
    $stmt_edit->execute(array(':user_email' => $user_email));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);

    echo "<tr>";
    echo "<td colspan='3' align='right'>Total Price:";
    echo "</td>";

    echo "<td>&#8377; " . $totalx;
    echo "</td>";

    echo "<td>";
    echo "<a class='btn btn-block btn-success' href='?update_id=" . $user_email . "' ><span class='glyphicon glyphicon-shopping-cart'></span> Place Order Now!</a>";
    echo "</td>";

    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "<br />";
    echo '<div class="alert alert-default" style="background-color:#033c73;">
                <p style="color:white;text-align:center;">
                By Group One |  2021 B.Tech V SEM CU.
                </p>
                
                </div>
                </div>';

    echo "</div>";
}
else {
?>


                                <div class="col-xs-12">
                                    <div class="alert alert-warning">
                                        <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Item Found ...
                                    </div>
                                </div>
                            <?php
}

?>








            </div>
        </div>




    </div>



    </div>
    <!-- /#wrapper -->
    <?php
include "edit_ac.php";
?>
    <script>
        $(document).ready(function() {
            $('#priceinput').keypress(function(event) {
                return isNumber(event, this)
            });
        });

        function isNumber(evt, element) {

            var charCode = (evt.which) ? evt.which : event.keyCode

            if (
                (charCode != 45 || $(element).val().indexOf('-') != -1) &&
                (charCode != 46 || $(element).val().indexOf('.') != -1) &&
                (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
    </script>
</body>

</html>