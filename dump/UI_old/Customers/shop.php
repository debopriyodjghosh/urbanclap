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
include "nav.php";?>
        <div id="page-wrapper">


            <div class="alert alert-default" style="color:white;background-color:#008CBA">
                <center>
                    <h3> <span class="glyphicon glyphicon-shopping-cart"></span> This is our well knowned service providers, Book now!</h3>
                </center>
            </div>

            <br />


            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "urbanclap";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }









            $start = 0;
            $limit = 8;

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $start = ($id - 1) * $limit;
            }


            #$query=mysql_query("select * from items LIMIT $start, $limit");


            $sql = "select * from service_provider LIMIT $start, $limit";
            $result = $conn->query($sql);

            while ($query2 = $result->fetch_assoc()) {





                echo "<div class='col-sm-3'>
              <div class='panel panel-default' style='border-color:#008CBA;'>
                <div class='panel-heading' style='color:white;background-color : #033c73;'>
                  <center>
                  <strong><textarea style='text-align:center;background-color: #93eacc;' class='form-control' rows='1'
                      disabled>" . $query2['sp_name'] . "</textarea></strong>
                  </center>
                </div>

                <div class='panel-body'>
                
                <center>
                <h4> Service: " . $query2['s_name'] . " </h4>
              </center>
              <center>
              <h4> Experience: " . $query2['sp_exp'] . " yrs </h4>
            </center>
            <center>
                <h4> City: " . $query2['sp_city'] . " </h4>
              </center>

                <center>
                <h4> Contact: " . $query2['sp_contact'] . " </h4>
              </center>
              
             

              
                  <center>
                    <h4> Price: &#8377; " . $query2['sp_rate'] . " </h4>
                  </center>


                  <a class='btn btn-block btn-danger' href='add_to_cart.php?cart=" . $query2['sp_email'] . "'><span
                      class='glyphicon glyphicon-shopping-cart'></span> Add to cart</a>
                </div>
              </div>
            </div>";
            }

            echo "<div class='container'>";
            echo "</div>";



            $sql1 = "select * from service_provider";
            $result1 = $conn->query($sql1);



            $rows = mysqli_num_rows($result1);


            $total = ceil($rows / $limit);
            echo "<br /><ul class='pager'>";
            if ($id > 1) {
                echo "<li><a style='color:white;background-color : #033c73;' href='?id=" . ($id - 1) . "'>Previous Page</a><li>";
            }
            if ($id != $total) {
                echo "<li><a style='color:white;background-color : #033c73;' href='?id=" . ($id + 1) . "' class='pager'>Next Page</a></li>";
            }
            echo "</ul>";


            echo "<center><ul class='pagination pagination-lg'>";
            for ($i = 1; $i <= $total; $i++) {
                if ($i == $id) {
                    echo "<li class='pagination active'><a style='color:white;background-color : #033c73;'>" . $i . "</a></li>";
                } else {
                    echo "<li><a href='?id=" . $i . "'>" . $i . "</a></li>";
                }
            }
            echo "</ul></center>";
            ?>







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