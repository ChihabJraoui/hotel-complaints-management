$(window).on('load', function()
{
    $("#loader").fadeOut('slow', function()
    {
        $(this).remove()
    });
});

$(document).ready(function()
{
    $('[data-background]').each(function()
    {
        $(this).css("background-image", "url(" + $(this).data("background") + ")");
    });
});