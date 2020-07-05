@extends('app')

@section('page_title', 'Login')

@section('content')

<section class="banner -fh">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-sm-10 col-md-6 col-lg-4">

				{{-- Error Messages --}}
				@if($errors->any())
				<div class="d-flex justify-content-center">
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				</div>
				@endif

				<div class="panel-login">
					<div class="panel-login--heading">
						<h3>S'authentifier</h3>
					</div>
					<div class="panel-login--body">

						{{--<!-- Login Form -->--}}
						<form role="form" method="POST" action="/login">
							{{ csrf_field() }}

							<div class="form-group">
								<input id="text-email" name="username" type="text" class="form-control"
								       placeholder="Email ou nom d'utilisateur" autocomplete="off" />
							</div>
							<div class="form-group">
								<input id="text-password" name="password" type="password" class="form-control"
								       placeholder="Mot de Passe" autocomplete="off" />
							</div>
							<div class="form-group">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" value="1"
										       checked="checked" />
										Enregistrer Mes Infos
									</label>
								</div>
							</div>
							<div class="form-group">
								<button id="btn-login" type="submit" class="btn btn-primary btn-lg btn-block">
									Se Connecter
								</button>
							</div>
						</form>

					</div>
				</div>

			</div>
		</div>
	</div>
</section>

@endsection