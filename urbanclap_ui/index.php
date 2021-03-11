<?php
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
                                <input class="form-control" placeholder="Email" name="sp_email" type="email" required>
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



    <!-- home section start -->
    <div class="home-sec" id="home">
        <div class="overlay">
            <div class="home" id="home">

                <div class="max-width">

                    <div class="home-content">

                        <div class="text-1"> Hello, We are,</div>
                        <div class="text-2"> Urban<span ></span><span class="text-4"> services.</span></div>

                        <div class="text-3"> And we provide <span class="typing"></span> service at your doorstep </div>
                        <a href="#">Book a service</a>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- services Style script css -->
    <style>body {
    background-color: #eee
}

.card {
    padding: 10px;
    border: none;
    cursor: pointer
}

.card:hover {
    background-color: #dc143c
}

.card span {
    font-size: 14px
}</style>

    <!--Services-->
    <section class="teams" id="teams">
        <div class="max-width">
            <h2 class="title">Our Services</h2>
 <div class="container bg-white mt-5 p-3">
    <div class="row g-2">
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/sofa.png" width="36" /> </div> <span>Saloon</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/cleaning.png" width="36" /> </div> <span>Cleaning</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/vehiclecare.png" width="36" /> </div> <span>Car Repair</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/electrical.png" width="36" /> </div> <span>Electrician</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/painting.png" width="36" /> </div> <span>Painter</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/plumbing.png" width="36" /> </div> <span>Plumber</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/carpentry.png" width="36" /> </div> <span>Carpenter</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/laundry.png" width="36" /> </div> <span>Laundry</span>
            </div>
        </div>
        <div class="col-md-2">

            <div class="card text-center">
                <div class="image"> <img src="assets/img/interiordesign.png" width="36" /> </div> <span>Interior design</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/cockroach.png" width="36" /> </div> <span>Pest control</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/appliances.png" width="36" /> </div> <span>AC Repair</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/home-spa2.png" width="36" /> </div> <span>Massage</span>
            </div>
        </div>
    </div>
</div>

</div>
</section>

    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">Our Story</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="assets/img/profile-1.jpg" alt="">
                </div>
                <div class="column right">
                    <div class="text">We provide Expert <span class="typing-2"></span></div>
                    <p><strong>Like all good things, the idea of Urban Services was born out of necessity. 
                        When you need help with small but important household chores, isn't it practically 
                        impossible to find trusted providers, who deliver consistently impeccable service, on time?
                         Yes, that happened with us too. All the time. After trying dozens of other services which 
                         were just glorified directories, we decided to build US. US is the most convenient 
                         and hassle free way to get your household work done. With handcrafted mobile solutions, 
                         unmatched service quality, and background verified providers who are always willing to 
                         lend a hand, we aim to aid in solving all your household problems with efficiency, ease 
                         and most importantly, a personal touch.</p>
                    <a href="#">Contact US</a>
                </div>
            </div>
        </div>
    </section>

    <!--my teams
    <section class="teams" id="teams">
        <div class="max-width">
            <h2 class="title">My teams</h2>
            <div class="carousel owl-carousel">
                <div class="card">
                    <div class="box">
                        <img src="assets/img/profile-1.jpg" alt="">
                        <div class="text">Debopriyo Ghosh</div>
                        <p>Designer & Developer</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="assets/img/profile-2.jpg" alt="">
                        <div class="text">Saikat Jana</div>
                        <p>Tester & Developer</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="assets/img/profile-3.jpg" alt="">
                        <div class="text">Mousumi Mondal</div>
                        <p>Content Creator</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="assets/img/profile-4.jpeg" alt="">
                        <div class="text">Saradindu Rana</div>
                        <p>Frontend Devoloper</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="assets/img/profile-5.jpg" alt="">
                        <div class="text">Srila Parui</div>
                        <p>Tester</p>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!--testimonial section-->
    <div id="testimonials-sec" class="container set-pad" >
             <div class="row text-center">
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                     <h1 data-scroll-reveal="enter from the bottom after 0.2s"  class="header-line">Customer's Talk </h1>
                     <p data-scroll-reveal="enter from the bottom after 0.3s" >
                     Have a look what our customer's said about us.
                         </p>
                 </div>

             </div>
            


           <div class="row" >
           
               
                 <div class="col-lg-3  col-md-3 col-sm-3" data-scroll-reveal="enter from the bottom after 0.4s">
                     <div class="about-div">
                  <center>  <img class="img img-circle" src="assets/img/person-1.jpg" style="width:100px;height:100px;" />
                   <h3 >Paul Rodriguez</h3>
                 <hr />
                       
                   <p >
                       This company is one of the best in the market they give us
					   what we need on our skateboards.
                   </p>
				   </center>
                </div>
                   </div>
                   
				   
				   <div class="col-lg-3  col-md-3 col-sm-3" data-scroll-reveal="enter from the bottom after 0.4s">
                     <div class="about-div">
                  <center>  <img class="img img-circle" src="assets/img/person-2.jpg" style="width:100px;height:100px;" />
                   <h3 >Tony <br />Hawk</h3>
                 <hr />
                      
                   <p >
                       One time I have mistakenly order a wrong set up but luck they immediately notify me.
                   </p>
				   </center>
				   <br />
               
                </div>
                   </div>
				   
				   
				    <div class="col-lg-3  col-md-3 col-sm-3" data-scroll-reveal="enter from the bottom after 0.4s">
                     <div class="about-div">
                  <center>  <img class="img img-circle" src="assets/img/person-3.png" style="width:100px;height:100px;" />
                   <h3 >Leticia <br /> Bufoni</h3>
                 <hr />
                       
                   <p >
                      They are so flexible, approachable they can adjust to my schedule they value trust.
                   </p>
				   </center>
              
                </div>
                   </div>
                 
				 <div class="col-lg-3  col-md-3 col-sm-3" data-scroll-reveal="enter from the bottom after 0.4s">
                     <div class="about-div">
                  <center>  <img class="img img-circle" src="assets/img/person-4.jpg" style="width:100px;height:100px;" />
                   <h3 >Luan <br />Olivera</h3>
                 <hr />
                       
                     <p>They deliver so fast and the price of the items are low.</p>

				   </center>
				   <br />
				   
              
                </div>
                   </div>
                 
                 
               </div>
             </div>

    <!-- skills section start -->
    <section class="skills" id="skills">
        <div class="max-width">
            <h2 class="title">Why Choose Us</h2>
            <div class="skills-content">
                <div class="column left">
                    <div class="text">Things that make Urban Services the ideal partner for home maintenance</div>
                    <p>With over 22,000 trained and police verified professionals, the idea is not just to bring household services to your doosrstep. It's also to do so with the highest quality assurance. Steps that are not exactly a commonplace in the household service space. And it's not just the services that you avail with US. It's also the expert consultation to assess your requirements backed by the fair practices to ensure thos requirements are met. And the best way to enjoy all these and more is with the unique subsctiption plans from US. Offering your services of choice for an entire year and a fair share of cost advantage!</p>
                    <!--<a href="#">Read more</a>-->
                </div>
                <div class="column right">
                    <div class="bars">
                        <div class="info">
                            <span>Environment friendly</span>
                            <span>100%</span>
                        </div>
                        <div class="line html"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>Satisfied Homes</span>
                            <span>23,000 +</span>
                        </div>
                        <div class="line css"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>In-house Professionals</span>
                            <span>30,000 +</span>
                        </div>
                        <div class="line js"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span> Best Startup Award </span>
                            <span>100%</span>
                        </div>
                        <div class="line php"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>Reasonable Pricing</span>
                            <span>70%</span>
                        </div>
                        <div class="line mysql"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- teams section start -->
    <section class="teams" id="teams">
        <div class="max-width">
            <h2 class="title">Our Services</h2>
 <div class="container bg-white mt-5 p-3">
    <div class="row g-2">
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/automation.png" width="36" /> </div> <span>Automation</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/computer_repair.png" width="36" /> </div> <span>Computer Repair</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/relocation.png" width="36" /> </div> <span>Relocation</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/offer3.png" width="36" /> </div> <span>Maintainence</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/mansion.png" width="36" /> </div> <span>Mason</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/clean4.png" width="36" /> </div> <span>Cleaning</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/Foaming.png" width="36" /> </div> <span>Foaming</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/Dusting.png" width="36" /> </div> <span>Dusting</span>
            </div>
        </div>
        <div class="col-md-2">

            <div class="card text-center">
                <div class="image"> <img src="assets/img/installation.png" width="36" /> </div> <span>Installation</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/fridge.png" width="36" /> </div> <span>Fridge Repair</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/washing.png" width="36" /> </div> <span>Washing</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="image"> <img src="assets/img/Mopping.png" width="36" /> </div> <span>Mopping</span>
            </div>
        </div>
    </div>
</div>

</div>
</section>
        </div>
    </section>

    <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact Us</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Get in Touch</div>
                    <p> Urban Services is the most convenient and hassle free way to get your household work done. With handcrafted mobile solutions, unmatched service quality, and background verified providers who are always willing to lend a hand, we aim to aid in solving all your household problems with efficiency, ease and most importantly, a personal touch.</p>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Name</div>
                                <div class="sub-title">Debopriyo Ghosh</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Address</div>
                                <div class="sub-title">Heaven, MCU</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email</div>
                                <div class="sub-title">donotreply@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">Message me</div>
                    <form action="#">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" placeholder="Name" required>
                            </div>
                            <div class="field email">
                                <input type="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Subject" required>
                        </div>
                        <div class="field textarea">
                            <textarea cols="30" rows="10" placeholder="Message.." required></textarea>
                        </div>
                        <div class="button">
                            <button type="submit">Send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- footer section start -->
    <footer>
        <span> By <a href="#">Group One</a> | <span
                class="far fa-copyright"></span> 2021 B.Tech V SEM CU.</span>
    </footer>


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
