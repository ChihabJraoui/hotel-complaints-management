
angularAdmin.service('Pricing', ['$http', pricingService]);

function pricingService($http)
{
    return {

        getPricings : function()
        {
            return $http({
                method: 'GET',
                url: '/pricings/all',
                headers: { 'X-CSRF-TOKEN': window.app.csrf_token }
            });
        },

        store : function(data)
        {
            return $http({
                method: 'POST',
                url: '/pricings',
                data: $.param(data),
                headers: {
                    'Content-Type' : 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': window.app.csrf_token
                }
            });
        },

        update : function(data)
        {
            return $http({
                method: 'POST',
                url: '/pricings/' + data.id,
                data: $.param(data),
                headers: {
                    'Content-Type' : 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': window.app.csrf_token
                }
            });
        },

        delete : function(id)
        {
            return $http({
                method: 'DELETE',
                url: '/pricings/' + id,
                headers: {
                    'Content-Type' : 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': window.app.csrf_token
                }
            });
        }

    }
}