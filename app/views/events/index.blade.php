@extends('layouts.master')

    <head>
        
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Circular Content Carousel with jQuery" />
        <meta name="keywords" content="jquery, conent slider, content carousel, circular, expanding, sliding, css3" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Coustard:900' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css' />

  </head>
@section('content')

    <div class="container">
      <h1>The Gig Is Up</h1>
      <div class="container" style="padding-top: 50px">
          @if (Session::has('successMessage'))
              <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
          @endif
          @if (Session::has('errorMessage'))
              <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
          @endif
          @if($errors->has())
              <div class="alert alert-danger" role="alert">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
      </div> <!-- /.container -->
      
      <div id="ca-container" class="ca-container">
        <div class="ca-wrapper">
          @foreach($events as $event)
            <div class="ca-item ca-item-{{ $event->id }}">
              <div class="ca-item-main">
                <div class="ca-icon"></div>
                <h3>{{ $event->title }}</h3>
                <h4>
                  <span>{{ $event->date }}</span>
                </h4>
                  <a href="#" class="ca-more">more...</a>
              </div>
              <div class="ca-content-wrapper">
                <div class="ca-content">
                  <h6>Animals are not commodities</h6>
                  <a href="#" class="ca-close">close</a>
                  <div class="ca-content-text">
                    <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
                    <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
                    <p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                  </div>
                  <ul>
                    <li><a href="#">Read more</a></li>
                    <li><a href="#">Share this</a></li>
                    <li><a href="#">Become a member</a></li>
                    <li><a href="#">Donate</a></li>
                  </ul>
                </div>
              </div>
            </div>
          @endforeach
        </div> {{--end ca-wrapper--}}
      </div> {{--end ca-container--}}
      
    </div> {{--end container --}}


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <!-- the jScrollPane script -->
    <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
    <script type="text/javascript">
      $('#ca-container').contentcarousel();
    </script>
@stop