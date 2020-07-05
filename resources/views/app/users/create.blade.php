@extends('app')

@section('page_title', 'Ajouter un employée')

@section('content')

<main class="site-content">
	<div class="breadcrumb">
		<span>Admin</span>
		<i class="fa fa-angle-right"></i>
		<span>Employées</span>
		<i class="fa fa-angle-right"></i>
		<span>Ajouter</span>
	</div>
	<div class="page-header">
		<a href="{{ URL::previous() }}" class="btn-back">
			<i class="material-icons">arrow_back</i>
		</a>
		<h2 class="title">Ajouter un employée</h2>
	</div>

	<section class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12 col-md-8">

				<form name="frmCreateEmployee" action="{{ route('app.users.store') }}" method="post">
					{{ csrf_field() }}
					<div class="wrapper">
						<div class="body">
							<div class="form-group">

								<label class="form-control-label">Nom:</label>
								<input type="text" id="txt-lastname" name="lastname" class="form-control"
									/>
							</div>
							<div class="form-group">

								<label class="form-control-label">Prénom:</label>
								<input type="text" id="txt-firstname" name="firstname" class="form-control"
								/>
							</div>
							<div class="form-group">

								<label class="form-control-label">Adresse email:</label>
								<input type="email" id="txt-email" name="email" class="form-control"
								/>
							</div>
							<div class="form-group">

								<label class="form-control-label">Role:</label>
								<select id="select-role" name="role_id" class="form-control">
									<option disabled selected>Choisissez un role</option>
									@foreach(\App\Role::all() as $role)
									<option value="{{ $role->id }}">{{ $role->role }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="footer text-right">
							<button type="submit" class="btn btn-success">Ajouter</button>
							<a href="{{ URL::previous() }}" class="btn btn-dark">Annuler</a>
						</div>
					</div>
				</form>

			</div>
		</div>
	</section>
</main>

@endsection
