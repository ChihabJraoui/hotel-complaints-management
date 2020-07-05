
angularAdmin.service('User', ['$http', userService]);

function userService($http)
{
    return {

        get : function()
        {
            return $http({
                method: 'GET',
                url: '/profile/get-user',
                headers: {
                    'X-CSRF-TOKEN' : window.app.csrf_token
                }
            });
        },

        store : function(data)
        {
            var formData = new FormData();

            $.each(data.pictures, function(i, picture)
            {
                console.log('pic - ' + i + '\n');
                formData.append('pictures[]', picture);
            });

            return $http({
                method: 'POST',
                url: '/gallery',
                data: formData,
                headers : {
                    'Content-Type' : undefined,
                    'X-CSRF-TOKEN' : window.app.csrf_token
                },
                transformRequest: angular.identity
            });
        }

    }
}