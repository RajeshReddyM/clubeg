@extends('layouts.app')

@section('content')

<div class="col-md-8">

    <div class="col-md-6 col-md-offset-4">
      <h1>Editing Golfcourse</h1>
      <br/>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::model($golfcourse, array('route' => array('golfcourses.update', $golfcourse->id), 'method' => 'PUT')) }}

          <div class="form-group">
              {{ Form::label('name', 'Name') }}
              {{ Form::text('name', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('hole_no', 'Hole No') }}
              {{ Form::text('hole_no', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('hole_length', 'Hole Length') }}
              {{ Form::text('hole_length', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('par', 'Par') }}
              {{ Form::text('par', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('logo', 'Logo') }}
              {{ Form::file('logo', null, array('class' => 'form-control')) }}
          </div>


          {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
    </div>
</div>
@endsection