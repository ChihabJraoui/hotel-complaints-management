
angularAdmin.service('Review', ['$http', reviewService]);

function reviewService($http)
{
    return {

        getReviews : function()
        {
            return $http({
                method: 'GET',
                url: '/reviews/get',
                headers: { 'X-CSRF-TOKEN': window.app.csrf_token }
            });
        },

        store : function(tour)
        {
            return $http({
                method: 'POST',
                url: '/tours',
                data: $.param(tour),
                headers: {
                    'Content-Type' : 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': window.app.csrf_token
                }
            })
        },

        update : function(tour)
        {
            return $http({
                method: 'PUT',
                url: '/tours/' + tour.id,
                data: $.param(tour),
                headers: {
                    'Content-Type' : 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': window.app.csrf_token
                }
            })
        }

    }
}