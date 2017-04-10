@extends('layouts.app')

@section('content')

    <div class="col-md-8">

        <div class="col-md-6 col-md-offset-4">
            <h1>{{trans('sponsors.add_sponsor')}}</h1>
            <br/>

            <!-- if there are creation errors, they will show here -->
            {{ Html::ul($errors->all()) }}

            {{ Form::model($sponsor, array('action' => array('SponsorsController@store'), 'method' => 'POST', 'files' => true, 'enctype' => "multipart/form-data")) }}

            <div class="form-group">
                {{ Form::label('name', trans('sponsors.name')) }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', trans('sponsors.email')) }}

                {{ Form::text('email', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('logo', trans('sponsors.logo')) }}
                {{ Form::file('logo', null, array('class' => 'form-control')) }}
            </div>

            {{ Form::submit(trans('sponsors.submit'), array('class' => 'btn btn-primary')) }}


            {{ Form::close() }}
        </div>
    </div>
@endsection
