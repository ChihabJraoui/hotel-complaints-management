
/* Configuration */

window.app = {
    csrf_token: $('meta[name="csrf-token"]').attr('content')
};



/* jQuery */

$(document).ready(function()
{

    /* Bootstrap Tooltip */

    $('[data-toggle="tooltip"]').tooltip();



    /* Form Login */

    $('#frmLogin').on('submit', function()
    {
        $(this).find('button').prepend('<i class="fa fa-spinner fa-spin"></i>');
    });

});