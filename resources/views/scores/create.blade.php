@extends('layouts.app')

@section('content')

<div class="col-md-8">

    <div class="col-md-6 col-md-offset-4">
      <h1>Add Score</h1>
      <br/>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::model($score, array('route' => array('groups.store'), 'method' => 'POST', 'files' => true, 'enctype' => "multipart/form-data")) }}

          <div class="form-group">
              {{ Form::label('users', 'Players') }}
              {{ Form::select('users[]', \App\User::all()->pluck('first_name', 'id')->toArray(), null, ['placeholder'=> 'Select Player...','class'=>'form-control select2']) }}
          </div>

          <div class="form-group">
              {{ Form::label('tournament_id', 'Tournament') }}
              {{ Form::select('tournament_id', \App\Tournament::all()->pluck('name', 'id')->toArray(), null, ['placeholder'=> 'Select Tournament...','class'=>'form-control select2']) }}
          </div>
          <div class="form-group">
              {{ Form::label('groupNo', 'Group') }}
              {{ Form::select('groupNo', \App\Group::all()->pluck('name', 'id')->toArray(), null, ['placeholder'=> 'Select Group...','class'=>'form-control select2']) }}
          </div>
          <div class="form-group">
              {{ Form::label('teamNo', 'Team') }}
              {{ Form::select('teamNo', \App\Team::all()->pluck('name', 'id')->toArray(), null, ['placeholder'=> 'Select Team...','class'=>'form-control select2']) }}
          </div>
        <div class="form-group">
            <div class="row">
                @for ($i = 1; $i < 19; $i++)
                    <div class="col-md-4 col-xs-6 col-sm-6">
                        {{ Form::label('scores', 'Hole #'.$i) }}
                        {{ Form::number('H'.$i, null, array('class'=> 'form-control','id' => 'H'.$i, 'style'=>'width: 8rem', 'min'=>1, 'max'=>5)) }}
                    </div>
                @endfor
            </div>
        </div>

          {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
    </div>
</div>
@endsection
