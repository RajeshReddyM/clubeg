@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
            @endif
          @endforeach
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('app.dashboard') }}</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($tournaments as $tournament)
                                <div class="col-md-4">
                                    {{Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded'))}}
                                    {{Html::linkAction("TournamentController@view" ,$tournament->name,$tournament->id)}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
