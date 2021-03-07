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

if (isset($_GET['update_id'])) {
    $stmt_delete = $DB_con->prepare('update orderdetails set order_status="Ordered_finished" WHERE order_status="Ordered" and c_email =:user_email');
    $stmt_delete->bindParam(':user_email', $_GET['update_id']);
    $stmt_delete->execute();
    echo "<script>alert('Item/s successfully ordered!')</script>";

    header("Location: orders.php");
}

?>
<?php
include("config.php");
#$stmt_edit = $DB_con->prepare("select sum(order_total) as total from orderdetails where user_id=:user_id and order_status='Ordered'");
#$stmt_edit->execute(array(':user_id'=>$user_id));
#$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
#extract($edit_row);

?>
<?php
include "nav.php";?>
        <div id="page-wrapper">


            <div class="alert alert-default" style="color:white;background-color:#008CBA">
                <center>
                    <h3> <span class="glyphicon glyphicon-list-alt"></span> My Ordered Items</h3>
                </center>
            </div>

            <br />

            <div class="table-responsive">
                <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Price</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");

                        $stmt = $DB_con->prepare("SELECT * FROM orderdetails where order_status='Ordered' and c_email='$user_email'");
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);


                        ?>
                                <tr>

                                    <td><?php echo $order_name; ?></td>
                                    <td><?php echo $order_date; ?> </td>
                                    <td><?php echo $order_add; ?></td>
                                    <td>&#8377; <?php echo $order_price; ?> </td>

                                </tr>


                            <?php
                            }
                            include("config.php");
                            $stmt_edit = $DB_con->prepare("select sum(order_price) as totalx from orderdetails where c_email=:user_email and order_status='Ordered'");
                            $stmt_edit->execute(array(':user_email' => $user_email));
                            $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
                            extract($edit_row);
                            echo "<tr>";
                            echo "<td colspan='3' align='right'>Total Price Ordered:";
                            echo "</td>";
                            echo "<td>&#8377; " . $totalx;
                            echo "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>";
                            echo "<a class='btn btn-block btn-success' href='?update_id=" . $user_email . "' ><span class='glyphicon glyphicon-shopping-cart'></span> Pay Now!</a>";
                            echo "</td>";
                            echo "</tr>";

                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                            echo "<br />";
                            echo '<div class="alert alert-default" style="background-color:#033c73;">       <p style="color:white;text-align:center;">
                       &copy 2016 Urban Services| All Rights Reserved |  Design by : EDGE Team</p> </div></div>';
                            echo "</div>";
                        } else {
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