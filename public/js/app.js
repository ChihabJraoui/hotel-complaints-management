
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


    $('.nav-tabs a').on('click', function (e)
    {
        e.preventDefault();

        $(this).tab('show');
    });


    /* Magnific Popup Image Gallery */

    /*$('[data-image]').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });*/



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