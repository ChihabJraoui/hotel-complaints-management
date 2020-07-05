@extends('app')

@section('page_title', 'Login')

@section('content')

<main class="site-auth">
	<section class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-10 col-sm-6 col-md-4">

				@if($errors->any())
					@foreach($errors->all() as $error)
					<div class="alert alert-danger">
						{{ $error }}
					</div>
					@endforeach
				@endif

				<form id="frmLogin" role="form" method="POST" action="/login">
					{{ csrf_field() }}

					<div class="card mt-5">
						<div class="card-header">
							<h3>Se Connecter</h3>
						</div>
						<div class="card-body">

							<div class="form-group">
								<input type="email" id="text-email" name="email" class="form-control"
								       placeholder="Adresse email" autocomplete="off" autofocus
								       value="{{ old('email') }}" />
							</div>
							<div class="form-group">
								<input id="text-password" name="password" type="password" class="form-control"
								       placeholder="Mot de Passe" autocomplete="off" />
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" id="check-remember" name="remember" value="1"
								       class="custom-control-input" checked>
								<label class="custom-control-label" for="check-remember">
									Enregistrer Mes Infos
								</label>
							</div>

						</div>
						<div class="card-footer">
							<button id="btn-login" type="submit" class="btn btn-primary btn-lg btn-block">
								Login
							</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</section>
</main>

@endsection
