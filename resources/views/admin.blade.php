<!DOCTYPE html>
<html lang="fr">
<head>
	<title>AbdoGolfTours - @yield('page_title')</title>
	<meta charset="utf-8">
	<meta name="author" content="{{ trans('config.author') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="robots" content="noindex,nofollow">

	<link rel="stylesheet"
	      href="https://fonts.googleapis.com/css?family=Allura|Oxygen|Raleway:200,400|Material+Icons">

	<link rel="stylesheet"
	      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
	      integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
	      crossorigin="anonymous">

	@if (App::environment('local'))
	<link href="{{ asset('vendor/jBox.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/jquery.datetimepicker.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
	@else
	<link rel="stylesheet" href="{{ elixir('dist/admin.min.css') }}">
	@endif

</head>
<body class="{{ Auth::guest() ? 'guest' : '' }}" ng-app="Admin">

	@auth
	{{-- header --}}
	<header id="header" class="site-header">

		{{-- Sidebar Toggle Button --}}
		<button id="btn-toggle-sidebar" class="btn-toggle" type="button">
			<i class="material-icons">menu</i>
		</button>

		<div class="page-title">
			<h2>@yield('page_title')</h2>
		</div>

		{{-- header options --}}
		<ul class="items">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="{{ asset('img/default.png') }}" alt="" class="user-avatar d-none d-sm-inline">
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a>
					<a class="dropdown-item" href="javascript:" onclick="frmLogout.submit()">Déconnecter</a>
					<form name="frmLogout" action="/logout" method="post">
						{{ csrf_field() }}
					</form>
				</div>
			</li>
		</ul>
	</header>

	{{-- sidebar --}}
	<nav class="site-sidebar">

		{{-- brand --}}
		<div class="brand">
			<a href="{{ route('admin.dash') }}">Binaire</a>
		</div>

		{{-- Sidebar Menu --}}
		<ul class="sidebar-menu">
			<li class="title">Menu</li>
			<li class="{{ Route::currentRouteName() != 'admin.dash' ? '' : 'active' }}">
				<a href="{{ route('admin.dash') }}">
					<i class="fa fa-fw fa-dashboard"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="{{ Route::currentRouteName() != 'admin.config' ? '' : 'active' }}">
				<a href="{{ route('admin.config') }}">
					<i class="fa fa-fw fa-cog"></i>
					<span>Configuration</span>
				</a>
			</li>
		</ul>
	</nav>

	<div class="site-sidebar-overlay"></div>
	@endauth

	{{-- Content --}}
	@yield('content')

	{{-- main footer --}}
	<footer id="footer" class="footer">
		<div class="container-fluid">

			{{-- copyright --}}
			<div class="copyright">
				{{ trans('config.copyrights') }}
			</div>

		</div>
	</footer>

	<script src="https://use.fontawesome.com/536180df90.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
	        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
	        crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
	        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
	        crossorigin="anonymous"></script>

	@if (App::environment('local'))
	<script src="{{ asset('vendor/jBox.min.js') }}"></script>
	<script src="{{ asset('vendor/jquery.datetimepicker.js') }}"></script>
	<script src="{{ asset('vendor/Chart.js') }}"></script>
	<script src="{{ asset('js/admin.js') }}"></script>

	<script src="{{ asset('js/angular/admin/services/Tour.js') }}"></script>
	<script src="{{ asset('js/angular/admin/services/User.js') }}"></script>
	<script src="{{ asset('js/angular/admin/services/Pricing.js') }}"></script>
	<script src="{{ asset('js/angular/admin/controllers/Profile.js') }}"></script>
	<script src="{{ asset('js/angular/admin/controllers/Pricings.js') }}"></script>
	<script src="{{ asset('js/angular/admin/controllers/Tours.js') }}"></script>
	<script src="{{ asset('js/angular/admin/controllers/Config.js') }}"></script>
	@stack('angular_script')

	@else
	<script src="{{ elixir('dist/admin.min.js') }}"></script>
	@endif
</body>
</html>
