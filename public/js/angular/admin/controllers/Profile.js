
angularAdmin.controller('ProfileController', ['$scope', 'User', profileController]);

function profileController($scope, User)
{

    $scope.data = {};

    $scope.loading = true;


    /* Get User Info */

    $scope.getUser = function()
    {
        User.get().then(function(response)
        {
            console.log(response.data);
            $scope.loading = false;
            $scope.data = response.data;
        });
    };

    $scope.getUser();


    /* Show Modal */

    $scope.showModal = function()
    {

        $('#modal-photo').modal('show');
    };


    /* Submit */

    $scope.submit = function($event)
    {
        $($event.srcElement).prepend('<i class="fa fa-spinner fa-spin"></i>');
        $($event.srcElement).prop('disabled', true);

        /* Upload photos */

        $scope.data.pictures = $('#pictures')[0].files;

        console.log($scope.data.pictures);

        Picture.store($scope.data).then(function(response)
        {
            console.log(response.data);

            $($event.srcElement).find('i').remove();
            $($event.srcElement).prop('disabled', false);
        });
    };


    /*
     *  Delete
     *  ----------------------------------------
     */

    $scope.delete = function(picture)
    {

    };

}