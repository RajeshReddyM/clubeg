@extends('layouts.app')

@section('content')

    <div class="col-md-10">
        <div class="col-md-10 col-md-offset-1">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-md-6 col-md-offset-2">
            <h1>{{ trans('scores.edit_score') }}</h1>
            <br/>

            <!-- if there are creation errors, they will show here -->
            {{ Html::ul($errors->all()) }}

            {{ Form::model($score, array('route' => array('scores.update', $score->id), 'method' => 'PUT', 'files' => true, 'enctype' => "multipart/form-data")) }}

            <div class="form-group">
                {{ Form::label('tournament_id', trans('groups.tournaments')) }}
                {{ Form::select('tournament_id', \App\Tournament::all()->pluck('name', 'id')->toArray(), null, ['placeholder'=> trans('scores.select_tournament'),'class'=>'form-control select2']) }}
            </div>

            <div class="form-group">
                {{ Form::label('golfcourse_id', trans('golf_courses.golf_course')) }}
                {{ Form::select('golfcourse_id', \App\Golfcourse::all()->pluck('name', 'id')->toArray(), null, ['placeholder'=> trans('scores.select_golfcourse'),'class'=>'form-control select2']) }}
            </div>

            <div class="form-group">
                {{ Form::label('user_id', trans('groups.players')) }}
                {{ Form::select('user_id', \App\User::all()->pluck('first_name', 'id')->toArray(), null, ['placeholder'=> trans('scores.select_player'),'class'=>'form-control select2']) }}
            </div>

            <div class="form-group">
                {{ Form::label('groupNo', trans('scores.group')) }}
                {{ Form::select('groupNo', \App\Group::all()->pluck('name', 'id')->toArray(), null, ['placeholder'=> trans('scores.select_group'),'class'=>'form-control select2']) }}
            </div>
            <div class="form-group">
                {{ Form::label('teamNo', trans('scores.team')) }}
                {{ Form::select('teamNo', \App\Team::all()->pluck('name', 'id')->toArray(), null, ['placeholder'=> trans('scores.select_team'),'class'=>'form-control select2']) }}
            </div>
            <div class="form-group">
                <div class="row">
                    @for ($i = 1; $i <= 18; $i++)
                        <div class="col-md-2 col-xs-3 col-sm-3">
                            {{ Form::label('scores', trans('scores.hole_no').$i) }}
                            {{ Form::number('H'.$i, null, array('class'=> 'form-control','id' => 'H'.$i, 'style'=>'width: 8rem', 'min'=>1, 'max'=>5)) }}
                        </div>
                    @endfor
                </div>
            </div>

            {{ Form::submit(trans('scores.submit'), array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
@endsection
