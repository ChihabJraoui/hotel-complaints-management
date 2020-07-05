@extends('app')

@section('page_title', 'L\'école')

@section('content')

<main class="site-content">
	<div class="breadcrumb">
		<span>Admin <i class="fa fa-angle-right"></i> l'école</span>
	</div>
	<div class="page-header">
		<a href="" class="btn-back">
			<i class="material-icons">arrow_back</i>
		</a>
		<h2 class="title">L'école</h2>
		<ul class="actions">
			<li>
				<a href="{{ route('app.school.edit') }}" class="btn btn-primary">
					<i class="fa fa-edit"></i>
					<span>Modifier</span>
				</a>
			</li>
		</ul>
	</div>

	<section class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12 col-md-10">

				{{-- School --}}
				<div class="wrapper -info">
					<div class="header">
						<h5 class="heading">L'institut</h5>
					</div>
					<div class="body">

						<div class="row">
							<div class="col-12">

								<p>Nom d'institut: <strong>{{ $school->name }}</strong></p>
								<p>L'adresse: <strong>{{ $school->address }}</strong></p>

							</div>
							<div class="col-12"></div>
						</div>

					</div>
				</div>

				{{-- presentation --}}
				<div class="wrapper">
					<div class="header">
						<h5 class="heading">Présentation</h5>
					</div>
					<div class="body">

						@if(empty($school->presentation))
						<div class="text-center">
							<a href="{{ route('app.school.edit') }}">
								Ajouter une présentation
							</a>
						</div>
						@else
						<p>{{ $school->presetation }}</p>
						@endif

					</div>
				</div>

				<div class="wrapper">
					<div class="header">
						<h5 class="heading">Mot du directeur</h5>
					</div>
					<div class="body">

						@if(empty($school->principale_word))
							<div class="text-center">
								<a href="{{ route('app.school.edit') }}">
									Ajouter un mot
								</a>
							</div>
						@else
							<p>{{ $school->principale_word }}</p>
						@endif
					</div>
				</div>

				<div class="wrapper">
					<div class="header">
						<h5 class="heading">Informations Générales</h5>
					</div>
					<div class="body">

						@if(empty($school->general_info))
							<div class="text-center">
								<a href="{{ route('app.school.edit') }}">
									Ajouter des infos générales
								</a>
							</div>
						@else
							<p>{{ $school->general_info }}</p>
						@endif
					</div>
				</div>

			</div>
		</div>
	</section>
</main>

@endsection