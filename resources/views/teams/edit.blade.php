@extends('layouts.app')

@section('content')
<div class="main">
    <div class="col-md-4 col-md-offset-2">
      <h1>{{trans('app.edit')}} Team</h1>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::model($team, array('route' => array('teams.update', $team->id), 'method' => 'PUT')) }}

          <div class="form-group">
              {{ Form::label('name', 'Name') }}
              {{ Form::text('name', null, array('class' => 'form-control')) }}
          </div>

          @if (Auth::user()->isAn('admin'))
            <div class="form-group">
                {{ Form::label('users', 'Users') }}
                {{ Form::select('users[]', \App\User::all()->pluck('first_name', 'id')->toArray(), $team->listUsers() ,['multiple'=>true, 'class'=>'form-control select2']) }}
            </div>
          @endif

          {{ Form::submit(trans('app.update'), array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}

    </div>
</div>
@endsection