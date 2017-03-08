@extends('layouts.app')

@section('content')


        <div class="container">
            <div class="row">
                <h3>All Tournaments:</h3>
                @foreach($tournaments as $tournament)
                    @if($tournament->logo)
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="hovereffect">
                                        <a href="{{ action("TournamentController@view", $tournament->id) }}">
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
@endsection
