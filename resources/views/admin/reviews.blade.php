@extends('layouts.admin')


@push('angular_script')
<script src="{{ asset('angular/admin/services/Review.js') }}"></script>
<script src="{{ asset('angular/admin/controllers/Reviews.js') }}"></script>
@endpush


@section('page_title')
<i class="fa fa-commenting"></i> Commentaires
@endsection


@section('content')

<main class="site-content" ng-controller="ReviewsController">
	<section class="container-fluid">


		{{-- Reviews need approval --}}
		<div class="data-table">
			<div class="header">
				<h4>Commentaire En Attente (): </h4>
			</div>
			<table class="table text-left">
				<thead class="thead-inverse">
				<tr>
					<th>Tour</th>
					<th>Evaluateur</th>
					<th>Commentaire</th>
					<th>Evaluation</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				{{-- Spinner --}}
				<tr ng-hide="!loading">
					<td colspan="5" class="text-center">
						<img src="{{ asset('img/spinner.svg') }}" />
					</td>
				</tr>
				{{-- No Data --}}
				<tr data-ng-cloak data-ng-show="reviewsWait.length == 0">
					<td colspan="5">
						<div class="alert alert-info">
							<i class="fa fa-info"></i>&nbsp;&nbsp;
							Aucun Commentaire En Attent.
						</div>
					</td>
				</tr>
				{{-- Data --}}
				<tr class="ng-cloak" data-ng-show="!loading" data-ng-repeat="reviewW in reviewsWait">
					<td>@{{ reviewW.tour.title }}</td>
					<td>@{{ reviewW.user.firstname + ' ' + reviewW.user.lastname }}</td>
					<td>@{{ reviewW.comment }}</td>
					<td>@{{ reviewW.rating }}</td>
					<td class="text-right">
						{{-- approve --}}
						<button type="button" class="btn btn-crud">
							<i class="material-icons">check</i>
						</button>
						{{-- delete --}}
						<button type="button" class="btn btn-crud">
							<i class="material-icons">clear</i>
						</button>
					</td>
				</tr>
				</tbody>
			</table>
		</div>


		{{-- Approved Reviews --}}


		<div class="data-table">
			<div class="header">
				<h4>Commentaire Acceptés:</h4>
			</div>
			<table class="table text-left">
				<thead class="thead-inverse">
				<tr>
					<th>Tour</th>
					<th>Evaluateur</th>
					<th>Commentaire</th>
					<th>Evaluation</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				{{-- Loading --}}
				<tr data-ng-hide="!loading">
					<td colspan="5" class="text-center">
						<img src="{{ asset('img/spinner.svg') }}" />
					</td>
				</tr>
				{{-- No Data --}}
				<tr ng-cloak ng-show="reviews.length == 0">
					<td colspan="5" class="text-center">
						Aucun commentaire a été trouvé
					</td>
				</tr>
				{{-- Data --}}
				<tr data-ng-cloak data-ng-show="!loading" data-ng-repeat="review in reviews">
					<td>@{{ review.tour.title }}</td>
					<td>@{{ review.user.firstname + ' ' + review.user.lastname }}</td>
					<td>@{{ review.comment }}</td>
					<td>@{{ review.rating }}</td>
					<td>
						<button type="button" class="btn btn-crud" data-toggle="tooltip" title="Supprimer">
							<i class="material-icons">clear</i>
						</button>
					</td>
				</tr>
				</tbody>
			</table>
		</div>

	</section>
</main>

@endsection
