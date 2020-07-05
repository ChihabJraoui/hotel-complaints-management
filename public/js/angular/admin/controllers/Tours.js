
angularAdmin.controller('ToursController', ['$scope', 'Tour', toursController]);

function toursController($scope, Tour)
{

    $scope.data = {};

    $scope.modal = {};

    $scope.loading = true;


    /* Init Data */

    $scope._init = function()
    {
        $scope.data.tour = {
            type: 0,
            duration: 0,
            price: 0,
            is_air_conditioned: 0,
            is_mule: 0,
            is_meals: 0,
            is_guide: 0,
            is_driver: 0
        };
    };

    $scope._init();


    /* Get Tours */

    $scope.getTours = function()
    {
        $scope.loading = true;

        Tour.getTours().then(function(response)
        {
            $scope.tours = response.data;
            $scope.loading = false;
        });
    };

    $scope.getTours();


    /* Show Tours Modal */

    $scope.showModal = function(tour)
    {
        $scope.data.tour = {};
        $scope._init();

        $scope.frmTour.$setPristine();
        $scope.frmTour.$setUntouched();

        if(tour == null)
        {
            $scope.modal.title = 'Nouveau Tour';
            $scope.modal.type = 'new';
        }
        else
        {
            $scope.modal.title = 'Modifier : ' + tour.title;
            $scope.modal.type = 'edit';

            $scope.data.tour.id = tour.id;
            $scope.data.tour.type = tour.type;
            $scope.data.tour.title = tour.title;
            $scope.data.tour.description_en = tour.description_en;
            $scope.data.tour.description_fr = tour.description_fr;
            $scope.data.tour.duration = tour.duration;
            $scope.data.tour.depart = tour.depart;
            $scope.data.tour.price = tour.price;
            $scope.data.tour.is_air_conditioned = tour.is_air_conditioned;
            $scope.data.tour.is_mule = tour.is_mule;
            $scope.data.tour.is_meals = tour.is_meals;
            $scope.data.tour.is_guide = tour.is_guide;
            $scope.data.tour.is_driver = tour.is_driver;
        }

        $('#modal-tours').modal('show');
    };


    /* Submit Form*/

    $scope.submit = function($event)
    {
        $($event.currentTarget).prepend('<i class="fa fa-spinner fa-spin"></i>');
        $($event.currentTarget).prop('disabled', true);

        $scope.data.tour.cover = $('#cover-file')[0].files[0];

        if($scope.modal.type == 'new')
        {
            Tour.store($scope.data.tour).then(function(response)
            {
                $('#modal-tours').modal('hide');

                console.log(response.data);
                $scope.getTours();

                $($event.currentTarget).find('i').remove();
                $($event.currentTarget).prop('disabled', false);
            });
        }
        else
        {
            Tour.update($scope.data.tour).then(function(response)
            {
                $('#modal-tours').modal('hide');

                console.log(response.data);
                $scope.getTours();

                $($event.currentTarget).find('i').remove();
                $($event.currentTarget).prop('disabled', false);
            });
        }
    };

    /* Delete */

    $scope.delete = function(id)
    {
        var dialog = new jBox('Confirm', {
            'content': 'Voules-vous vraiment supprimer cet Tour ?',
            'confirmButton': 'Oui',
            'cancelButton': 'Non',
            confirm: function()
            {
                Tour.delete(id).then(function(response)
                {
                    console.log(response.data);
                    $scope.getTours();
                });
            }
        });

        dialog.open();
    };

}