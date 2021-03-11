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
include "nav.php"; ?>

    <div id="page-wrapper">
                <div class="alert alert-default" style="color:white;background-color:#008CBA">
                    <center>
                        <h3> <span class="glyphicon glyphicon-shopping-cart"></span> This is our well knowned service providers, Book now!</h3>
                    </center>
                </div>   
    </div>
    <div class="page-wrapper">
        <div class="col-md-1"></div>
        <div class="col-md-2">    
                <div class="input-group-prepend">
                        <h3>Price</h3>
                        <input type="hidden" id="hidden_minimum_price" value="100" />
                        <input type="hidden" id="hidden_maximum_price" value="5000" />
                        <p id="price_show">100 - 5000</p>
                        <div id="price_range">
                        </div>
                    </div>
                <div class="form-group">
                    <h3>Service</h3>
                    <div style="input-group-prepend">
                    <?php
include("config.php");
$stmt_edit = $DB_con->prepare('SELECT DISTINCT s_name FROM service_provider');
$stmt_edit->execute();
$edit_row = $stmt_edit->fetchAll();
?>

                    <!--<select class="form-control"  readonly>
                    <option>--SELECT Service--</option>-->
                        <?php foreach ($edit_row as $row) { ?>

                        <div class="list-group-item checkbox"><label><input type="checkbox" class="common_selector ram"
                                    value="<?php echo $row['s_name']; ?>"> <?php echo $row['s_name']; ?></label></div>

                        <?php #echo "<option class='common_selector brand' value='" . $row['s_name'] . "'>" . $row['s_name'] . "</option>";


}?>
            <!--</select>-->
            </div>
            </div>


                <div class="form-group">
                    <h3>City</h3>
                    <div style="input-group-prepend">
                        
                        
                        <?php include("config.php");
$stmt_edit = $DB_con->prepare('SELECT DISTINCT sp_city FROM service_provider');
$stmt_edit->execute();
$edit_row = $stmt_edit->fetchAll();
extract($edit_row); ?>



                                <!--<select class="form-control" name="sp_city" readonly>
                                <option>--SELECT city--</option>-->
                        <?php foreach ($edit_row as $row) { ?>
                                    <?php #echo "<option class='common_selector ram' value='" . $row['sp_city'] . "'>" . $row['sp_city'] . "</option>"; ?>      
                                    <div class="list-group-item checkbox"><label><input type="checkbox" class="common_selector brand" value="<?php echo $row['sp_city']; ?>"  > <?php echo $row['sp_city']; ?></label>     </div>
                        <?php
}?>
                                <!--</select>-->
                            </div>
                </div>


        </div>
        <div class="col-md-9">   <br />
        <div class="row filter_data">
           
        </div>
        </div>
</div>
            <br />
<?php
include "edit_ac.php";
?>

<style>
#loading
{
	text-align:center; 
	background: yellow; 
	height: 150px;
}
</style>
<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
    
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var ram = get_filter('ram');
  
       
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram},
            success:function(data){
                $('.filter_data').html(data);
            }
            
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:100,
        max:5000,
        values:[100, 5000],
        step:100,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>
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