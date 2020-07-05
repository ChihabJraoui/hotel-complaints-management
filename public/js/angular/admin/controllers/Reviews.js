
angularAdmin.controller('ReviewsController', ['$scope', 'Review', reviewController]);

function reviewController($scope, Review)
{

    $scope.data = {};

    $scope.modal = {};

    $scope.loading = true;


    /* Get Tours */

    $scope.getReviews = function()
    {
        Review.getReviews().then(function(response)
        {
            $scope.reviews = response.data.reviews;
            $scope.reviewsWait = response.data.reviewsWait;
            $scope.loading = false;
        });
    };

    $scope.getReviews();


    /* Show Tours Modal */

    $scope.showModal = function(tour)
    {
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
            $scope.data.tour.title = tour.title;
            $scope.data.tour.type = tour.type;
            $scope.data.tour.description_en = tour.description_en;
            $scope.data.tour.description_fr = tour.description_fr;
            $scope.data.tour.duration = tour.duration;
            $scope.data.tour.depart = tour.depart;
            $scope.data.tour.includes_en = tour.includes_en;
            $scope.data.tour.includes_fr = tour.includes_fr;
            $scope.data.tour.price = tour.price;
        }

        $('#modal-tours').modal('show');
    };


    /* Submit Form*/

    $scope.submit = function($event)
    {
        $($event.srcElement).prepend('<i class="fa fa-spinner fa-spin"></i>&nbsp;');
        $($event.srcElement).prop('disabled', true);

    }

}