<?php
session_start();

if (!$_SESSION['user_email']) {

    header("Location: ../index.php");
}

include("config.php");
extract($_SESSION);
$stmt_edit = $DB_con->prepare('SELECT * FROM customer WHERE c_email =:user_email');
$stmt_edit->execute(array(':user_email' => $user_email));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);

?>

<?php
include "nav.php";
?>

<div id="page-wrapper">






    <div id="my-carousel" class="carousel slide hero-slide hidden-xs" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#my-carousel" data-slide-to="1"></li>
            <li data-target="#my-carousel" data-slide-to="2"></li>
            <li data-target="#my-carousel" data-slide-to="3"></li>
            <li data-target="#my-carousel" data-slide-to="4"></li>
            <li data-target="#my-carousel" data-slide-to="5"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">

                <img src="../assets/img/1-slide.jpg" alt="Hero Slide" style="width:100%;height:500px;">

                <div class="carousel-caption">
                    <h1 style="font-family:Century Gothic"><b></b></h1>

                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <img src="../assets/img/2-slide.jpg" alt="..." style="width:100%;height:500px;">

                <div class="carousel-caption">

                </div>
            </div>
            <div class="item">
                <img src="../assets/img/3-slide.jpg" alt="..." style="width:100%;height:500px;">

                <div class="carousel-caption">


                    <p></p>
                </div>
            </div>

            <div class="item">
                <img src="../assets/img/4-slide.jpg" alt="..." style="width:100%;height:500px;">

                <div class="carousel-caption">


                    <p></p>
                </div>
            </div>

            <div class="item">
                <img src="../assets/img/5-slide.jpg" alt="..." style="width:100%;height:500px;">

                <div class="carousel-caption">


                    <p></p>
                </div>
            </div>

            <div class="item">
                <img src="../assets/img/6-slide.jpg" alt="..." style="width:100%;height:500px;">

                <div class="carousel-caption">


                    <p></p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">

            <span class="icon-prev"></span>

        </a>
        <a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">

            <span class="icon-next"></span>
        </a>

        <!-- #my-carousel-->

    </div>


    <br />
    <div class="alert alert-info">

        &nbsp; &nbsp; Welcome to Urban Services! So, if you're looking for an Element skateboard, why not visit the Urban Services?
        It's that easy. If you have a favorite skate brand,
        this is the easiest and most straightforward way to get it.A lot of skate brands who are well known for one thing,
        like decks, also sell completes with
        their own special wheels, along with other brands for things like trucks, bearings, etc.
    </div>
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
-------------------------------------------------------
</body>

</html>