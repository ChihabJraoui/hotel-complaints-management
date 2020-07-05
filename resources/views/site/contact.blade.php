@extends('site')

@section('page_title', trans('config.title') .' | '. trans('contact.page.title') )
@section('page_description', trans('contact.page.description'))

@section('content')

<main class="site-content" data-ng-controller="ContactController">

	{{-- Banner --}}
	<section class="banner banner-sm -dark" data-ng-background="{{ asset('img/bg/contact.jpg') }}">
		<div class="container">

			<h1 class="main-title">{{ trans('contact.contact_us') }}</h1>
			<h2 class="main-subtitle">{{ trans('contact.lets_get_in_touch') }}</h2>

		</div>
	</section>

	{{-- Contact --}}
	<section id="contact" class="segment">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-5">

					<ul class="list-contact-info">
						<li>
							<i class="material-icons">pin_drop</i>
							<span>Marrakech, Morocco</span>
						</li>
						<li>
							<i class="material-icons">mail</i>
							<span>abdogolftours@gmail.com</span>
						</li>
						<li>
							<i class="material-icons">phone</i>
							<span>(+212) 600626276 / (+212) 611721599</span>
						</li>
					</ul>

				</div>
				<div class="col-md-7">

					<h3 class="text-left">{{ trans('contact.drop_us_a_line') }}</h3>

					<form name="frmContact">
						<div class="form-group">
							<input name="name" type="text" class="form-control"
							       placeholder="{{ trans('contact.your_name') }}"
							       data-ng-model="data.name" required>
							<small class="text-danger" data-ng-cloak
							       data-ng-show="frmContact.name.$invalid && frmContact.name.$touched">
								Champ obligatoire
							</small>
						</div>
						<div class="form-group">
							<input name="email" type="email" class="form-control"
							       placeholder="{{ trans('contact.your_email') }}"
							       data-ng-model="data.email" data-ng-required="true">
							<p data-ng-cloak data-ng-show="frmContact.email.$touched && frmContact.email.$invalid">
								<small class="help-block text-danger">
									Champ obligatoire
								</small>
							</p>
							<small class="text-danger" data-ng-cloak data-ng-show="frmContact.email.$invalid">
								Invalid Email Format
							</small>
						</div>
						<div class="form-group">
							<textarea name="content" class="form-control" rows="5"
							          placeholder="{{ trans('contact.your_message') }}"
							          data-ng-model="data.content" required></textarea>
							<small class="text-danger" data-ng-cloak
							       data-ng-show="frmContact.content.$invalid && frmContact.content.$touched">
								Champ obligatoire
							</small>
						</div>
						<div class="form-group text-center">
							<button type="button" class="btn btn-primary btn-lg"
							        data-ng-disabled="frmContact.$invalid" data-ng-click="send($event)">
								{{ trans('contact.btn_send') }}
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

</main>

@endsection
