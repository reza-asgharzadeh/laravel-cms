$(document).ready(function() {

    var owl = $("#owl-demo1");

    owl.owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout:2000,
        smartSpeed: 800,
        rtl:true,
        nav: true,
        autoplayHoverPause: true,
        navText: ["<img style='width: 2rem' src='https://i.ibb.co/c8Gp9cy/arrow-right-round.png'>","<img style='width: 2rem' src='https://i.ibb.co/sJJYzrQ/arrow-left-round.png'>"],

        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            400:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    });
});
