<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	<title>@yield('page_title')</title>
	<meta charset="utf-8">
	<meta name="description" content="@yield('page_description')">
	<meta name="author" content="{{ trans('config.author') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="alternate" hreflang="en" href="https://www.abdogolftours.com">
	<link rel="alternate" hreflang="fr" href="https://www.abdogolftours.com/fr">

	@if (App::environment('local'))
	<link href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/jBox.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/jssocials.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/jssocials-theme-flat.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@else
	<link href="{{ elixir('css/vendor.min.css') }}" rel="stylesheet">
	<link href="{{ elixir('css/app.min.css') }}" rel="stylesheet">
	@endif
</head>
<body ng-app="App">

@php $currentRoute = Route::currentRouteName(); @endphp

{{-- header --}}
@auth
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
		<li>
			<a href="#">
				<i class="material-icons">chat_bubble_outline</i>
			</a>
		</li>
		<li>
			<a href="#"><i class="material-icons">notifications_none</i></a>
		</li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<img src="{{ asset('img/default.png') }}" alt="" class="user-avatar d-none d-sm-inline">
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="#">Profile</a>
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
		<a href="{{ route('app.dash') }}">Complaints</a>
	</div>

	{{-- Sidebar Menu --}}
	<ul class="sidebar-menu">
		<li class="title">Menu</li>

		<li class="{{ $currentRoute != 'app.dash' ? '' : 'active' }}">
			<a href="{{ route('app.dash') }}">
				<i class=material-icons>dashboard</i>
				<span>Tableau de bord</span>
			</a>
		</li>
		<li class="{{ $currentRoute != 'app.dash' ? '' : 'active' }}">
			<a href="{{ route('app.dash') }}">
				<i class=material-icons>dashboard</i>
				<span>Tableau de bord</span>
			</a>
		</li>

		<li class="title">Compte</li>
		<li>
			<a href="#">
				<i class="material-icons">settings</i>
				<span>Paramétres</span>
			</a>
		</li>
	</ul>
</nav>

<div class="site-sidebar-overlay"></div>
@endauth

{{-- Content --}}
@yield('content')

{{-- main footer --}}
@auth
<footer id="footer" class="site-footer">
	<div class="container-fluid">

		{{-- copyright --}}
		<div class="copyright">
			{{ trans('config.copyrights') }}
		</div>

	</div>
</footer>
@endauth

<script src="https://use.fontawesome.com/536180df90.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

@if (App::environment('local'))
	<script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendor/jBox.min.js') }}"></script>
	<script src="{{ asset('vendor/jquery.datetimepicker.js') }}"></script>
	<script src="{{ asset('vendor/Chart.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>

	<script src="{{ asset('js/angular/app/services/School.js') }}"></script>

	<script src="{{ asset('js/angular/app/controllers/School.js') }}"></script>
	@stack('angular_script')
@else
	{{--<script src="{{ elixir('dist/admin.min.js') }}"></script>--}}
@endif
</body>
</html>
