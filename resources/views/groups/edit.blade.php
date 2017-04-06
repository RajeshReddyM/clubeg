@extends('layouts.app')

@section('content')
<div class="main">
    <div class="col-md-4 col-md-offset-2">
      <h1>{{trans('app.edit')}} Group</h1>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::model($group, array('route' => array('groups.update', $group->id), 'method' => 'PUT')) }}

          <div class="form-group">
              {{ Form::label('name', 'Name') }}
              {{ Form::text('name', null, array('class' => 'form-control')) }}
          </div>

          @if (Auth::user()->isAn('admin'))
            <div class="form-group">
                {{ Form::label('users', 'Users') }}
                {{ Form::select('users[]', \App\User::all()->pluck('first_name', 'id')->toArray(), $group->listUserIds() ,['multiple'=>true, 'class'=>'form-control select2']) }}
            </div>
          @endif

          {{ Form::submit(trans('app.update'), array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}

    </div>
</div>
@endsection