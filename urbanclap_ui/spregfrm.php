<?php
include "db_conection.php";
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Urban Services</title>
    <link rel="shortcut icon" href="assets/img/title.png" type="image/x-icon" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet"        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/flexslider.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    

</head>

<body>
    <!--Nav Bar-->
    <div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo"><a class="navbar-brand" href="index.php">U<span>S.</span></a></div>
                <!--<a class="navbar-brand" href="#"><img class="logo-custom" src="assets/img/logoz.png" alt=""  /></a>-->
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                    <!--<li><a href="#home">HOME</a></li>-->
                    <li><a href="#features-sec" data-toggle="modal" data-target="#an">ADMIN</a></li>
                    <li><a href="#features-sec" data-toggle="modal" data-target="#su">SIGN UP  </a></li>
                    <li><a href="#features-sec" data-toggle="modal" data-target="#ln">SIGN IN</a></li>
                    <!--<li><a href="#features-sec" data-toggle="modal" data-target="#pu">SP SIGNUP</a></li>-->
                    <li><a href="spregfrm.php"> SP SIGNUP </a></li>
                    <li><a href="#features-sec" data-toggle="modal" data-target="#bn">SPLOGIN</a></li>
                    <!--<li><a href="#course-sec">CONTACT US</a></li>-->

                </ul>
            </div>
        </div>
    </div>

    <!--customer Regestration-->
    <div class="modal fade" id="su" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
        <div class="modal-dialog modal-sm">
            <div style="color:white;background-color:#6e0a1e" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Customer Registration Form</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="creg.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Name" name="c_name" type="text"                         required>                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Address" name="c_address" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="City" name="c_city" type="text"
                                    required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mobile No" name="c_contact" type="text"
                                    required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="c_email" type="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="c_password" type="password"
                                    required>
                            </div>
                        </fieldset>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-md btn-warning btn-block" name="register">Sign Up</button>
                    <button type="button" class="btn btn-md btn-success btn-block" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!--Customer login-->
    <div class="modal fade" id="ln" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
        <div class="modal-dialog modal-sm">
            <div style="color:white;background-color:#6e0a1e" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 style="color:white" class="modal-title" id="myModalLabel">Customer Login</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="userlogin.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="user_email" type="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="user_password" type="password"
                                    required>
                            </div>
                        </fieldset>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-md btn-warning btn-block" name="user_login">Sign In</button>
                    <button type="button" class="btn btn-md btn-success btn-block" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-md btn-warning btn-block" a href="#features-sec"
                        data-toggle="modal" data-target="#su" data-dismiss="modal">Don't Have An Account ? Sign Up
                        Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--SPlogin-->
    <div class="modal fade" id="bn" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
        <div class="modal-dialog modal-sm">
            <div style="color:white;background-color:#6e0a1e" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 style="color:white" class="modal-title" id="myModalLabel">Service Provider Login</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="splogin.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="user_email" type="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="user_password" type="password"
                                    required>
                            </div>
                        </fieldset>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-md btn-warning btn-block" name="user_login">Sign In</button>
                    <button type="button" class="btn btn-md btn-success btn-block" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Admin Login-->
    <div class="modal fade" id="an" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
        <div class="modal-dialog modal-sm">
            <div style="color:white;background-color:#6e0a1e" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 style="color:white" class="modal-title" id="myModalLabel">Administrator Credentials</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="adminlogin.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="admin_username" type="text"
                                    required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="admin_password" type="password"
                                    required>
                            </div>
                        </fieldset>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-md btn-warning btn-block" name="admin_login">Login</button>
                    <button type="button" class="btn btn-md btn-success btn-block" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        
    
    <form class="well form-horizontal" name="signup" action="spreg.php" method="post">
    <legend><center><h2><b>Hello! Service Provider, Create your account and be a part of US</b></h2></center></legend><br>
      
<!-- Name input
<input type="text" class="form-control" value="" placeholder="Full Name" name="sp_name" autocomplete="off" required="">-->
<div class="form-group">
  <label class="col-md-4 control-label">Full Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
  <input  name="sp_name" placeholder="Name" class="form-control"  type="text" required="">
    </div>
  </div>
</div>

<!-- Text input
<input type="text" class="form-control" value="" placeholder="Address" name="sp_add" autocomplete="off" >-->

<div class="form-group">
  <label class="col-md-4 control-label" >Address</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-street-view" aria-hidden="true"></i></span>
  <input name="sp_add" placeholder="Address" class="form-control"  type="text" required="">
    </div>
  </div>
</div>

<!-- Text input
<input type="text"class="form-control"  value="" placeholder="City" name="sp_city" autocomplete="off" required="">-->
  
<div class="form-group">
  <label class="col-md-4 control-label" >City</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map" aria-hidden="true"></i></span>
  <input name="sp_city" placeholder="City" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input
<input type="text" class="form-control" value="" placeholder="Phone" name="sp_contact" autocomplete="off" required="">-->

       
<div class="form-group">
  <label class="col-md-4 control-label">Contact No.</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-address-book" aria-hidden="true"></i></span>
  <input name="sp_contact" placeholder="Phone" class="form-control" type="text" required="">
    </div>
  </div>
</div>



<!-- Text input
<input type="text" class="form-control" value="" placeholder="Email" name="sp_email" autocomplete="off" required="">-->

<div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="sp_email" placeholder="E-Mail Address" class="form-control"  type="text" required="">
    </div>
  </div>
</div>

<!-- Text input
<input type="text" class="form-control" value="" placeholder="Experience" name="sp_exp" autocomplete="off" required="">-->
<div class="form-group">
  <label class="col-md-4 control-label" >Experience</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-suitcase" aria-hidden="true"></i></span>
  <input name="sp_exp" placeholder="Experience" class="form-control"  type="number">
    </div>
  </div>
</div>


       <!-- Text input
        <input type="text" class="form-control" value="" placeholder="Account No" name="sp_ac" autocomplete="off" required="">-->
<div class="form-group">
  <label class="col-md-4 control-label" >Account No</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span>
  <input name="sp_ac" placeholder="Account No" class="form-control"  type="number">
    </div>
  </div>
</div>

         <!-- Text input
         <input type="text" class="form-control" value="" placeholder="IFSC Code" name="sp_ifsc" autocomplete="off" required="">-->
<div class="form-group">
  <label class="col-md-4 control-label" >IFSC Code</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span>
  <input name="sp_ifsc" placeholder="IFSC Code" class="form-control"  type="number">
    </div>
  </div>
</div>

       <!-- Text input <input type="text" class="form-control" value="" placeholder="Rate" name="sp_rate" autocomplete="off" required="">
-->
<div class="form-group">
  <label class="col-md-4 control-label" >Rate</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span>
  <input name="sp_rate" placeholder="Rate" class="form-control"  type="number">
    </div>
  </div>
</div>





       
        <!--<select name="s_name">
            <option>~SELECT Service~</option>
            <?php

# $sql = "SELECT * FROM service where No_sp<20";
#$result = $dbcon->query($sql);

#while ($row = $result->fetch_array()) {
# echo "<option value='" . $row["s_name"] . "'>" . $row["s_name"] . "</option>";
# }

?>
        </select> <br><br>-->


<div class="form-group"> 
  <label class="col-md-4 control-label"> Service Name:</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-puzzle-piece" aria-hidden="true"></i></span>
    <select name="s_name" class="form-control selectpicker">
      <option value="">--Select Service--</option>
      <?php

$sql = "SELECT * FROM service where No_sp<20";
$result = $dbcon->query($sql);

while ($row = $result->fetch_array()) {
    echo "<option value='" . $row["s_name"] . "'>" . $row["s_name"] . "</option>";
}

?>
    </select>
  </div>
</div>
</div>
  
<!-- Text input-->



<!--pwd input
<input type="password" class="form-control" value="" placeholder="Password" name="pass" required="">-->
<div class="form-group">
  <label class="col-md-4 control-label" >Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-toggle-on" aria-hidden="true"></i></i></span>
  <input name="pass" placeholder="Password" class="form-control"  type="password">
    </div>
  </div>
</div>


<!-- Select Basic -->
<style>#success_message{ display: none;}</style>
<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCREATE ACCOUNT  <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
        
        
        <!-- footer section start -->
    <footer>
        <span> By <a href="#">Group One</a> | <span
                class="far fa-copyright"></span> 2021 B.Tech V SEM CU.</span>
    </footer>
        
       

        <script>
              $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            sp_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please enter your First Name'
                    }
                }
            },
             
			 
			 pass: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please enter your Password'
                    }
                }
            },
			
            },
            sp_email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your Email Address'
                    },
                    emailAddress: {
                        message: 'Please enter a valid Email Address'
                    }
                }
            },
            sp_contact: {
                validators: {
                  stringLength: {
                        min: 12, 
                        max: 12,
                    notEmpty: {
                        message: 'Please enter your Contact No.'
                     }
                }
            },
			 s_name: {
                validators: {
                    notEmpty: {
                        message: 'Please select your Service'
                    }
                }
            },
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
</script>
<!--  Jquery Core Script -->
<script src="assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="assets/js/bootstrap.js"></script>
    <!--  Flexslider Scripts -->
    <script src="assets/js/jquery.flexslider.js"></script>
    <!--  Scrolling Reveal Script -->
    <script src="assets/js/scrollReveal.js"></script>
    <!--  Scroll Scripts -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!--  Custom Scripts -->
    <script src="assets/js/custom.js"></script>

</body>

</html>