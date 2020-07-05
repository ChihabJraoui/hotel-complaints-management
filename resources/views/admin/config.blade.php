@extends('layouts.admin')

@section('page_title', 'Configuration du site')

@section('content')

<main class="site-content" ng-controller="ConfigController">
	<div class="container-fluid">

		<div class="page-location">
			<span>Admin > Configuration</span>
		</div>

		<div class="row justify-content-center">
			<div class="col-md-8 col-lg-6">

				{{-- update profile info --}}
				<div class="card mb-4">
					<div class="card-body">

						<form name="frmProfile">

							{{-- Email --}}
							<div class="form-group">
								<label for="text-email">Adresse Email: *</label>
								<input type="email" id="text-email" name="email"  class="form-control"
								       ng-model="data.email" ng-value="data.email">
							</div>

							{{-- phone 1 --}}
							<div class="form-group">
								<label for="text-tel1">N° Telephone 1: *</label>
								<input type="tel" id="text-tel1" name="phone1"  class="form-control"
								       ng-model="data.phone1" ng-value="data.phone1">
							</div>

							{{-- phone 2 --}}
							<div class="form-group">
								<label for="text-tel2">N° Telephone 2: </label>
								<input type="tel" id="text-tel2" name="phone2"  class="form-control"
								       ng-model="data.phone2" ng-value="data.phone2">
							</div>

							{{-- phone 3 --}}
							<div class="form-group">
								<label for="text-tel3">N° Telephone 3: </label>
								<input type="tel" id="text-tel3" name="phone3"  class="form-control"
								       ng-model="data.phone3" ng-value="data.phone3">
							</div>
						</form>

						<p class="text-danger">(*) : champs obligatoires</p>

					</div>
					<div class="card-footer">
						<button type="button" class="btn btn-success">Enregistrer</button>
					</div>
				</div>

			</div>
		</div>

	</div>
</main>

@endsection