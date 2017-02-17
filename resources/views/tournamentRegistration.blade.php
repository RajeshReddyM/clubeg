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

    </head>
    <body>

        <!-- Start of top nav -->
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
        <!-- End of top nav -->

        <!-- Start of main container -->
        <div class="container">
            <!-- Start of tournament info -->
            <h2>{Tournament Name}</h2>

            <div class="col-sm-6">
                <div class="col-sm-6">
                    <label for="startDate">Start Date: </label>
                </div>
                <div class="col-sm-6">
                    <p id="startDate">{start_date}</p>
                </div>
                <div class="col-sm-6">
                    <label for="startDate">Club Name: </label>
                </div>
                <div class="col-sm-6">
                    <p id="startDate">{golf_club_name}</p>
                </div>
                <div class="col-sm-6">
                    <label for="startDate">Course Name: </label>
                </div>
                <div class="col-sm-6">
                    <p id="startDate">{golf_course_name}</p>
                </div>
                <div class="col-sm-6">
                    <label for="startDate">Type: </label>
                </div>
                <div class="col-sm-6">
                    <p id="startDate">{tournament_type}</p>
                </div>

            </div>
            <!-- End of tournament info -->


            <!-- Start of tournament photo -->
            <div class="col-sm-6">
                    {{ Html::image('http://placehold.it/350x150',"Tournament placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
            </div>
            <!-- End of tournament photo -->


            <hr/>


            <!-- Start of register/cancel registration buttons -->
            <div class="col-sm-6">
                <button class="btn btn-success">Register</button>
                <button class="btn btn-danger">Cancel Registration</button>
            </div>
            <!-- End of register/cancel registration buttons -->

            <!-- Start of sponsor area -->
            <div class="row">
                <div class="col-sm-12">
                    <h2>Sponsors</h2>
                    <hr/>
                    <div class="col-sm-4 well well-sm">
                        <p>{Sponsor 1}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-sm-4 well well-sm">
                        <p>{Sponsor 2}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-sm-4 well well-sm">
                        <p>{Sponsor 3}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-sm-4 well well-sm">
                        <p>{Sponsor 4}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-sm-4 well well-sm">
                        <p>{Sponsor 5}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-sm-4 well well-sm">
                        <p>{Sponsor 6}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                </div>
            </div>
            <!-- End of sponsor area -->
        </div>
        <!-- End of main container -->
        </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/site.js"></script>
    </body>
</html>
