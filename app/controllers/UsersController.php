<?php

// use Faker\Factory as Faker;

class UsersController extends \BaseController {

	public function __construct()
	{
	    parent::__construct();
	    // $this->beforeFilter('auth', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // set a value in the session
        $query = User::with('events');

        // if(Input::has('search')){
        // 	$search = Input::get('search');
        // 	$query->where('title', 'like', '%' . $search . '%');
        // 	$query->orWhere('title', 'like', '%' . $search);
        // 	$query->orWhere('title', 'like', $search . '%');
        	
        // 	$query->orWhereHas('users', function($q){
        // 		$search = Input::get('search');
        // 		$q->where('band_name', $search);
        // 	});
        // 	$query->orWhereHas('users', function($q){
        // 		$search = Input::get('search');
        // 		$q->where('genre', $search);
        // 	});
        // }
        

        $users = $query->orderBy('created_at', 'desc')->paginate(4);


		
        return View::make('users.index')->with(array('users' => $users));
	}
    public function bands()
    {
        // set a value in the session
        $query = CalendarEvent::with('user');

        // if(Input::has('search')){
        //  $search = Input::get('search');
        //  $query->where('title', 'like', '%' . $search . '%');
        //  $query->orWhere('title', 'like', '%' . $search);
        //  $query->orWhere('title', 'like', $search . '%');
            
        //  $query->orWhereHas('users', function($q){
        //      $search = Input::get('search');
        //      $q->where('band_name', $search);
        //  });
        //  $query->orWhereHas('users', function($q){
        //      $search = Input::get('search');
        //      $q->where('genre', $search);
        //  });
        // }
        

        $events = $query->orderBy('date', 'desc')->paginate(4);


        
        return View::make('users.index')->with(array('users' => $users));
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
    {
        
            $directory = 'img/uploads/';
            $image = Input::file('img');
            $event = new CalendarEvent;
            $event->title = Input::get('title');
            $event->description = Input::get('description');
            $event->date = Input::get('date');
            $event->price = Input::get('price');
            $event->start_time = Input::get('start_time');
            $event->end_time = Input::get('end_time');
            
            if (Input::hasFile('img')) {
                $event->img = $image->move($directory);
            }
            $event->save();
            Log::info("Event successfully saved.", Input::all());
            Session::flash('successMessage', 'You created ' . $event->title . ' event successfully');
            return Redirect::action('UsersController@create');
        
    }
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$event = CalendarEvent::find($id);
        if(!$event) {
            Session::flash('errorMessage', "Post with id of $id is not found");
            App::abort(404);
        }
        Log::info("Event of id $id found");
        return View::make('users.show')->with(array('user' => $user));
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = CalendarEvent::find($id);
        if(!$user) {
            Session::flash('errorMessage', "Post with id of $id is not found");
            App::abort(404);
        }
		return View::make('users.edit')->with(['user' => $user]);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
            $user = CalendarEvent::find($id);
            $directory = 'img/uploads/';
            $image = Input::file('img');
    
            $user->title = Input::get('title');
            $user->description = Input::get('description');
            $user->date = Input::get('date');
            $user->price = Input::get('price');
            $user->start_time = Input::get('start_time');
            $user->end_time = Input::get('end_time');
            if (Input::hasFile('img')) {
                $user->img = $image->move($directory);
            }
            $user->save();
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

    public function destroy($id)
	{
        $user = User::find($id);
        if(!$user) {
            Session::flash('errorMessage', "Post with id of $id is not found");
            App::abort(404);
        }
        $user->delete();
        return Redirect::action('UsersController@index');

	}

    public function getManage()
    {
        return View::make('users.manage');
    }

	
}