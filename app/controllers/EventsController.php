<?php

// use Faker\Factory as Faker;

class EventsController extends \BaseController {

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
        $query = CalendarEvent::with('user');

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
        

        $events = $query->get();


		
        return View::make('events.index')->with(array('events' => $events));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('events.create');
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
            $event->location = Input::get('location');
            $event->address = Input::get('address');
            $event->city = Input::get('city');
            $event->state = Input::get('state');
            $event->zip = Input::get('zip');
            $event->user_id = 1;
            
            if (Input::hasFile('img')) {
                $event->img = $image->move($directory);
            }
            $event->save();
            Log::info("Event successfully saved.", Input::all());
            Session::flash('successMessage', 'You created ' . $event->title . ' event successfully');
            return Redirect::action('EventsController@index');
        
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
        if (Request::wantsJson()) {
            return Response::json($event);
        } 
        return View::make('events.show')->with(array('event' => $event));
        // return View::make('events.show');
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $event = CalendarEvent::find($id);
        if(!$event) {
            Session::flash('errorMessage', "Post with id of $id is not found");
            App::abort(404);
        }
		return View::make('events.edit')->with(['event' => $event]);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
            $event = CalendarEvent::find($id);
            $directory = 'img/uploads/';
            $image = Input::file('img');
    
            $event->title = Input::get('title');
            $event->description = Input::get('description');
            $event->date = Input::get('date');
            $event->price = Input::get('price');
            $event->start_time = Input::get('start_time');
            if (!empty(Input::get('end_time'))) {
                $event->end_time = Input::get('end_time');
            } else {
                $event->end_time = null;
            }

            $event->location = Input::get('location');
            $event->address = Input::get('address');
            $event->city = Input::get('city');
            $event->state = Input::get('state');
            $event->zip = Input::get('zip');
            $event->user_id = 1;
            if (Input::hasFile('img')) {
                $event->img = $image->move($directory);
            }
            $event->save();

            Session::flash('successMessage', 'You updated ' . $event->title . ' event successfully');
            return Redirect::action('EventsController@index');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

    public function destroy($id)
	{
        $event = CalendarEvent::find($id);
        if(!$event) {
            Session::flash('errorMessage', "Event with id of $id is not found");
            App::abort(404);
        }
        $event->delete();
        return Redirect::action('EventsController@index');

	}

    public function getManage()
    {
        $query = CalendarEvent::with('user');

        $events = $query->get();
        
        return View::make('events.manage')->with(array('events' => $events));
    }

    public function getList()
    {
        $query = CalendarEvent::with('user');

        $events = $query->get();

        return Response::json($events);
    }

    public function getEvent($id)
    {
        $event = CalendarEvent::find($id);

        return Response::json($event);
    }

	
}