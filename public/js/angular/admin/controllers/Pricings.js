
angularAdmin.controller('PricingsController', ['$scope', 'Pricing', pricingController]);

function pricingController($scope, Pricing)
{

    $scope.data = {};

    $scope.modal = {};

    $scope.loading = true;


    /* Init Data */

    $scope._init = function()
    {
        $scope.data.pricing = {
            is_with_guide: 0,
            is_with_dinner: 0,
            is_half_day: 0,
            is_round_trip: 0
        };
    };

    $scope._init();


    /* Get Pricings */

    $scope.getPricings = function()
    {
        $scope.loading = true;

        Pricing.getPricings().then(function(response)
        {
            $scope.pricings = response.data;
            $scope.loading = false;
        });
    };

    $scope.getPricings();


    /* Show Modal */

    $scope.showModal = function(pricing)
    {
        $scope._init();

        $scope.frmPricing.$setPristine();
        $scope.frmPricing.$setUntouched();

        if(pricing == null)
        {
            $scope.modal.title = 'Nouveau Tarif';
            $scope.modal.type = 'new';
        }
        else
        {
            $scope.modal.title = 'Modifier tarif : ';
            $scope.modal.type = 'edit';

            $scope.data.pricing.id = pricing.id;
            $scope.data.pricing.from = pricing.from;
            $scope.data.pricing.to = pricing.to;
            $scope.data.pricing.description = pricing.description;
            $scope.data.pricing.price = pricing.price;
            $scope.data.pricing.is_with_guide = pricing.is_with_guide;
            $scope.data.pricing.is_with_dinner = pricing.is_with_dinner;
            $scope.data.pricing.is_half_day = pricing.is_half_day;
            $scope.data.pricing.is_round_trip = pricing.is_round_trip;
        }

        $('#modal-pricings').modal('show');
    };


    /* Submit Form*/

    $scope.submit = function($event)
    {
        $($event.currentTarget).prepend('<i class="fa fa-spinner fa-spin"></i>');
        $($event.currentTarget).prop('disabled', true);

        if($scope.modal.type == 'new')
        {
            Pricing.store($scope.data.pricing).then(function(response)
            {
                $('#modal-pricings').modal('hide');

                console.log('Pricing created \n', response.data);
                $scope.getPricings();

                $($event.currentTarget).find('i').remove();
                $($event.currentTarget).prop('disabled', false);
            });
        }
        else
        {
            Pricing.update($scope.data.pricing).then(function(response)
            {
                $('#modal-pricings').modal('hide');

                console.log('Pricing updated \n', response.data);
                $scope.getPricings();

                $($event.currentTarget).find('i').remove();
                $($event.currentTarget).prop('disabled', false);
            });
        }
    };


    /*
     *  Delete Pricing
     *  --------------------------------------------
     */

    $scope.delete = function(id)
    {
        var dialog = new jBox('Confirm', {
            'content': 'Voules-vous vraiment supprimer cet Tarif ?',
            confirmButton: 'Oui',
            cancelButton: 'Non',
            confirm: function()
            {
                Pricing.delete(id).then(function(response)
                {
                    console.log(response.data);
                    $scope.getPricings();
                },
                    function (response)
                {
                    console.log(response.data);
                });
            }
        });

        dialog.open();
    };
}