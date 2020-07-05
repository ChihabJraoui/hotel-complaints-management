
angularAdmin.service('Tour', ['$http', tourService]);


function tourService($http)
{
    return {

        getTours : function()
        {
            return $http({
                method: 'GET',
                url: '/tours/all',
                headers: { 'X-CSRF-TOKEN': window.app.csrf_token }
            });
        },

        store : function(tour)
        {
            var formData = new FormData();
            formData.append('type', tour.type);
            formData.append('title', tour.title);
            formData.append('description_en', tour.description_en);
            formData.append('description_fr', tour.description_fr);
            formData.append('duration', tour.duration);
            formData.append('depart', tour.depart);
            formData.append('price', tour.price);
            formData.append('cover', tour.cover);
            formData.append('is_air_conditioned', tour.is_air_conditioned);
            formData.append('is_mule', tour.is_mule);
            formData.append('is_meals', tour.is_meals);
            formData.append('is_guide', tour.is_guide);
            formData.append('is_driver', tour.is_driver);

            return $http({
                method: 'POST',
                url: '/tours',
                data: formData,
                headers: {
                    'Content-Type' : undefined,
                    'X-CSRF-TOKEN': window.app.csrf_token
                },
                transformRequest: angular.identity
            });
        },

        update : function(tour)
        {
            var formData = new FormData();
            formData.append('id', tour.id);
            formData.append('type', tour.type);
            formData.append('title', tour.title);
            formData.append('description_en', tour.description_en);
            formData.append('description_fr', tour.description_fr);
            formData.append('duration', tour.duration);
            formData.append('depart', tour.depart);
            formData.append('price', tour.price);
            formData.append('cover', tour.cover);
            formData.append('is_air_conditioned', tour.is_air_conditioned);
            formData.append('is_mule', tour.is_mule);
            formData.append('is_meals', tour.is_meals);
            formData.append('is_guide', tour.is_guide);
            formData.append('is_driver', tour.is_driver);

            return $http({
                method: 'POST',
                url: '/tours/' + tour.id,
                data: formData,
                headers: {
                    'Content-Type' : undefined,
                    'X-CSRF-TOKEN': window.app.csrf_token
                },
                transformRequest: angular.identity
            });
        },

        delete : function(id)
        {
            return $http({
                method: 'DELETE',
                url: '/tours/' + id,
                headers: { 'X-CSRF-TOKEN' : window.app.csrf_token }
            });
        }

    }
}