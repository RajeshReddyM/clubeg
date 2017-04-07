@extends('layouts.app')

@section('content')


<div class="main">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title">{{trans('tournaments.all_tournaments')}}</h3>
            </div>
            @if (Auth::user()->isAn('admin'))
            <div class="col-md-2">
                <a href="{{ action('TournamentsController@create') }}" class="btn btn-success addButton">
                  <i class="glyphicon glyphicon-plus" aria-hidden="true"> </i> {{trans('tournaments.add_tournament')}}
                </a>
            </div>
            @endif
        </div>
        <hr/>
        @foreach($tournaments as $tournament)
            @if($tournament->logo)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="hovereffect">
                                <a href="{{ action('TournamentsController@show', $tournament->id) }}">
                                    {{ Html::image('images/tournaments/'. $tournament->logo,trans('tournaments.tournament_place_img'), array('class' => 'img img-responsive img-rounded rounded')) }}
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
@endsection
