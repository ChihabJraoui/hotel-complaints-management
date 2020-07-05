
var image_size_limit = 4194304;



/*
 *  Functions
 *  ---------------------------------
 */

function readImage(file)
{
    var reader = new FileReader();

    reader.addEventListener('load', function()
    {
        var image = new Image();

        image.addEventListener('load', function()
        {
            image.src = reader.result;
        });
    });

    reader.readAsDataURL(file);
}


function disableButton(button)
{
    $(button).prepend('<i class="fa fa-spinner fa-spin"></i>');
    $(button).prop('disabled', true);
}

function enableButton(button)
{
    $(button).find('i').remove();
    $(button).prop('disabled', false);
}



/* Configuration */

window.app = {
    csrf_token: $('meta[name="csrf-token"]').attr('content')
};


/* jQuery */

$(document).ready(function()
{

    /* Sidebar Toggle */

    $('#btn-toggle-sidebar').click(function()
    {
        $('.site-sidebar-overlay').fadeIn(400);
        $('.site-sidebar').addClass('is-extended');
    });

    $('.site-sidebar-overlay').click(function()
    {
        $('.site-sidebar').removeClass('is-extended');
        $(this).fadeOut(400);
    });


    /* Bootstrap Tooltip */

    $("body").tooltip({
        selector: '[data-toggle="tooltip"]'
    });


    /* EasyUp - Tour Images */

    var tourImages = $('#tour-images');

    if(tourImages.length)
    {
        tourImages.EasyUp({
            url: ''
        });
    }


    /* STATISTICS */

    if($('#toursPie').length)
    {
        //var ctx = document.getElementById("toursPie");
        //
        //new Chart(ctx, {
        //    type: 'pie',
        //    options: {
        //        responsive: true
        //    },
        //    data: {
        //        labels: ["Circuits", "Excursions"],
        //        datasets: [{
        //            label: '# of Votes',
        //            data: [10, 5],
        //            backgroundColor: [
        //                'rgba(255, 99, 132, 0.2)',
        //                'rgba(54, 162, 235, 0.2)'
        //            ]
        //        }]
        //    }
        //});
    }

});



/*
 *  AngularJS
 *  -----------------------------------------------
 */


var angularAdmin = angular.module('Admin', []);


/* ngBackground */

angularAdmin.directive('ngBackground', function()
{
    return {
        restrict: 'A',
        link: function(scope, element, attrs)
        {
            $(element).css('background-image', 'url('+ attrs.ngBackground +')');
        }
    }
});


/* ngTimePicker */

angularAdmin.directive('ngTimePicker', function()
{
    return {
        require: '?ngModel',
        restrict: 'A',
        link: function(scope, element, attrs, ngModelCtrl)
        {
            $(element).datetimepicker({
                defaultTime: '08:00',
                formatTime: 'H:i',
                datepicker: false,
                inline: true,
                allowTimes: [
                    '06:00',
                    '07:00',
                    '08:00',
                    '09:00',
                    '10:00',
                    '11:00',
                    '12:00'
                ],
                onSelectTime: function(time)
                {
                    ngModelCtrl.$setViewValue(time.dateFormat('H:i'));
                }
            });
        }
    }
});


/* Run */

angularAdmin.run(['$rootScope', function($rootScope)
{

}]);