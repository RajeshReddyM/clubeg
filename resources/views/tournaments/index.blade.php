@extends('layouts.app')

@section('content')


        <div class="container">
            <div class="row">
                <h3>All Tournaments:</h3>
                @foreach($tournaments as $tournament)
                    <div class="col-md-4">
                        {{Html::image('images/tournament_placeholder_image.jpg',"Tournament placeholder image", array('class' => 'img img-responsive img-rounded rounded'))}}
                        {{Html::linkAction("TournamentController@view" ,$tournament->name,$tournament->id)}}
                    </div>
                @endforeach
            </div>
        </div>
@endsection
