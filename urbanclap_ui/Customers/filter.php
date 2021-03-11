
<div class="page-wrapper">
<div class="col-md-1">  
</div>
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

     <div class="row filter_data"></div>
</div>



