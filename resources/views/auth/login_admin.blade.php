@extends('layouts.admin_auth')

@section('content')

<main class="site-auth" ng-background="{{ asset('img/bg/01.jpg') }}">
	<section class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-10 col-sm-6 col-md-4">

				<div class="panel-login">
					<div class="header">
						<h3>Login</h3>
					</div>
					<div class="body">

						@if(count($errors))
							@foreach($errors->all() as $error)
								<div class="alert alert-danger">
									{{ $error }}
								</div>
							@endforeach
						@endif

						<form id="frmLogin" role="form" method="POST" action="/login">
							{{ csrf_field() }}
							<div class="form-group">
								<input id="text-email" name="email" type="text" class="form-control"
								       placeholder="Email" autocomplete="off" />
							</div>
							<div class="form-group">
								<input id="text-password" name="password" type="password" class="form-control"
								       placeholder="Mot de Passe" autocomplete="off" />
							</div>
							<div class="form-group">
								<label class="form-check-label">
									<input type="checkbox" name="remember" value="1"
									       class="form-check-input" checked>
									Enregistrer Mes Infos
								</label>
							</div>
							<div class="form-group">
								<button id="btn-login" type="submit" class="btn btn-primary btn-lg btn-block">
									Login
								</button>
							</div>
						</form>

					</div>
				</div>

			</div>
		</div>
	</section>
</main>

@endsection
