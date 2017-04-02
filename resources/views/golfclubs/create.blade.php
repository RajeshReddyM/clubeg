@extends('layouts.app')

@section('content')

<div class="col-md-8">

    <div class="col-md-6 col-md-offset-4">
      <h1>{{trans('golf_club.add_club')}}</h1>
      <br/>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::model($club, array('route' => array('clubs.store'), 'method' => 'POST', 'files' => true, 'enctype' => "multipart/form-data")) }}

          <div class="form-group">
              {{ Form::label('name', trans('golf_club.name')) }}
              {{ Form::text('name', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('street_no', trans('golf_club.street_no')) }}
              {{ Form::text('street_no', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('street_name', trans('golf_club.street_name')) }}
              {{ Form::text('street_name', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('city', trans('golf_club.city')) }}
              {{ Form::text('city', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('province', trans('golf_club.province')) }}
              {{ Form::text('province', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('postal_code', trans('golf_club.postal_code')) }}
              {{ Form::text('postal_code', null, array('class' => 'form-control')) }}
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