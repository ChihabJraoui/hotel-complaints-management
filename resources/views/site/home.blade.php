@extends('site')

@section('page_title', trans('home.page_title') .' - '. trans('config.title'))
@section('page_description', trans('config.description'))

@section('content')

<main class="site-content">

{{-- Hero --}}
<section id="hero-section" class="banner -fh"
         style="background: url('{{ asset('img/banners/hero.png') }}') center bottom">
	<div class="container">
		<div class="row align-items-stretch">
			<div class="d-none d-md-block col-md-6">

				<img src="{{ asset('img/apps/app_hero.png') }}" height="400" width="auto">

			</div>
			<div class="col-12 col-md-6">

				<div class="text-left">
					<h1 class="heading">Heading</h1>
					<h2 class="subheading">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto at atque
						consequuntur cum cumque deleniti dolorem dolores, ea earum eum expedita illo impedit
						incidunt, ipsam iure pariatur quis quo ratione zer
					</h2>
				</div>

			</div>
		</div>
	</div>
</section>

{{-- Features --}}
<section id="segment-features" class="segment -light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid debitis ea est
					harum incidunt laborum libero maxime molestias nam non nulla, numquam ratione sit sunt
					tempore ullam veniam voluptatum?zef
				</p>
			</div>
			<div class="col-md-4">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dicta numquam
					repellendus sint vitae! Culpa, cum dolorem, eos est iure libero maiores porro quaerat
					quas quibusdam sapiente, suscipit veritatis voluptatem.zef
				</p>
			</div>
			<div class="col-md-4">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aut cupiditate,
					delectus deserunt dignissimos dolore expedita fugit harum impedit ipsa iste minus
					placeat praesentium provident quod recusandae repellat tempore voluptates!
				</p>
			</div>
		</div>
	</div>
</section>

{{-- who are we --}}
<section id="who-are-we" class="segment">
	<div class="container">
		<header>
			<h3 class="heading">A propos notre app</h3>
			<img src="{{ asset('img/divider.png') }}">
		</header>

		<div class="row align-items-center">
			<div class="col-md-6">
				<h3>
					Have a look into dream app
				</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aut cupiditate,
					delectus deserunt dignissimos dolore expedita fugit harum impedit ipsa iste minus
					placeat praesentium provident quod recusandae repellat tempore voluptates!
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias at dolores,
					dolorum enim fugiat in ipsam, ipsum iure labore nobis omnis possimus, quae quos
					similique soluta totam vel voluptatibus.
				</p>

				<div class="text-center">
					<button class="btn btn-primary btn-lg">Google Play</button>
					<button class="btn btn-primary btn-lg">App Store</button>
				</div>
			</div>
			<div class="col-md-6">

				<img src="{{ asset('img/apps/app_about_01.png') }}" class="img-fluid">

			</div>
		</div>
	</div>
</section>

{{-- ScreenShots --}}
<section class="segment -light">
	<div class="container">

		<header>
			<h2 class="heading">Captures d'écran</h2>
			<img src="{{ asset('img/divider.png') }}" class="mb-3">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8 col-lg-6">

					<p class="description">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aperiam atque blanditiis
						consequatur consequuntur dicta dolor et facere fugit inventore iusto nulla, numquam omnis
						quasi sint sunt temporibus voluptatibus voluptatum.ezf
					</p>
				</div>
			</div>
		</header>

		<div id="carousel-screenshots" class="owl-carousel">
			<div class="item">
				<img src="{{ asset('img/screens/screen_01.jpg') }}">
			</div>
			<div class="item">
				<img src="{{ asset('img/screens/screen_02.jpg') }}">
			</div>
			<div class="item">
				<img src="{{ asset('img/screens/screen_03.jpg') }}">
			</div>
			<div class="item">
				<img src="{{ asset('img/screens/screen_04.jpg') }}">
			</div>
		</div>

	</div>
</section>

{{-- Download App --}}
<div class="section segment">
	<div class="container">
		<div class="row no-gutters align-items-stretch">
			<div class="col-12 col-md-6"
			     style="background: url('{{ asset('img/apps/app_download.png') }}') cover">
			</div>
			<div class="col-12 col-md-6">

				<h3>Download Our App Today</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid, animi aperiam
					asperiores commodi consectetur cum dicta dolorum, eaque, eveniet expedita facere id
					iusto minima porro quae tempore tenetur voluptatibus!zefqe
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque culpa deleniti
					doloribus dolorum eligendi ex facere fuga saepe voluptatem! Dicta ea error facere illo
					nulla reprehenderit vitae voluptatem voluptates.efeg
				</p>

				<div class="text-center">
					<button class="btn btn-primary btn-lg">Google Play</button>
					<button class="btn btn-primary btn-lg">App Store</button>
				</div>
			</div>
		</div>
	</div>
</div>
</main>

@endsection