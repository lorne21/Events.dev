<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="csrf-token" content="{{{ csrf_token() }}}">

      <title>The Gig is Up</title>
      <!-- Stylesheets -->
      <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="/css/simple-sidebar.css">
  </head>
    <body>
      <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        The Gig Is Up! 
                    </a>
                </li>
                <li>
                    <a href="{{ action('EventsController@index') }}">Browse Events</a>
                </li>
                <li>
                    <a href="#">Browse Bands</a>
                </li>
                <li>
                    <a href="{{ action('EventsController@create') }}">Post A New Gig</a>
                </li>
                <li>
                    <a href="#">Manage Posts</a>
                </li>
                <li>
                    <a href="#">Manage Profile</a>
                </li>
                <li>
                    <a href="#">Sign Up Your Band</a>
                </li>
                <li>
                    <a href="#">Login</a>
                </li>
                <li>
                    <a href="#">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="header">
                  <a href="#menu-toggle" id="menu-toggle">Toggle Menu</a>
                </div>
            </div>
            @yield('content')
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    
      <!--  Scripts  -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
       <!-- JavaScript for sidebar woop woop -->
      <script src="/js/simplesidebar.js"></script>
    
    </body>
</html>



