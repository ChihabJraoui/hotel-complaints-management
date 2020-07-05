@extends('layouts.admin')

@push('angular_script')
<script src="{{ asset('angular/admin/services/Picture.js') }}"></script>
<script src="{{ asset('angular/admin/controllers/Gallery.js') }}"></script>
@endpush

@section('page_title', 'Galérie')

@section('content')

<main class="site-content" ng-controller="GalleryController">
	<div class="container-fluid">

		<div class="page-location">
			<span>Admin > Gallery</span>
		</div>

		{{-- Data table --}}
		<div class="data-table middle">
			<div class="header">
				<ul class="items">
					<li>
						<button type="button" class="btn btn-success btn-sm"
						        ng-click="showModal(null)">
							Ajouter Images
							<i class="material-icons">file_upload</i>
						</button>
					</li>
				</ul>
			</div>
		</div>

		<p>Vous avez <strong class="text-info">{{ $count }}</strong> dans votre galérie.</p>

		<div class="row justify-content-center">
			<div ng-hide="!loading" class="spinner"></div>

			<div class="col-12 col-md-8 col-lg-6" ng-cloak ng-show="pictures.length == 0">
				<div class="alert alert-info">
					<i class="fa fa-info"></i>&nbsp;&nbsp;
					Aucune Photo a été trouver
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-4 col-lg-3"
			     ng-cloak ng-show="!loading" ng-repeat="picture in pictures">

				<div class="wrapper">
					<img ng-src="@{{ picture.filename }}" class="img-fluid">
					<div class="body text-right">
						<button type="button" class="btn btn-crud"
						        data-toggle="tooltip" title="Supprimer"
						        ng-click="delete(picture.id)">
							<i class="material-icons">clear</i>
						</button>
					</div>
				</div>

			</div>
		</div>
	</div>

	{{-- Modal Photo --}}
	<div class="modal fade" id="modal-photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	     aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ajouter Des Photos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form name="frmPicture">
						<div class="form-group">
							<label class="control-label">Photos : </label>
							<input type="file" id="pictures" name="pictures" class="form-control-file"
							       multiple ng-required="true">
						</div>
					</form>
					<p class="text-danger">@{{ errors }}</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary"
					        ng-click="submit($event)" ng-disabled="!formValid">
						Charger
					</button>
				</div>
			</div>
		</div>
	</div>

</main>

@endsection