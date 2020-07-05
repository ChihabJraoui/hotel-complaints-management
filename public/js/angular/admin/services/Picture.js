
angularAdmin.service('Picture', ['$http', pictureService]);

function pictureService($http)
{
    return {

        get : function()
        {
            return $http({
                method: 'GET',
                url: '/gallery/get',
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
        },

        delete: function(id)
        {
            return $http({
                method: 'DELETE',
                url: '/gallery/' + id,
                headers: { 'X-CSRF-TOKEN' : window.app.csrf_token }
            });
        }

    }
}