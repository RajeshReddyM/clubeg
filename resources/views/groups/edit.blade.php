@extends('layouts.app')

@section('content')
<div class="main">
    <div class="col-md-4 col-md-offset-2">
      <h1>{{trans('app.edit_group')}}</h1>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::model($group, array('route' => array('groups.update', $group->id), 'method' => 'PUT')) }}

          <div class="form-group">
              {{ Form::label('name', trans('sponsors.name')) }}
              {{ Form::text('name', null, array('class' => 'form-control')) }}
          </div>

          @if (Auth::user()->isAn('admin'))
            <div class="form-group">
                {{ Form::label('tournaments', trans('groups.tournaments')) }}
                {{ Form::select('tournaments[]', \App\Tournament::all()->pluck('name', 'id')->toArray(), $group->listTournamentIds(), ['multiple'=>true,'class'=>'form-control select2']) }}
            </div>

            <div class="form-group">
                {{ Form::label('users', trans('groups.users')) }}
                {{ Form::select('users[]', \App\User::all()->pluck('first_name', 'id')->toArray(), $group->listUserIds() ,['multiple'=>true, 'class'=>'form-control select2']) }}
            </div>
          @endif

          {{ Form::submit(trans('app.update'), array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}

    </div>
</div>
@endsection