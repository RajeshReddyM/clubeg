@extends('layouts.app')

@section('content')

<div class="col-md-8">

    <div class="col-md-6 col-md-offset-4">
      <h1>{{trans('golf_courses.edit_golf_course')}}</h1>
      <br/>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::model($golfcourse, array('route' => array('golfcourses.update', $golfcourse->id), 'files' => true , 'method' => 'PUT')) }}

          <div class="form-group">
              {{ Form::label('name', trans('golf_club.name')) }}
              {{ Form::text('name', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('hole_no', trans('golf_courses.hole_no')) }}
              {{ Form::text('hole_no', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('hole_length', trans('golf_courses.hole_length')) }}
              {{ Form::text('hole_length', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('par', trans('golf_courses.par')) }}
              {{ Form::text('par', null, array('class' => 'form-control')) }}
          </div>
          <div class="form-group">
              {{ Form::label('golfclub_id', trans('golf_club.golf_clubs')) }}

              {{ Form::select('golfclub_id', \App\Golfclub::all()->pluck('name', 'id')->toArray(), null,['placeholder'=> 'Select a Club...', 'class'=>'form-control select2']) }}
          </div>

          <div class="form-group">
              {{ Form::label('logo', trans('golf_club.logo')) }}
              {{ Form::file('logo', null, array('class' => 'form-control')) }}
          </div>


          {{ Form::submit(trans('golf_club.submit'), array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
    </div>
</div>
@endsection