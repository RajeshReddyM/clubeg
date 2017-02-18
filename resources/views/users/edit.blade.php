@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6 row">
      <h1>{{trans('app.edit')}} {{ $user->first_name }}</h1>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}

          <div class="form-group">
              {{ Form::label('first_name', trans('app.first_name')) }}
              {{ Form::text('first_name', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('last_name', trans('app.last_name')) }}
              {{ Form::text('last_name', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('handicap', trans('app.handicap')) }}            
              {{ Form::text('handicap', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('roles', trans('app.roles')) }}
              {{ Form::select('roles[]', \App\Role::all()->pluck('title', 'name')->toArray(), $user->listRoles() ,['multiple'=>true, 'class'=>'select2']) }}
          </div>

          {{ Form::submit(trans('app.update'), array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}

    </div>
</div>
@endsection