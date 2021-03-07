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
include("config.php");
$stmt_edit = $DB_con->prepare("select sum(order_price) as total from orderdetails where c_email=:user_email and order_status='Ordered'");
$stmt_edit->execute(array(':user_email' => $c_email));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);

?>



<?php
include 'nav.php';
?>

<div id="page-wrapper">


    <div class="alert alert-default" style="color:white;background-color:#008CBA">
        <center>
            <h3> <span class="glyphicon glyphicon-eye-open"></span> Previous Items Ordered</h3>
        </center>
    </div>

    <br />

    <div class="table-responsive">
        <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Date</th>



                </tr>
            </thead>
            <tbody>
                <?php
                include("config.php");

                $stmt = $DB_con->prepare("SELECT * FROM orderdetails where order_status='Ordered_Finished' and c_email='$c_email'");
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);


                ?>
                        <tr>

                            <td><?php echo $order_name; ?></td>
                            <td>&#8377; <?php echo $order_price; ?> </td>
                            <td><?php echo $order_date; ?></td>



                        </tr>


                    <?php
                    }

                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                    echo "<br />";
                    echo '<div class="alert alert-default" style="background-color:#033c73;">
                       <p style="color:white;text-align:center;">
                       &copy 2016 Urban Services| All Rights Reserved |  Design by : EDGE Team

						</p>
                        
                    </div>
	</div>';

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