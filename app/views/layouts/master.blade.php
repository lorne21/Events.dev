<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">

    <title>Event Slapper</title>


    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/simple-sidebar.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="/js/jquery.js"></script>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div>    
    <div id="page-wrapper">
          @yield('content')
    </div>


    <div id="btn">
            <div id='top'></div>
            <div id='middle'></div>
            <div id='bottom'></div>
    </div>
    <div id="box">
        <div id="items">
            <div class="item"> <a href="{{ action('EventsController@index') }}">Browse Events</a></div>
            <div class="item"> <a href="#">Browse Bands</a></div>
            <div class="item"> <a href="{{ action('EventsController@create') }}">Post An Event</a></div>
            <div class="item"> <a href="{{ action('EventsController@getManage') }}">Manage Events</a></div>
            <div class="item"> <a href="#">Manage Profile</a></div>  
            <div class="item"> <a href="#">Sign Up Your Band</a></div>
            <div class="item"> <a data-toggle="modal" data-target="#loginModal" href="#" style="text-color:black;">Login</a></div>
            <div class="item"> <a href="{{ action('HomeController@doLogout') }}">Logout</a></div>
        </div>
    </div>

    {{-- LOGIN MODAL --}}
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Log In</h4>
            </div>
                <div class="modal-body">
                {{ Form::open(array('action' => 'HomeController@doLogin')) }}
                    <div class="form-group">
                        {{ Form::label('email', 'Email Address') }}
                        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Log In</button>
                    </div>
                {{ Form::close() }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                </div>
            </div>
        </div>
    </div>


  </div>
    <!-- /#wrapper -->



    
    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- JavaScript for sidebar woop woop -->
    <script src="/js/simplesidebar.js"></script>
</body>

</html>



