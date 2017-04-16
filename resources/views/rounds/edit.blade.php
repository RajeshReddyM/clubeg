@extends('layouts.app')

@section('content')
<div class="main">
    <div class="col-md-4 col-md-offset-2">
      <h1>{{trans('app.edit_round')}}</h1>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::model($round, array('route' => array('rounds.update', $round->id), 'method' => 'PUT')) }}

          <div class="form-group">
              {{ Form::label('name', trans('groups.name')) }}
              {{ Form::text('name', null, array('class' => 'form-control')) }}
          </div>

          @if (Auth::user()->isAn('admin'))
            <div class="form-group">
                {{ Form::label('tournament', trans('rounds.tournament')) }}
                {{ Form::select('tournament_id', \App\Tournament::all()->pluck('name', 'id')->toArray(), null ,['placeholder'=> trans('rounds.please_select'), 'class'=>'form-control select2']) }}
            </div>
          @endif

          {{ Form::submit(trans('app.update'), array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}

    </div>
</div>
@endsection