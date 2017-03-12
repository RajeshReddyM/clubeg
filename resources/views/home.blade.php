@extends('layouts.app')
@section('content')
<div class="main">
    <div class="col-md-10 col-md-offset-1">
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
            @endif
          @endforeach
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">{{ trans('app.dashboard') }}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Registered Tournaments:</h3>
                        @foreach ($pageData['registeredTournaments'] as $tournament)
                            @if($tournament->logo)
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="hovereffect">
                                                <a href="{{ action('TournamentsController@show', $tournament->id) }}">
                                                    {{ Html::image('images/tournaments/'. $tournament->logo,"Tournament placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                                                    <div class="overlay">
                                                        <h2><?php echo  $tournament->name ?></h2>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Available Tournaments:</h3>
                        @foreach ($pageData['allTournaments'] as $tournament)
                            @if($tournament->logo)
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="hovereffect">
                                                <a href="{{ action('TournamentsController@show', $tournament->id) }}">
                                                    {{ Html::image('images/tournaments/'. $tournament->logo,"Tournament placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                                                    <div class="overlay">
                                                        <h2><?php echo  $tournament->name ?></h2>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
