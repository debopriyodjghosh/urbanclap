<?php
session_start();

if (!$_SESSION['sp_email']) {

    header("Location: ../index.php");
}

?>

<?php
include("config.php");
extract($_SESSION);
$stmt_edit = $DB_con->prepare('SELECT * FROM service_provider WHERE sp_email =:sp_email');
$stmt_edit->execute(array(':sp_email' => $sp_email));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);

?>

<?php
include "nav.php";?>
        <div id="page-wrapper">


            <div class="alert alert-default" style="color:white;background-color:#008CBA">
                <center>
                    <h3> <span class="glyphicon glyphicon-list-alt"></span> My Service Request</h3>
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
							<th>Status</th>
							
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");

                        $stmt = $DB_con->prepare("SELECT * FROM orderdetails where sp_email='$sp_email' ");
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);


                        ?>
                                <tr>

                                    <td><?php echo $order_name; ?></td>
                                    <td><?php echo $order_date; ?> </td>
                                    <td><?php echo $order_add; ?></td>
                                    <td><?php echo $order_price; ?> </td>
									<td><?php echo $order_status; ?> </td>
									
                                </tr>


                            <?php
							
							
                            }
							
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
include "updtprof.php";
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