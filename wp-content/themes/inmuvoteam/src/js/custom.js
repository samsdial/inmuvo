/*
var name = "Sergio Andres";
console.log(name);*/
var $ = jQuery;
$(document).ready(function(){
    $('.slider_intro').slick({
        arrows: false,
        fade: true
    });
   $('.slider_customer').slick({
       infinite: true,
       slidesToShow: 3,
       slidesToScroll: 2,
       autoplay: true,
       arrows: false,
       autoplaySpeed: 12000,
       adaptiveHeight: true,
       responsive: [
           {
               breakpoint: 1024,
               settings: {
                   slidesToShow: 3,
                   slidesToScroll: 3,
                   infinite: true,
                   dots: true
               }
           },
           {
               breakpoint: 992,
               settings: {
                   slidesToShow: 2,
                   slidesToScroll: 2
               }
           },
           {
               breakpoint: 768,
               settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1
               }
           }
       ]
   });
});
/* Animation */
AOS.init();