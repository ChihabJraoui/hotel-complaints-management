
/*
 *  Configuration
 *  --------------------------------------------
 */

window.app = {
    csrf_token : $('meta[name="csrf-token"]').attr('content'),
    lang : $('html').attr('lang')
};


$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN' : window.app.csrf_token }
});


/* Functions */

function Notice(msg, color)
{
    var col;

    color ? col = 'green' : col = 'red';

    new jBox('Notice',{
        content: msg,
        color: col,
        attributes: { x: 'left', y: 'bottom' },
        delayClose: 3000
    });
}


$(window).on('load', function()
{
    $("#loader").fadeOut('slow', function()
    {
        $(this).remove();
    });
});


$(document).ready(function()
{

    /* Bootstrap Tooltip */

    $('[data-toggle="tooltip"]').tooltip();


    /* Magnific Popup Image Gallery */

    $('[data-image]').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });


    /* OWL CAROUSEL */

    $('#carousel-screenshots').owlCarousel({
        items: 4,
        nav: true,
        dots: true,
        margin: 20,
        navText: ['<i class="material-icons">chevron_left</i>', '<i class="material-icons">chevron_right</i>']
    });



    /*------------------------------------
     *  TOGGLE Navigation Menu
     *------------------------------------*/

    $('#btn-nav').click(function()
    {
        $('#navigation').addClass("is-opened");
        $('.nav-overlay').fadeIn();
    });

    $('.nav-overlay').click(function()
    {
        $('#navigation').removeClass("is-opened");
        $(this).fadeOut();
    });



    /*
     *  JS Socials
     *  ----------------------------------------
     */

    // var tour_share_icons = $('#tour-share-icons');
    //
    // if(tour_share_icons.length)
    // {
    //     tour_share_icons.jsSocials({
    //         showLabel: false,
    //         showCount: true,
    //         shareIn: 'popup',
    //         shares: ['facebook', 'googleplus', 'twitter', 'pinterest']
    //     });
    // }


    /*------------------------------------------
     *  To Top Button
     *
     *  When Clicking to top button, take the
     *  user to the top of the page
     *------------------------------------------*/

    $('#to-top').click(function()
    {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
        return false;
    });


    /**
     *  Helpers
     *  ----------------------------------------
     */

    $('[data-background]').each(function(i, element)
    {
        var $el = $(element);
        $el.css('background-image', 'url('+ $el.data('background') +')');
    });
});


$(window).on('scroll', function()
{

    var scrollTop = $(this).scrollTop(),
        windowHeight = window.innerHeight;

    /* Fix the header */

    if(scrollTop > 0)
    {
        $('.main-header').addClass('-fixed');
    }
    else
    {
        $('.main-header').removeClass('-fixed');
    }


    /* Show / Hide To Top Button */

    var toTopButton = $('#to-top');

    scrollTop > windowHeight ? toTopButton.fadeIn('slow') : toTopButton.fadeOut('slow');

});



/*
 *  AngularJS
 *  -----------------------------------------------
 */

angularApp = angular.module('App', []);


/* Run */
angularApp.run(['$rootScope', function($rootScope)
{

}]);