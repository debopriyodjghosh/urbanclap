<?php
session_start();

if (!$_SESSION['admin_username']) {

    header("Location: ../index.php");
}

?>
<?php

error_reporting(~E_NOTICE);

require_once 'config.php';

if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $stmt_edit = $DB_con->prepare('SELECT * FROM items WHERE item_id =:item_id');
    $stmt_edit->execute(array(':item_id' => $id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
} else {
    header("Location: items.php");
}



if (isset($_POST['btn_save_updates'])) {
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];


    $imgFile = $_FILES['item_image']['name'];
    $tmp_dir = $_FILES['item_image']['tmp_name'];
    $imgSize = $_FILES['item_image']['size'];

    if ($imgFile) {
        $upload_dir = 'item_images/'; // upload directory	
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $itempic = rand(1000, 1000000) . "." . $imgExt;
        if (in_array($imgExt, $valid_extensions)) {
            if ($imgSize < 5000000) {
                unlink($upload_dir . $edit_row['item_image']);
                move_uploaded_file($tmp_dir, $upload_dir . $itempic);
            } else {
                $errMSG = "Sorry, your file is too large it should be less then 5MB";
                echo "<script>alert('Sorry, your file is too large it should be less then 5MB')</script>";
            }
        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        }
    } else {

        $itempic = $edit_row['item_image'];
    }



    if (!isset($errMSG)) {
        $stmt = $DB_con->prepare('UPDATE items
									     SET item_name=:item_name, 
											 item_price=:item_price, 
										     item_image=:item_image 
								       WHERE item_id=:item_id');
        $stmt->bindParam(':item_name', $item_name);
        $stmt->bindParam(':item_price', $item_price);
        $stmt->bindParam(':item_image', $itempic);
        $stmt->bindParam(':item_id', $id);

        if ($stmt->execute()) {
?>
            <script>
                alert('Successfully Updated ...');
                window.location.href = 'items.php';
            </script>
<?php
        } else {
            $errMSG = "Sorry Data Could Not Updated !";
            echo "<script>alert('Sorry Data Could Not Updated !')</script>";
        }
    }
}

?>
<?php
include "nav.php";?>
        <div id="page-wrapper">









            <div class="clearfix"></div>

            <form method="post" enctype="multipart/form-data" class="form-horizontal">


                <?php
                if (isset($errMSG)) {
                ?>

                <?php
                }
                ?>
                <div class="alert alert-info">

                    <center>
                        <h3><strong>Update Item</strong> </h3>
                    </center>

                </div>

                <table class="table table-bordered table-responsive">

                    <tr>
                        <td><label class="control-label">Name of Item.</label></td>
                        <td><input class="form-control" type="text" name="item_name" value="<?php echo $item_name; ?>" required /></td>
                    </tr>

                    <tr>
                        <td><label class="control-label">Price.</label></td>
                        <td><input id="inputprice" class="form-control" type="text" name="item_price" value="<?php echo $item_price; ?>" required /></td>
                    </tr>


                    <tr>
                        <td><label class="control-label">Image.</label></td>
                        <td>
                            <p><img class="img img-thumbnail" src="item_images/<?php echo $item_image; ?>" height="150" width="150" /></p>
                            <input class="input-group" type="file" name="item_image" accept="image/*" />
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
                                <span class="glyphicon glyphicon-save"></span> Update
                            </button>

                            <a class="btn btn-danger" href="items.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>

                        </td>
                    </tr>

                </table>

            </form>


            <br />

            <div class="alert alert-default" style="background-color:#033c73;">
                <p style="color:white;text-align:center;">
                    <span> By <a href="#">Group One</a> | <span
                class="far fa-copyright"></span> 2021 B.Tech V SEM CU.</span>

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