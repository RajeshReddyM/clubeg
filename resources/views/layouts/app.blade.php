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
                                    <i class="glyphicon glyphicon-user"> </i> {{ Auth::user()->first_name }}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                   @if (Auth::user()->isAn('admin'))
                                        <li><a class="dropdown-item" href="{{ route('register') }}"> <i class="glyphicon glyphicon-plus"></i> {{ trans('app.add_player') }}</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a class="dropdown-item"  href="{{ route('users.index') }}"><i class="glyphicon glyphicon-list"></i> {{ trans('app.players') }} </a></li>
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

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/site.js"></script>
</body>
</html>
