
angularApp.service('School', ['$http', schoolService]);

function schoolService($http)
{
    return {

        get : function()
        {
            return $http({
                method: 'GET',
                url: '/school/get'
            });
        },

        update: function()
        {
            return $http({
                method: 'POST',
                url: '/school/update'
            });
        }

    }
}