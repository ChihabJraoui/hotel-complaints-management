
angularApp.controller('HomeController', ['$scope', 'Tour', homeController]);

function homeController($scope, Tour)
{
    $scope.loading = true;


    /*
     *  Get tours and excursions
     *  ----------------------------------------------
     */

    /*$scope.getTours = function()
    {
        Tour.getTours().then(function(response)
        {
            console.log(response.data);

            $scope.tours = response.data.tours;
            $scope.excursions = response.data.excursions;
            $scope.loading = false;
        },
        function(resp)
        {
            console.log('error :', resp.data);
        });
    };

    $scope.getTours();*/
}