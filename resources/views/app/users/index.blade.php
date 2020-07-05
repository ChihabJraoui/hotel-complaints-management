@extends('app')

@section('page_title', 'Employées')

@section('content')

<main class="site-content">
	<div class="breadcrumb">
		<span>Admin <i class="fa fa-angle-right"></i> Employées</span>
	</div>
	<div class="page-header">
		<a href="{{ URL::previous() }}" class="btn-back">
			<i class="material-icons">arrow_back</i>
		</a>
		<h2 class="title">Employées</h2>
		<ul class="actions">
			<li>
				<a href="{{ route('app.users.create') }}" class="btn btn-success">
					Ajouter
				</a>
			</li>
		</ul>
	</div>

	<section class="container-fluid">

		@if(session('message'))
		<div class="d-flex justify-content-center">
			<div class="alert alert-success">
				{{ session('message') }}
			</div>
		</div>
		@endif

		<div class="row justify-content-center">
			<div class="col-12 col-md-10">

				<div class="wrapper">
					<div class="body">

						<table class="table">
							<thead class="thead-light">
							<tr>
								<th></th>
								<th>Nom & prénom</th>
								<th>Role</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							@forelse($users as $user)
							<tr>
								<td>
									<img src="{{ asset('img/default.png') }}" width="40"
									     class="rounded-circle">
								</td>
								<td>{{ $user->fullname }}</td>
								<td>{{ $user->role->role }}</td>
								<td class="text-right">
									<a href="#" class="btn btn-info">
										Modifier
									</a>
									<a href="#" class="btn btn-danger">
										Supprimer
									</a>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="3" class="text-center bg-light">
									Aucun Employée a été trouvé</td>
							</tr>
							@endforelse
							</tbody>
						</table>

					</div>
				</div>

			</div>
		</div>
	</section>
</main>

@endsection