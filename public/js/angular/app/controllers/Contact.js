
angularApp.controller('ContactController', ['$scope', '$http', contactController]);

function contactController($scope, $http)
{

    /* Send email */

    $scope.send = function($event)
    {
        $($event.currentTarget).prepend('<i class="fa fa-spinner fa-spin"></i>');
        $($event.currentTarget).prop('disabled', true);

        $http({
            method: 'POST',
            url: '/' + window.app.lang + '/contact/send',
            data: $.param($scope.data),
            headers: {
                'Content-Type' : 'application/x-www-form-urlencoded',
                'X-CSRF-TOKEN' : window.app.csrf_token
            }
        }).then(function(response)
        {
            if(response.data.error == 0)
            {
                Notice('Thank you, your message was sent successfuly', true);

                $($event.currentTarget).find('i').remove();
                $($event.currentTarget).prop('disabled', false);

                $('form[name="frmContact"]')[0].reset();
                $scope.frmContact.$setPristine();
                $scope.frmContact.$setUntouched();
            }
            else
            {
                Notice('Something went wrong, please try again later', false);

                $($event.currentTarget).find('i').remove();
                $($event.currentTarget).prop('disabled', false);
            }
        });
    };

}