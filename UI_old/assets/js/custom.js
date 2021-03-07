/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% Free To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */

(function($) {
    "use strict";
    var mainApp = {
        scrollAnimation_fun: function() {

            /*====================================
             ON SCROLL ANIMATION SCRIPTS 
            ======================================*/


            window.scrollReveal = new scrollReveal();

        },
        scroll_fun: function() {

            /*====================================
                 EASING PLUGIN SCRIPTS 
                ======================================*/
            $(function() {
                $('.move-me a').bind('click', function(event) { //just pass move-me in design and start scrolling
                    var $anchor = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1000, 'easeInOutQuad');
                    event.preventDefault();
                });
            });

        },

        top_flex_slider_fun: function() {
            /*====================================
             FLEX SLIDER SCRIPTS 
            ======================================*/
            $('#main-section').flexslider({
                animation: "fade", //String: Select your animation type, "fade" or "slide"
                slideshowSpeed: 3000, //Integer: Set the speed of the slideshow cycling, in milliseconds
                animationSpeed: 1000, //Integer: Set the speed of animations, in milliseconds
                startAt: 0, //Integer: The slide that the slider should start on. Array notation (0 = first slide)

            });
        },

        custom_fun: function() {
            /*====================================
             WRITE YOUR   SCRIPTS  BELOW
            ======================================*/




        },

    }


    $(document).ready(function() {
        mainApp.scrollAnimation_fun();
        mainApp.scroll_fun();
        mainApp.top_flex_slider_fun();
        mainApp.custom_fun();
    });
}(jQuery));



$(document).ready(function() {
    $(window).scroll(function() {
        // sticky navbar on scroll script
        if (this.scrollY > 20) {
            $('.navbar').addClass("sticky");
        } else {
            $('.navbar').removeClass("sticky");
        }

        // scroll-up button show/hide script
        if (this.scrollY > 500) {
            $('.scroll-up-btn').addClass("show");
        } else {
            $('.scroll-up-btn').removeClass("show");
        }
    });

    // slide-up script
    $('.scroll-up-btn').click(function() {
        $('html').animate({ scrollTop: 0 });
        // removing smooth scroll on slide-up button click
        $('html').css("scrollBehavior", "auto");
    });

    $('.navbar .menu li a').click(function() {
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });

    // toggle menu/navbar script
    $('.menu-btn').click(function() {
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });

    // typing text animation script
    var typed = new Typed(".typing", {
        strings: ["Painter", "Plumber", "Electrician", "Salon", "Carpenter"],
        typeSpeed: 100,
        backSpeed: 30,
        loop: true
    });

    var typed = new Typed(".typing-2", {
        strings: ["Painter", "Plumber", "Electrician", "Salon", "Carpenter"],
        typeSpeed: 100,
        backSpeed: 30,
        loop: true
    });

    // owl carousel script
    $('.carousel').owlCarousel({
        margin: 20,
        loop: true,
        autoplayTimeOut: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false
            }
        }
    });
});