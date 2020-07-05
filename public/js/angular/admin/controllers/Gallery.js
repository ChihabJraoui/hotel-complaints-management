
angularAdmin.controller('GalleryController', ['$scope', 'Picture', galleryController]);

function galleryController($scope, Picture)
{

    $scope.data = {};

    $scope.errors = '';
    $scope.formValid = false;
    $scope.loading = true;


    /*
     *  Initialize Data
     *  -----------------------------------------------
     */

    $scope.init = function()
    {
        $scope.data = {
            pictures: []
        };

        $('#pictures').val('');
    };

    $scope.init();


    /*
     *  Get Pictures
     *  ------------------------------------------------
     */

    $scope.getPictures = function()
    {
        $scope.loading = true;

        Picture.get().then(function(response)
        {
            $scope.loading = false;
            $scope.pictures = response.data;
        });
    };

    $scope.getPictures();


    /*
     *  Show Bootstrap Modal
     *  -------------------------------------------------
     */

    $scope.showModal = function()
    {
        $scope.init();

        $scope.frmPicture.$setPristine();
        $scope.frmPicture.$setUntouched();

        $('#modal-photo').modal('show');
    };


    /*
     *  Read Image Before Submit it.
     *  -------------------------------------------------
     */

    $('#pictures').on('change', function()
    {
        $scope.errors = '';
        var files = $(this)[0].files;

        if(!files)
        {
            console.log('File upload is not supported by your browser.');
        }

        if(files && files[0])
        {
            for(var i = 0; i < files.length; i++)
            {
                var file = files[i];

                if((/\.(png|jpg|jpeg)$/i).test(file.name))
                {
                    if(file.size <= image_size_limit)    // file size less than 4Mb
                    {
                        $scope.data.pictures.push(file);
                        $scope.formValid = true;
                        $scope.$apply();

                        $('<p />', {
                            'class': 'text-success',
                            'html': '<i class="fa fa-check"></i> ' + file.name + ' - '
                            + Math.round(file.size/1024) + ' Kb <br>'
                        }).appendTo('form[name="frmPicture"]');
                    }
                    else
                    {
                        $('<p />', {
                            'class': 'text-danger',
                            'html': '<i class="fa fa-times"></i> ' + file.name + ' - '
                                        + Math.round(file.size/1024) + ' Kb <br>'
                                        + 'Taille Maximum: 2Mo.'
                        }).appendTo('form[name="frmPicture"]');
                    }
                }
                else
                {
                    $('<p />', {
                        'class': 'text-danger',
                        'html': '<i class="fa fa-times"></i> ' + file.name + ' - '
                        + Math.round(file.size/1024) + ' Kb <br>'
                        + 'Veuillez choisir un fichier de type Image (png, jpg, jpeg).'
                    }).appendTo('form[name="frmPicture"]');
                }
            }
        }
    });


    /*
     *  Submit Pictures
     *  ------------------------------------------
     */

    $scope.submit = function($event)
    {
        disableButton($event.currentTarget);

        Picture.store($scope.data).then(function(response)
        {
            if(response.data.error == 0)
            {
                $scope.getPictures();

                $('#modal-photo').modal('hide');

                enableButton($event.currentTarget);
            }
        });
    };


    /*
     *  Delete Picture ( Show Confirmation )
     *  ------------------------------------------------------
     */

    $scope.delete = function(id)
    {
        var dialog = new jBox('Confirm', {
            'content': 'Voules-vous vraiment supprimer cette Photo ?',
            confirmButton: 'Oui',
            cancelButton: 'Non',
            confirm: function()
            {
                Picture.delete(id).then(function(response)
                {
                    $scope.getPictures();
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