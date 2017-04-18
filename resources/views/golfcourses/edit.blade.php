@extends('layouts.app')

@section('content')

<div class="col-md-10">

    <div class="col-md-6 col-md-offset-2">
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
              {{ Form::label('golfclub_id', trans('golf_club.golf_clubs')) }}

              {{ Form::select('golfclub_id', \App\Golfclub::all()->pluck('name', 'id')->toArray(), null,['placeholder'=> trans('golf_courses.select_club'), 'class'=>'form-control select2']) }}
          </div>

          <div class="form-group">
              {{ Form::label('logo', trans('golf_club.logo')) }}
              {{ Form::file('logo', null, array('class' => 'form-control')) }}
          </div>
        <div class="form-group">
            <div class="row">
                @for ($i = 1; $i <= 18; $i++)
                    <div class="col-md-2 col-xs-3 col-sm-3">
                        {{ Form::label('scores', 'Par#'.$i) }}
                        {{ Form::number('P'.$i, null, array('class'=> 'form-control','id' => 'P'.$i, 'style'=>'width: 7rem', 'min'=>1, 'max'=>5)) }}
                    </div>
                @endfor
            </div>
        </div>


          {{ Form::submit(trans('golf_club.submit'), array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
    </div>
</div>
@endsection