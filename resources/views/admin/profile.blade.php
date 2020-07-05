@extends('layouts.admin')

@section('page_title', 'Profile')

@section('content')

<main class="site-content" ng-controller="ProfileController">
	<div class="container-fluid">

		<div class="page-location">
			<span>Admin > Profile</span>
		</div>

		<div class="row justify-content-center">
			<div class="col-md-10 col-lg-8">

				{{-- update profile info --}}
				<div class="card mb-4">
					<div class="card-body">

						<form name="frmProfile">
							<div class="form-group row">
								<div class="col-12 col-md-6">
									<label for="text-lastname">Nom: </label>
									<input type="text" id="text-lastname" name="lastname" class="form-control"
									       ng-model="data.lastname" ng-value="data.lastname">
								</div>
								<div class="col-12 col-md-6">
									<label for="text-firstname">Prénom: </label>
									<input type="text" id="text-firstname" name="firstname"  class="form-control"
									       ng-model="data.firstname" ng-value="data.firstname">
								</div>
							</div>
							<div class="form-group">
								<label>Photo: </label>
								<div class="row align-items-center">
									<div class="col-sm-6 text-center">
										<img ng-src="" class="img-circle"
										     width="100" height="100">
									</div>
									<div class="col-sm-6">
										<p>Changer la photo:</p>
										<input type="file" name="avatar" class="form-control" />
									</div>
								</div>
							</div>
						</form>

					</div>
					<div class="card-footer">
						<button type="button" class="btn btn-success">Enregistrer</button>
					</div>
				</div>

				<!-- update password -->
				<div class="card">
					<div class="card-header">
						Changer le mot de passe
					</div>
					<div class="card-body">
						<form>
							<div class="form-group {{ $errors->has('pass') ? 'has-error':'' }}">
								<label>Mot de Passe actuel: </label>
								<input type="password" name="pass" class="form-control" />
							</div>
							<div class="form-group">
								<label>Nouveau Mot de Passe: </label>
								<input type="password" name="new_pass" class="form-control" />
							</div>
							<div class="form-group">
								<label>Confirmer Nouveau Mot de Passe: </label>
								<input type="password" name="confirm_new_pass" class="form-control" />
							</div>
						</form>
					</div>
					<div class="card-footer">
						<button type="button" class="btn btn-success">
							Enregistrer</button>
					</div>
				</div>

			</div>
		</div>

	</div>
</main>

@endsection