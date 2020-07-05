@extends('layouts.admin')

@section('page_title', 'Tours')

@section('content')

<main class="site-content" ng-controller="ToursController">
	<section class="container-fluid">

		<div class="page-location">
			<span>Admin > Tours & Excursions</span>
		</div>

		{{-- Data Table --}}
		<div class="data-table">
			<div class="header">
				<ul class="items">
					<li>
						<button type="button" class="btn btn-success btn-sm"
						        ng-click="showModal(null)">
							Nouveau
							<i class="material-icons">add</i>
						</button>
					</li>
				</ul>
			</div>
			<table class="table text-left">
				<thead class="thead-inverse">
				<tr>
					<th></th>
					<th>Photo</th>
					<th>Nom</th>
					<th>Jours</th>
					<th>Prix</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<tr ng-hide="!loading">
					<td colspan="5" class="text-center">
						<img src="{{ asset('img/spinner.svg') }}" />
					</td>
				</tr>
				<tr ng-cloak ng-show="!loading" ng-repeat="tour in tours">
					<td>
						<span class="badge" ng-class="{'badge-primary': tour.type == 0, 'badge-warning': tour.type == 1}">
							<span ng-if="tour.type == 0">Tour</span>
							<span ng-if="tour.type == 1">Excursion</span>
						</span>
					</td>
					<td>
						<img ng-src="@{{ tour.cover }}" class="img-thumbnail"
						     style="width: 80px; height: 80px">
					</td>
					<td>@{{ tour.title }}</td>
					<td>@{{ tour.duration }}</td>
					<td>@{{ tour.price }} DHs</td>
					<td class="text-right">
						{{-- views --}}
						<button type="button" class="btn btn-crud" data-toggle="tooltip" title="Voir"
						        ng-click="">
							<i class="material-icons">visibility</i>
						</button>
						{{-- edit --}}
						<button type="button" class="btn btn-crud" data-toggle="tooltip" title="Modifier"
						        ng-click="showModal(tour)">
							<i class="material-icons">edit</i>
						</button>
						{{-- delete --}}
						<button type="button" class="btn btn-crud" data-toggle="tooltip" title="Supprimer"
						        ng-click="delete(tour.id)">
							<i class="material-icons">clear</i>
						</button>
					</td>
				</tr>
				</tbody>
			</table>

		</div>

	</section>

	{{-- Modal Tour --}}
	<div id="modal-tours" class="modal fade" tabindex="-1" role="dialog"
	     aria-labelledby="modal-tours-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-tours-label">@{{ modal.title }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form name="frmTour">
						{{-- type --}}
						<div class="form-group">
							<label class="form-check-label form-check-inline">
								<input type="radio" name="type" class="form-check-input"
								       ng-model="data.tour.type" ng-value="0" ng-required="true">
								Tour
							</label>
							<label class="form-check-label form-check-inline">
								<input type="radio" name="type" class="form-check-input"
								       ng-model="data.tour.type" ng-value="1" ng-required="true">
								Excursion
							</label>
						</div>
						{{-- title --}}
						<div class="form-group">
							<label class="control-label">Nom : </label>
							<input type="text" name="title" class="form-control"
							       ng-model="data.tour.title" ng-value=" data.tour.title" ng-required="true">
							<small class="text-danger" ng-cloak
							       ng-show="frmTour.title.$invalid && frmTour.title.$touched">
								Champ obligatoire !
							</small>
						</div>
						{{-- description en--}}
						<div class="form-group">
							<label class="control-label">Description (anglais) : </label>
							<textarea name="desc_en" class="form-control" rows="8"
							       ng-model="data.tour.description_en"
							          ng-required="true">@{{ data.tour.description_en }}</textarea>
							<small class="text-danger" ng-cloak
							       ng-show="frmTour.desc_en.$invalid && frmTour.desc_en.$touched">
								Champ obligatoire !
							</small>
						</div>
						{{-- description fr --}}
						<div class="form-group">
							<label class="control-label">Description (francais) : </label>
							<textarea name="desc_fr" class="form-control" rows="8"
							       ng-model="data.tour.description_fr"
							          ng-required="true">@{{ data.tour.description_fr }}</textarea>
							<small class="text-danger" ng-cloak
							       ng-show="frmTour.desc_fr.$invalid && frmTour.desc_fr.$touched">
								Champ obligatoire !
							</small>
						</div>
						{{-- duration --}}
						<div class="form-group">
							<label class="control-label">Durée : </label>
							<div class="input-group">
								<input type="number" name="duration" class="form-control"
								          ng-model="data.tour.duration" ng-value="data.tour.duration"
								          ng-required="true" />
								<span class="input-group-addon">Jours</span>
							</div>
							<small class="text-danger" ng-cloak
							       ng-show="frmTour.duration.$invalid && frmTour.duration.$touched">
								Champ obligatoire !
							</small>
						</div>
						{{-- start --}}
						<div class="form-group">
							<label class="control-label">Depart : </label>
							<div class="text-center">
								<input type="text" name="depart"
								       ng-time-picker ng-model="data.tour.depart" ng-required="true" />
							</div>
							<small class="text-danger" ng-cloak
							       ng-show="frmTour.depart.$invalid && frmTour.depart.$touched">
								Champ obligatoire !
							</small>
						</div>
						{{-- price --}}
						<div class="form-group">
							<label class="control-label">Prix : </label>
							<div class="input-group">
								<input type="number" name="price" class="form-control"
								          ng-model="data.tour.price" ng-value="data.tour.price"
								          ng-required="true" />
								<span class="input-group-addon">DHs</span>
							</div>
							<small class="text-danger" ng-cloak
							       ng-show="frmTour.price.$invalid && frmTour.price.$touched">
								Champ obligatoire !
							</small>
						</div>
						{{-- cover --}}
						<div class="form-group">
							<label class="control-label">Couverture : </label>
							<input type="file" id="cover-file" name="cover" class="form-control-file">
						</div>
						{{-- air conditioned --}}
						<div class="form-group">
							<label class="form-check-label">
								<input type="checkbox" name="is_air_conditioned" class="form-check-input"
								       ng-model="data.tour.is_air_conditioned"
								       ng-true-value="1" ng-false-value="0">
								Minibus Climatisé
							</label>
						</div>
						{{-- mule --}}
						<div class="form-group">
							<label class="form-check-label">
								<input type="checkbox" name="is_mule" class="form-check-input"
								       ng-model="data.tour.is_mule"
								       ng-true-value="1" ng-false-value="0">
								Mule
							</label>
						</div>
						{{-- Meals --}}
						<div class="form-group">
							<label class="form-check-label">
								<input type="checkbox" name="is_meals" class="form-check-input"
								       ng-model="data.tour.is_meals"
								       ng-true-value="1" ng-false-value="0">
								Repas
							</label>
						</div>
						{{-- Guide --}}
						<div class="form-group">
							<label class="form-check-label">
								<input type="checkbox" name="is_guide" class="form-check-input"
								       ng-model="data.tour.is_guide"
								       ng-true-value="1" ng-false-value="0">
								Guide
							</label>
						</div>
						{{-- Driver --}}
						<div class="form-group">
							<label class="form-check-label">
								<input type="checkbox" name="is_driver" class="form-check-input"
								       ng-model="data.tour.is_driver"
								       ng-true-value="1" ng-false-value="0">
								Chauffeur Professionnel
							</label>
						</div>
					</form>

				</div>
				<div class="modal-footer text-center">
					<button type="button" class="btn btn-success"
					        ng-disabled="frmTour.$invalid" ng-click="submit($event)">
						Enregistrer
					</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Fermer
					</button>
				</div>
			</div>
		</div>
	</div>

</main>

@endsection
