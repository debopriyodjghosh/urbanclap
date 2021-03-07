
<!-- Mediul Modal -->
<div class="modal fade" id="setAccount" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
    <div class="modal-dialog modal-sm">
        <div style="color:white;background-color: #c41b21" class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 style="color:white" class="modal-title" id="myModalLabel">Account Settings</h2>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" action="settings.php">
                    <fieldset>
                        <p>Name:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="Name" name="c_name" type="text" value="<?php echo $c_name; ?>" required>
                        </div>
                        <p>Address:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="Address" name="c_add" type="text" value="<?php echo $c_add; ?>" required>
                        </div>
                        <p>City:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="City" name="c_city" type="text" value="<?php echo $c_city; ?>" required>
                        </div>
                        <p>Mobile:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="Mobile" name="c_contact" type="text" value="<?php echo $c_contact; ?>" required>
                        </div>
                        <p>Password:</p>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo $password; ?>" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control hide" name="c_email" type="text" value="<?php echo $user_email; ?>" required>
                        </div>
                    </fieldset>
            </div>
            <div class="modal-footer">

                <button class="btn btn-block btn-success btn-md" name="user_save">Save</button>

                <button type="button" class="btn btn-block btn-danger btn-md" data-dismiss="modal">Cancel</button>


                </form>
            </div>
        </div>
    </div>
</div>