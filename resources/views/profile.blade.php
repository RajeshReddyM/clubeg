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
        </style>
    </head>
    <body>

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'ClubEG') }}
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
        <!-- End of top nav - start of side nav -->
        <div class="col-sm-2">
            <div class="nav-side-menu">
                <div class="brand">Brand Logo</div>
                <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

                <div class="menu-list">

                    <ul id="menu-content" class="menu-content collapse out">
                        <li>
                            <a href="#">
                                <i class="fa fa-dashboard fa-lg"></i> Dashboard
                            </a>
                        </li>

                        <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                            <a href="#"><i class="fa fa-gift fa-lg"></i> UI Elements <span class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse" id="products">
                            <li class="active"><a href="#">CSS3 Animation</a></li>
                            <li><a href="#">General</a></li>
                            <li><a href="#">Buttons</a></li>
                            <li><a href="#">Tabs & Accordions</a></li>
                            <li><a href="#">Typography</a></li>
                            <li><a href="#">FontAwesome</a></li>
                            <li><a href="#">Slider</a></li>
                            <li><a href="#">Panels</a></li>
                            <li><a href="#">Widgets</a></li>
                            <li><a href="#">Bootstrap Model</a></li>
                        </ul>


                        <li data-toggle="collapse" data-target="#service" class="collapsed">
                            <a href="#"><i class="fa fa-globe fa-lg"></i> Services <span class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse" id="service">
                            <li>New Service 1</li>
                            <li>New Service 2</li>
                            <li>New Service 3</li>
                        </ul>


                        <li data-toggle="collapse" data-target="#new" class="collapsed">
                            <a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse" id="new">
                            <li>New New 1</li>
                            <li>New New 2</li>
                            <li>New New 3</li>
                        </ul>


                        <li>
                            <a href="#">
                                <i class="fa fa-user fa-lg"></i> Profile
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-users fa-lg"></i> Users
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End of side nav -->
        <!-- Start of main content -->
        <div class="container">
            <div class="col-sm-10">
                <h2>Welcome {{ $user->first_name }}!</h2>

                <h2>Current Registrations</h2>
                <div class="col-sm-12">
                    {{Html::link('/tournaments', 'Tournament 1')}}
                    {{Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary margin-bottom-5' ,'title'=>'Update Score'))}}
                </div>
                <div class="col-sm-12">
                    {{Html::link('/tournaments', 'Tournament 2')}}
                    {{Form::button('<i class="glyphicon glyphicon-pencil"></i>',array('type' => 'submit', 'class' => 'btn btn-sm btn-primary margin-bottom-5' ,'title'=>'Update Score'))}}
                </div>
                <div class="col-sm-12">
                    {{Html::link('/tournaments', 'Tournament 3')}}
                    {{Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary margin-bottom-5' ,'title'=>'Update Score'))}}
                </div>
                <div class="col-sm-12">
                    <h2>Tournaments Available for Registration</h2>
                    <div class="col-sm-4">
                        <!-- TODO: pass tournament id back to the TournamentController view function to fetch the rest of the tournament data for the tournamentRegistration page -->
                        {!! Form::open(['action' => 'TournamentController@view','method' => 'post'],['class'=>'form-group']) !!}
                            {{Form::select('Tournaments', $availableTournaments,null,['class'=>'form-control',"onchange" => "this.form.submit()"])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>
        <!-- End of main content -->
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/site.js"></script>
    </body>
</html>
