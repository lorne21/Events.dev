<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showLogin()
	{
		return View::make('login');
	}

	public function doLogin()
   	{
   		$email    = Input::get('email');
   		$password = Input::get('password');
   		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
		    Session::flash('successMessage', 'You logged in successfully');
		    return Redirect::action('EventsController@index');
		} else {
		    Session::flash('errorMessage', 'Email or password was incorrect.');
            Log::error('User failed to authenticate!', array('email' => $email));
		    return Redirect::action('EventsController@index')->withInput;
		}
   	}
   	public function doLogout()
   	{
   		Auth::logout();
   		Session::flash('successMessage', 'You are logged out');
   		return Redirect::action('EventsController@index');
   	}

}
