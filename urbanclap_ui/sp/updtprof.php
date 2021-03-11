<?php include("config.php");
extract($_SESSION);
$stmt_edit = $DB_con->prepare('SELECT * FROM service_provider WHERE sp_email =:sp_email');
$stmt_edit->execute(array(':sp_email' => $sp_email));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);?>
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
          <div class="modal-dialog modal-md">
            <div style="color:white;background-color:#008CBA" class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 style="color:white" class="modal-title" id="myModalLabel">Account Settings</h2>
              </div>
              <div class="modal-body">
         
				
			
				
				 <form enctype="multipart/form-data" method="post" action="settings.php">
         <fieldset>

                        <p>Name:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="Name" name="sp_name" type="text" value="<?php echo $sp_name; ?>" required>
                        </div>
                        <p>Address:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="Address" name="sp_add" type="text" value="<?php echo $sp_add; ?>" required>
                        </div>
                        <p>City:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="City" name="sp_city" type="text" value="<?php echo $sp_city; ?>" required>
                        </div>
                        <p>Mobile:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="Mobile" name="sp_contact" type="text" value="<?php echo $sp_contact; ?>" required>
                        </div>
                        <p>Password:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo $password; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <input class="form-control hide" name="sp_email" type="text" value="<?php echo $sp_email; ?>" required>
                        </div>
                    </fieldset>
                  
            
              </div>
              <div class="modal-footer">
               
                <button class="btn btn-success btn-md" name="sp_save">Save</button>
				
				 <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
				
				
				   </form>
              </div>
            </div>
          </div>
        </div>