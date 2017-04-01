@extends('layouts.app')

@section('content')

    <div class="col-md-8">

        <div class="col-md-6 col-md-offset-4">
            <h1>{{trans('tournaments.add_tournament')}}</h1>
            <br/>

            <!-- if there are creation errors, they will show here -->
            {{ Html::ul($errors->all()) }}

            {{ Form::model($tournament, array('action' => array('TournamentsController@store'), 'method' => 'POST', 'files' => true, 'enctype' => "multipart/form-data")) }}

            <div class="form-group">
                {{ Form::label('name', trans('golf_club.name')) }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('golfcourse_id', trans('golf_courses.golf_course')) }}

                {{ Form::select('golfcourse_id', \App\Golfcourse::all()->pluck('name', 'id')->toArray(), null,['placeholder'=> trans('tournaments.select_course'), 'class'=>'form-control select2']) }}
            </div>
            <div class="form-group">
                {{ Form::label('visibility', 'Visibility') }}

                {{ Form::select('visibility', ['public' => 'Public', 'private' => 'Private'], null,['placeholder'=> 'Please select...', 'class'=>'form-control select2']) }}
            </div>
            <div class="form-group">
                {{ Form::label('division', 'Division') }}

                {{ Form::select('division', ['division1' => 'Division1', 'division2' => 'Division2'], null,['placeholder'=> 'Please select...', 'class'=>'form-control select2']) }}
            </div>
             <div class="form-group">
                {{ Form::label('type', 'Type') }}

                {{ Form::select('type', ['charity' => 'Charity', 'type1' => 'Type1'], null,['placeholder'=> 'Please select...', 'class'=>'form-control select2']) }}
            </div>
            <div class="form-group">
                {{ Form::label('start_date', trans('tournaments.start_date')) }}
                {{ Form::text('start_date', date('Y/m/d'), array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('logo', trans('golf_club.logo')) }}
                {{ Form::file('logo', null, array('class' => 'form-control')) }}
            </div>

            {{ Form::submit(trans('golf_club.submit'), array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
@endsection
