@extends('layouts.app')

@section('content')

<div class="col-md-8">

    <div class="col-md-6 col-md-offset-4">
      <h1>{{trans('groups.add_group')}}</h1>
      <br/>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::model($group, array('route' => array('groups.store'), 'method' => 'POST', 'files' => true, 'enctype' => "multipart/form-data")) }}

          <div class="form-group">
              {{ Form::label('name', trans('sponsors.name')) }}
              {{ Form::text('name', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('tournaments', trans('groups.tournaments')) }}
              {{ Form::select('tournaments[]', \App\Tournament::all()->pluck('name', 'id')->toArray(), null, ['multiple'=>true,'class'=>'form-control select2']) }}
          </div>
          
          <div class="form-group">
              {{ Form::label('users', trans('groups.players')) }}
              {{ Form::select('users[]', \App\User::all()->pluck('first_name', 'id')->toArray(), null, ['multiple'=>true, 'class'=>'form-control select2']) }}
          </div>

          {{ Form::submit(trans('groups.submit'), array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
    </div>
</div>
@endsection
