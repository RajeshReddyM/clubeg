<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ClubEG') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/site.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
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
                        @if (Session::get('locale') == 'fr')
                            <li> <a href="#" data-index="en" id="languageSwitcher"> English </a> </li>
                        @else
                            <li> <a href="#" data-index="fr" id="languageSwitcher"> Français </a> </li>
                        @endif
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">{{ trans('app.login') }}</a></li>
                            <li><a href="{{ route('register') }}">{{ trans('app.signup') }}</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->first_name }}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('users.edit', Auth::user()->id)}}" class="dropdown-item"> <i class="glyphicon glyphicon-user"> </i> {{ trans('app.profile') }}</a></li>
                                    <div class="dropdown-divider"></div>
                                   @if (Auth::user()->isAn('admin'))
                                        <li><a class="dropdown-item" href="{{ route('register') }}"> <i class="glyphicon glyphicon-plus"></i> {{ trans('app.add_player') }}</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a class="dropdown-item"  href="{{ route('users.index') }}"><i class="glyphicon glyphicon-list"></i> {{ trans('app.players') }} </a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a class="dropdown-item"  href="{{ route('clubs.index') }}"><i class="glyphicon glyphicon-list"></i>  {{trans('app.clubs')}} </a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a class="dropdown-item"  href="{{ route('clubs.create') }}"><i class="glyphicon glyphicon-plus"></i>  {{trans('golf_club.add_club')}} </a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a class="dropdown-item"  href="{{ route('golfcourses.index') }}"><i class="glyphicon glyphicon-list"></i>  {{trans('golf_club.golf_courses')}} </a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a class="dropdown-item"  href="{{ route('golfcourses.create') }}"><i class="glyphicon glyphicon-plus"></i>  {{trans('golf_courses.add_golf_courses')}} </a></li>
                                        <div class="dropdown-divider"></div>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="glyphicon glyphicon-off"> </i> {{ trans('app.logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @if (Auth::user())
            <nav class="navbar navbar-inverse sidebar" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/home">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                            <li ><a href="{{route('users.edit', Auth::user()->id)}}" class="dropdown-item"> <i class="pull-right glyphicon glyphicon-user"> </i> {{ trans('app.profile') }}</a></li>
                            @if (Auth::user()->isAn('admin'))
                                <li ><a class="dropdown-item"  href="{{ route('users.index') }}"><i class="pull-right glyphicon glyphicon-list"></i> {{ trans('app.players') }} </a></li>
                            @endif
                            @if (Auth::user()->isAn('admin','player'))
                                <li><a class="dropdown-item"  href="{{ action('TournamentsController@index') }}"><i class="pull-right glyphicon glyphicon-list"></i>  {{trans('app.tournaments')}} </a></li>
                            @endif
                            @if (Auth::user()->isAn('admin'))
                                <li ><a class="dropdown-item"  href="{{ route('clubs.index') }}"><i class="pull-right glyphicon glyphicon-list"></i>  {{trans('app.clubs')}} </a></li>
                            @endif
                            @if (Auth::user()->isAn('admin', 'golfcourse'))
                                <li ><a class="dropdown-item"  href="{{ route('golfcourses.index') }}"><i class="pull-right glyphicon glyphicon-list"></i>  {{trans('golf_club.golf_courses')}} </a></li>
                            @endif
                            @if (Auth::user()->isAn('admin', 'scorer'))
                                <li ><a href="#">{{trans('app.scores')}}<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list"></span></a></li>
                            @endif
                            <li ><a href="#">{{trans('app.groups')}}<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                                <ul class="dropdown-menu forAnimate" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @endif

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/site.js"></script>
</body>
</html>
