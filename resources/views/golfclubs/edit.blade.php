@extends('layouts.app')

@section('content')

<div class="col-md-8">

    <div class="col-md-6 col-md-offset-4">
      <h1>Editing Club</h1>
      <br/>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      {{ Form::model($club, array('route' => array('clubs.update', $club->id), 'method' => 'PUT')) }}

          <div class="form-group">
              {{ Form::label('name', 'Name') }}
              {{ Form::text('name', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('street_no', 'Street No') }}
              {{ Form::text('street_no', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('street_name', 'Street Name') }}
              {{ Form::text('street_name', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('city', 'City') }}
              {{ Form::text('city', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('province', 'Province') }}
              {{ Form::text('province', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('postal_code', 'Postal Code') }}
              {{ Form::text('postal_code', null, array('class' => 'form-control')) }}
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