@extends('admin')

@section('page_title', 'Tableau de bord')

@section('content')

<main id="content" class="site-content">
	<section class="container-fluid">

		<div class="page-location">
			<span>Admin <i class="fa fa-angle-right"></i> Dashboard</span>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-3">

				<div class="widget stat">
					<i></i>
					<span class="number"></span>
					<label class="label">écoles</label>
				</div>

			</div>
			<div class="col-sm-6 col-md-3">

				<div class="widget stat">
					<i></i>
					<span class="number"></span>
					<label class="label">éudiants</label>
				</div>

			</div>
			<div class="col-sm-6 col-md-3">

				<div class="widget stat">
					<img src="" />
					<span class="number"></span>
					<label class="label">Professeurs</label>
				</div>

			</div>
		</div>

	</section>
</main>

@endsection