@extends('admin')

@section('page_title', 'Login')

@section('content')

<main class="site-auth">
	<section class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-10 col-sm-6 col-md-6 col-lg-4">

				<div class="card mt-5">
					<div class="card-header">
						<h3>Login</h3>
					</div>
					<div class="card-body">

						@if($errors->any())
						<div class="d-flex flex-column">
							@foreach($errors->all() as $error)
							<div class="alert alert-danger">
								{{ $error }}
							</div>
							@endforeach
						</div>
						@endif

						<form id="frmLogin" role="form" method="POST" action="/login">
							{{ csrf_field() }}
							<div class="form-group">
								<input id="text-email" name="username" type="text" class="form-control"
								       placeholder="Nom d'utilisateur" autocomplete="off" />
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

						<div class="text-right">
							<a href="#">
								Mot de passe oublié ?
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</main>

@endsection
