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
	<link rel="alternate" hreflang="fr" href="{{ url('/') }}">
	<link rel="alternate" hreflang="ar" href="{{ url('/ar') }}">

	@if (App::environment('local'))
	<link href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/jBox.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/jssocials.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/jssocials-theme-flat.css') }}" rel="stylesheet">
	<link href="{{ asset('css/site.css') }}" rel="stylesheet">
	@else
	<link href="{{ elixir('css/vendor.min.css') }}" rel="stylesheet">
	<link href="{{ elixir('css/app.min.css') }}" rel="stylesheet">

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-42964700-6"></script>
	<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-42964700-6');
	</script>

	 {{--facebook open graph --}}
	<meta property="og:title" content="{{ trans('config.title') }}">
	<meta property="og:description" content="{{ trans('config.description') }}">
	<meta property="og:image" content="{{ asset('img/abdogolftours_thumbnail.png') }}">
	<meta property="og:url" content="https://www.abdogolftours.com/">
	<meta property="og:type" content="website">
	<meta property="og:locale" content="en_EN">
	<meta property="og:locale:alternate" content="ar_AR">
	 {{--twitter cards --}}
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="https://www.abdogolftours.com/">
	<meta name="twitter:creator" content="@ChihabJraoui">
	<meta name="twitter:title" content="{{ trans('config.title') }}">
	<meta name="twitter:image:src" content="{{ asset('img/abdogolftours_thumbnail.png') }}">
	<meta name="twitter:description" content="{{ trans('config.description') }}">
	 {{--Schema MicroData (Google+,Google, Yahoo, Bing,) --}}
	<meta itemprop="name" content="{{ trans('home.site_author') }}" />
	<meta itemprop="url" content="https://www.abdogolftours.com/" />
	<meta itemprop="author" content="{{ trans('config.author') }}"/>
	<meta itemprop="image" content="{{ asset('img/abdogolftours_thumbnail.png') }}" />
	<meta itemprop="description" content="{{ trans('config.description') }}" />
	@endif
</head>
<body data-ng-app="App">

{{-- header --}}
<header id="main-header" class="main-header">
	<div class="container">

		{{-- brand --}}
		<a class="brand" href="{{ route('site.home') }}">
			<h1>Institut Binaire</h1>
		</a>

		{{-- toggle menu --}}
		<button type="button" class="btn-toggle-nav" id="btn-nav">
			<i class="material-icons">menu</i>
		</button>

		{{-- navigation --}}
		<nav class="navigation" id="navigation">
			<a href="#section-hero">
				{{ trans('home.menu_home') }}
			</a>
			<a href="#section-about">
				A propos
			</a>
			<a href="#section-contact">
				{{ trans('home.menu_contact') }}
			</a>
		</nav>

		{{-- Navigation overlay --}}
		<div class="nav-overlay"></div>

	</div>
</header>

@yield('content')

{{-- footer --}}
<footer class="site-footer segment -dark" data-ng-background="{{ asset('img/bg/footer.jpeg') }}">
	<div class="top">
		<div class="container">
			<div class="row text-left justify-content-center">
				<div class="mb-5 col-sm-12 col-md-8 col-lg-6 offset-lg-0">

					<h2 class="brand">@lang('config.title')</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam assumenda aut culpa cum ducimus eveniet fugit id impedit, laborum, necessitatibus obcaecati odit quia quo rem similique sunt tempora ut!
					</p>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aut consequatur doloremque doloribus ipsum laborum laudantium maiores modi molestias nobis quisquam reiciendis, rem sapiente similique suscipit, tempora voluptate. Animi, distinctio.
					</p>

				</div>
				<div class="mb-5 col-sm-6 col-md-6 col-lg">

					<h4 class="mb-4">{{ trans('home.footer_contact_info') }}</h4>
					<table>
						<tr>
							<td>
								<i class="fa fa-map-marker"></i> &nbsp;
							</td>
							<td>Marrakech, Maroc</td>
						</tr>
						<tr>
							<td>
								<i class="fa fa-phone"></i> &nbsp;
							</td>
							<td>+212 6 00000000 <br /> +212 6 11111111</td>
						</tr>
						<tr>
							<td>
								<i class="fa fa-envelope"></i> &nbsp;
							</td>
							<td>binaire@gmail.com</td>
						</tr>
					</table>

				</div>
				<div class="mb-5 col-sm-6 col-md-4 col-lg">

					<h4 class="mb-4">{{ trans('home.footer_useful_links') }}</h4>
					<ul class="footer-links">
						<li><a href="<?= route('site.home') ?>">{{ trans('home.menu_home') }}</a></li>
						<li><a href="<?= route('site.contact') ?>">{{ trans('home.menu_contact') }}</a></li>
					</ul>

				</div>
			</div>

			{{-- Social Media Icons --}}
			<div class="social-media-container">
				<ul class="social-media">
					<li>
						<a href="https://www.facebook.com" target="_blank"
						   data-toggle="tooltip" title="facebook">
							<i class="fa fa-facebook"></i>
						</a>
					</li>
					<li>
						<a href="https://www.twitter.com" target="_blank"
						   data-toggle="tooltip" title="twitter">
							<i class="fa fa-twitter"></i>
						</a>
					</li>
					<li>
						<a href="https://plus.google.com/" target="_blank"
						   data-toggle="tooltip" title="google plus">
							<i class="fa fa-google"></i>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/" target="_blank"
						   data-toggle="tooltip" title="instagram">
							<i class="fa fa-instagram"></i>
						</a>
					</li>
				</ul>
			</div>

			{{-- languages --}}
			<div class="text-center">
				<ul class="list-language">
					<li>
						<a href="{{ url('fr') }}">
							<img src="{{ asset('img/flag_fr.png') }}" alt="francais">
							Français
						</a>
					</li>
					<li>
						<a href="{{ url('en') }}">
							<img src="{{ asset('img/flag_morocco.png') }}" alt="arabic">
							عربية
						</a>
					</li>
				</ul>
			</div>

		</div>
	</div>
	<div class="bottom">
		<div class="container-fluid">

			<div class="copyright">{{ trans('config.copyrights') }}</div>

		</div>
	</div>
</footer>

{{-- Preloader --}}
{{--@if(!App::environment('local'))--}}
{{--<div id="loader" class="loader">--}}
	{{--<img src="{{ asset('img/spinner.svg') }}" class="mb-3" />--}}
	{{--<small>{{ trans('home.loading') }}</small>--}}
{{--</div>--}}
{{--@endif--}}

{{-- to top button --}}
<a id="to-top" href="javascript:">
	<i class="material-icons">arrow_upward</i>
</a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

@if (App::environment('local'))
<script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendor/jBox.min.js') }}"></script>
<script src="{{ asset('vendor/magnific-popup.min.js') }}"></script>
<script src="{{ asset('vendor/jssocials.min.js') }}"></script>
<script src="{{ asset('js/site.js') }}"></script>
@else
<script src="{{ elixir('js/app.min.js') }}"></script>
@endif

</body>
</html>
