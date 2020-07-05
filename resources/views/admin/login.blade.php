<!DOCTYPE html>
<html lang="fr">
<head>
	<title>{{ trans('home.site_title') }}</title>

	<meta charset="utf-8">
	<meta name="description" content="AbdoGolfTours | Login">
	<meta name="author" content="Chihab Jraoui">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="canonical" href="https://abdogolftours.com/" />
	<!--<link rel="shortcut icon" href="favicon.ico" />-->

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Allura|Poiret+One|Raleway:200,400,700"
	      rel="stylesheet" type="text/css" />

	<link href="{{ asset('dist/vendor.min.css') }}" rel="stylesheet" />
	@if (App::environment('local'))
	<link href="{{ asset('css/login.css') }}" rel="stylesheet" />
	@else
	<link href="{{ asset('dist/login.min.css') }}" rel="stylesheet" />
	@endif
</head>
<body>

	<section class="banner banner-overlay-dark banner-fh"
	         data-background="{{ asset('img/bg/01.jpg') }}">

		<div class="panel-login">
			<div class="panel-login--heading">
				<h3>Login</h3>
			</div>
			<div class="panel-login--body">

				<!-- Error Message -->
				@if (Session::has('error'))
				<div class="alert alert-danger">
					<button class="close" data-dismiss="alert">&times;</button>
					{{ Session::get('error') }}
				</div>
				@endif

				<!-- Login Form -->
				<form role="form" method="POST" action="{{ route('login') }}">
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
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember" value="1"
							       checked="checked" />
								Enregistrer Mes Infos
							</label>
						</div>
					</div>
					<div class="form-group">
						<button id="btn-login" type="submit" class="btn btn-primary btn-lg btn-block">
							Login
						</button>
					</div>
				</form>

			</div>
		</div>

	</section>

	<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="{{ asset('dist/vendor.min.js') }}"></script>
	@if (App::environment('local'))
	<script src="{{ asset('js/admin.js') }}"></script>
	@else
	<script src="{{ asset('dist/admin.min.js') }}"></script>
	@endif
</body>
</html>