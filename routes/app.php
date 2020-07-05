<?php

$locale = \Request::segment(1);

if(array_key_exists($locale, config('app.locales')))
{
	$prefix = $locale;
}
else
{
	$prefix = '';
}

Route::middleware('redirectLang')
	->prefix($prefix)
	->group(function()
{

	/*
	 *  Authentication
	 */
	Route::get('/login' , 'App\LoginController@showLoginForm')->name('app.login');
	Route::post('/login' , 'App\LoginController@login');
	Route::post('/logout' , 'App\LoginController@logout');


	/*
	 *  Application Routes
	 *  -----------------------------------------
	 */

	Route::middleware('auth')->namespace('App')->group(function()
	{
		/* Pages */
		Route::get('/', 'DashboardController@showDash')->name('app.dash');

		/* Employees */
		Route::get('/employees', 'UsersController@showUsers')->name('app.users.index');
		Route::get('/employees/create', 'UsersController@showCreate')->name('app.users.create');

		Route::post('/employees', 'UsersController@store')->name('app.users.store');

		//  About Us
		Route::get('/about-us', 'AboutController@showAbout')->name('app.about');

		// Contact
		Route::get('/contact', 'HomeController@showContact')->name('app.contact');
		Route::post('/contact/send', 'ContactController@sendEmail');
	});
});