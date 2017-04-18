@extends('layouts.app')

@section('content')

<div class="col-md-8">

    <div class="col-md-6 col-md-offset-4">
      <h1> {{trans('rounds.add_round')}} </h1>
      <br/>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::model($round, array('route' => array('rounds.store'), 'method' => 'POST', 'files' => true, 'enctype' => "multipart/form-data")) }}

          <div class="form-group">
              {{ Form::label('name', trans('scores.name')) }}
              {{ Form::text('name', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('tournament_id', trans('rounds.tournament')) }}

              {{ Form::select('tournament_id', \App\Tournament::all()->pluck('name', 'id')->toArray(), null,['placeholder'=> trans('rounds.please_select'), 'class'=>'form-control select2']) }}
          </div>


          {{ Form::submit(trans('rounds.submit'), array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
    </div>
</div>
@endsection
