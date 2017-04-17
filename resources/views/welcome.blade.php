<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WGD</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <link href="/css/carousel.css" rel="stylesheet">

    <style>
        .full-height {
            height: 90vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        #firstItem {
            background-image: url("/images/golf ball2-transp.jpg");
            background-size: cover;
        }

        #secondItem {
            background-image: url("/images/golf-clouds-transp.jpg");

            background-size: cover;
        }

        #thirdItem {
            background-image: url("/images/golf-grounds-transp.jpg");
            background-size: cover;
        }

        .carousel-caption {
            text-shadow: 0 2px 2px rgba(0, 0, 0, 0.6) !important;
        }

        .navbar {
            margin-bottom: 0px !important;
        }

        #flashMessage {
            position: absolute;
            z-index: 1;
            margin-top: 20px;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <a class="navbar-brand" href="{{ url('/') }}">
            WGD
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Route::has('login'))
                    <div class="top-right links">
                        @if (Session::get('locale') == 'fr')
                            <a href="#" data-index="en" id="languageSwitcher"> English </a>
                        @else
                            <a href="#" data-index="fr" id="languageSwitcher"> Français </a>
                        @endif
                        <input type="hidden" name="_token" id="csrf_token" value="{{csrf_token()}}">
                        @if (Auth::check())
                            <a href="{{ url('/home') }}">{{ trans('app.home') }}</a>
                        @else
                            <a href="{{ url('/login') }}">{{ trans('app.login') }}</a>
                            <a href="{{ url('/register') }}">{{ trans('app.signup') }}</a>
                        @endif
                    </div>
                @endif
            </ul>
        </div>
    </div>
</nav>


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="col-md-10 col-md-offset-1" id="flashMessage">
        <div class="row">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">

        <div class="item active" id="firstItem">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Quickly create and organize tournaments</h1>

                    <p>With WGD, creating and organizing tournaments is fast and simple to do, and your club members can
                        register themselves instantly.</p>

                    <p><a class="btn btn-lg btn-primary" href="{{ url('/register') }}" role="button">Sign up today</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="item" id="secondItem">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Register to play in local tournaments</h1>

                    <p>See what tournaments are taking place close to you, and register with a few simple clicks.</p>

                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item" id="thirdItem">
            <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>

                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                        at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
<div class="container">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 text-center">
            <img class="img-circle" src="/images/golf-bag-transp.jpg" alt="Generic placeholder image" width="140"
                 height="140">

            <h2>Latest Results</h2>

            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies
                vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo
                cursus magna.</p>

            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4 col-md-4 col-sm-4 text-center">
            <img class="img-circle" src="/images/golfer3-cropped.jpg" alt="Generic placeholder image" width="140"
                 height="140">

            <h2>Tournaments</h2>

            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras
                mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh.</p>

            <p><a class="btn btn-default" href="{{ action('TournamentsController@index') }}" role="button">View details &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4 col-md-4 col-sm-4 text-center">
            <img class="img-circle" src="/images/sky and grass-cropped.jpg" alt="Generic placeholder image" width="140"
                 height="140">

            <h2>Golf Courses</h2>

            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula
                porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                fermentum massa justo sit amet risus.</p>

            <p><a class="btn btn-default" href="{{ route('golfcourses.index') }}" role="button">View details &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->


    <!-- FOOTER -->
    <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>

        <p>&copy; 2016 WGD, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>

</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
<script src="/js/site.js"></script>
</body>
</html>
