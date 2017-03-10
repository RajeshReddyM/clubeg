@extends('layouts.app')

@section('content')

    <div class="col-md-8">

        <div class="col-md-6 col-md-offset-4">
            <h1>Add Tournament</h1>
            <br/>

            <!-- if there are creation errors, they will show here -->
            {{ Html::ul($errors->all()) }}

            {{ Form::model($tournament, array('action' => array('TournamentController@store'), 'method' => 'POST', 'files' => true, 'enctype' => "multipart/form-data")) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('golfcourse_id', 'Golf Course') }}

                {{ Form::select('golfcourse_id', \App\Golfcourse::all()->pluck('name', 'id')->toArray(), null,['placeholder'=> 'Select a Course...', 'class'=>'form-control select2']) }}
            </div>

            <div class="form-group">
                {{ Form::label('logo', 'Logo') }}
                {{ Form::file('logo', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('start_time', 'Start time') }}
                {{ Form::text('start_time', date('Y/m/d')) }}
            </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
@endsection
