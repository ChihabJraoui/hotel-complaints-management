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
	 *  WebSite Routes
	 *  -----------------------------------------
	 */

	// Home
	Route::get('/', 'HomeController@showHome')->name('site.home');

	// Contact
	Route::get('/contact', 'HomeController@showContact')->name('site.contact');
	Route::post('/contact/send', 'ContactController@sendEmail');

});