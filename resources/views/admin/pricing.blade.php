@extends('layouts.admin')

@section('page_title', 'Tarifs')

@section('content')

<main class="site-content" ng-controller="PricingsController">
	<section class="container-fluid">

		<div class="page-location">
			<span>Admin > Tarifs</span>
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
					<th>De</th>
					<th>A</th>
					<th>Prix</th>
					<th>Avec Guide</th>
					<th>Avec Diner</th>
					<th>1/2 Jour</th>
					<th>Aller & Retour</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<tr ng-hide="!loading">
					<td colspan="6" class="text-center">
						<img src="{{ asset('img/spinner.svg') }}" />
					</td>
				</tr>
				<tr ng-cloak ng-show="!loading" ng-repeat="pricing in pricings">
					<td>@{{ pricing.from }}</td>
					<td>@{{ pricing.to }}</td>
					<td>@{{ pricing.price }} DHs</td>
					<td>
						<i ng-if="pricing.is_with_guide == 1" class="fa fa-check text-success"></i>
						<i ng-if="pricing.is_with_guide == 0" class="fa fa-times text-danger"></i>
					</td>
					<td>
						<i ng-if="pricing.is_with_dinner == 1" class="fa fa-check text-success"></i>
						<i ng-if="pricing.is_with_dinner == 0" class="fa fa-times text-danger"></i>
					</td>
					<td>
						<i ng-if="pricing.is_half_day == 1" class="fa fa-check text-success"></i>
						<i ng-if="pricing.is_half_day == 0" class="fa fa-times text-danger"></i>
					</td>
					<td>
						<i ng-if="pricing.is_round_trip == 1" class="fa fa-check text-success"></i>
						<i ng-if="pricing.is_round_trip == 0" class="fa fa-times text-danger"></i>
					</td>
					<td class="text-right">
						{{-- edit --}}
						<button type="button" class="btn btn-crud" data-toggle="tooltip" title="Modifier"
						        ng-click="showModal(pricing)">
							<i class="material-icons">edit</i>
						</button>
						{{-- delete --}}
						<button type="button" class="btn btn-crud" data-toggle="tooltip" title="Supprimer"
						        ng-click="delete(pricing.id)">
							<i class="material-icons">clear</i>
						</button>
					</td>
				</tr>
				<tr ng-cloak ng-if="pricings.length == 0">
					<td colspan="6" class="text-center">
						Aucun Tarif a été trouver !
					</td>
				</tr>
				</tbody>
			</table>

		</div>

	</section>

	{{-- Bootstrap Modal --}}
	<div id="modal-pricings" class="modal fade" tabindex="-1" role="dialog"
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

					<form name="frmPricing">

						{{-- From --}}
						<div class="form-group">
							<label class="control-label">De : </label>
							<input type="text" name="from" class="form-control"
							       ng-model="data.pricing.from" ng-value=" data.pricing.from"
							       ng-required="true">
							<small class="text-danger" ng-cloak
							       ng-show="frmPricing.from.$invalid && frmPricing.from.$touched">
								Champ obligatoire !
							</small>
						</div>

						{{-- to --}}
						<div class="form-group">
							<label class="control-label">à : </label>
							<input type="text" name="to" class="form-control"
							       ng-model="data.pricing.to" ng-value=" data.pricing.to"
							       ng-required="true">
							<small class="text-danger" ng-cloak
							       ng-show="frmPricing.to.$invalid && frmPricing.to.$touched">
								Champ obligatoire !
							</small>
						</div>


						{{-- description --}}
						<div class="form-group">
							<label class="control-label">Description : </label>
							<textarea name="description" class="form-control" rows="8"
							          ng-model="data.pricing.description"
							          ng-required="true">@{{ data.pricing.description }}</textarea>
							<small class="text-danger" ng-cloak
							       ng-show="frmTour.description.$invalid && frmTour.description.$touched">
								Champ obligatoire !
							</small>
						</div>
						{{-- price --}}
						<div class="form-group">
							<label class="control-label">Prix : </label>
							<div class="input-group">
								<input type="number" name="price" class="form-control"
								          ng-model="data.pricing.price" ng-value="data.pricing.price"
								          ng-required="true" />
								<span class="input-group-addon">DHs</span>
							</div>
							<small class="text-danger" ng-cloak
							       ng-show="frmPricing.price.$invalid && frmPricing.price.$touched">
								Champ obligatoire !
							</small>
						</div>

						{{-- With Guide --}}
						<div class="form-group">
							<label class="form-check-label">
								<input type="checkbox" name="is_with_guide" class="form-check-input"
								       ng-model="data.pricing.is_with_guide" ng-true-value="1"
								       ng-false-value="0">
								Avec Guide
							</label>
						</div>

						{{-- With Dinner --}}
						<div class="form-group">
							<label class="form-check-label">
								<input type="checkbox" name="is_with_guide" class="form-check-input"
								       ng-model="data.pricing.is_with_dinner" ng-true-value="1"
								       ng-false-value="0">
								Dîner
							</label>
						</div>

						{{-- Half Day--}}
						<div class="form-group">
							<label class="form-check-label">
								<input type="checkbox" name="is_with_guide" class="form-check-input"
								       ng-model="data.pricing.is_half_day" ng-true-value="1"
								       ng-false-value="0">
								1/2 jour
							</label>
						</div>

						{{-- Round trip --}}
						<div class="form-group">
							<label class="form-check-label">
								<input type="checkbox" name="is_round_trip" class="form-check-input"
								       ng-model="data.pricing.is_round_trip" ng-true-value="1"
								       ng-false-value="0">
								Aller & Retour
							</label>
						</div>
					</form>

				</div>
				<div class="modal-footer text-center">
					<button type="button" class="btn btn-success"
					        ng-disabled="frmPricing.$invalid" ng-click="submit($event)">
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
