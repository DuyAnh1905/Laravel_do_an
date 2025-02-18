import './bootstrap';

// Owl Carousel
import 'owl.carousel';

// Import jQuery
import $ from 'jquery';
window.$ = window.jQuery = $;

// Initialize Owl Carousel
$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
});
