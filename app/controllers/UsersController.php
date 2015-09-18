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
        
        $users = $query->orderBy('band_name', 'desc')->paginate(4);
        
        return View::make('users.index')->with(array('users' => $users));
    }
    public function bands()
    {
        // set a value in the session
        $query = User::with('events');
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
        
        $users = $query->orderBy('band_name', 'desc')->paginate(4);
        
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
            $user = new User;
            $user->band_name = Input::get('band_name');
            $user->email = Input::get('email');
            $user->password = Input::get('password');
            $user->password_confirmation = Input::get('password_confirmation');
            $user->genre = Input::get('genre');
            $user->about = Input::get('about');
            
            
            if (Input::hasFile('img')) {
                $user->img = $image->move($directory);
            }
            $user->save();
            Log::info("Event successfully saved.", Input::all());
            Session::flash('successMessage', 'You created ' . $user->band_name . '\'s account successfully');
            return Redirect::action('UsersController@index');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user) {
            Session::flash('errorMessage', "User with id of $id is not found");
            App::abort(404);
        }
        Log::info("User of id $id found");
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
        $user = User::find($id);
        if(!$user) {
            Session::flash('errorMessage', "User with id of $id is not found");
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
        
            $user = User::find($id);
            $directory = 'img/uploads/';
            $image = Input::file('img');
    
            $user = new User;
            $user->band_name = Input::get('band_name');
            $user->email = Input::get('email');
            $user->password = Input::get('password');
            $user->genre = Input::get('genre');
            $user->about = Input::get('about');
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
            Session::flash('errorMessage', "User with id of $id is not found");
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