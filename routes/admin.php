<?php

/*
 *  Authentication
 */

Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Admin\LoginController@login');
Route::post('/logout', 'Admin\LoginController@logout');


/*
 *  Admin Routes
 */

Route::middleware('auth:admin')
	->namespace('Admin')
	->group(function()
{

	// Dashboard
	Route::get('/', 'DashboardController@showDashboard')->name('admin.dash');

	// Profile
	Route::get('/profile', 'ProfileController@showProfile')->name('admin.profile');
	Route::post('/password/update', 'AccountController@updatePassword');

	Route::get('/profile/get-user', 'ProfileController@getUser');

	// Config
	Route::get('/config', 'ConfigController@showConfig')->name('admin.config');

});