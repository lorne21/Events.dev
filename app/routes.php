<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
	return Redirect::action('EventsController@index');
});

Route::get('events/manage', 'EventsController@getManage');

Route::get('events/getEvent/{$id}', 'EventsController@getEvent');

Route::resource('events', 'EventsController');

Route::resource('users', 'UsersController');

Route::get('login', 'HomeController@showLogin');

Route::post('login', 'HomeController@doLogin');

Route::get('logout', 'HomeController@doLogout');
