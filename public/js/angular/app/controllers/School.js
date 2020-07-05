
angularApp.controller('SchoolController', ['$scope', 'School', schoolController]);

function schoolController($scope, School)
{

    $scope.data = {};


    /*
     *  Get
     */

    $scope.getSchool = function()
    {
        School.get().then(function(resp)
        {
            $scope.school = resp.data;
        },
        function(resp)
        {
            console.log(resp.data);
        });
    };

    $scope.getSchool();


    /*
     *  Update
     */

    $scope.update = function()
    {
        School.update($scope.data).then(function(resp)
        {
            console.log(resp.data);
        },
        function(resp)
        {
            console.log(resp.data);
        });
    };
}