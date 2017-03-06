@extends('layouts.app')

@section('content')

<div class="main">
  <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
            {{ Html::image('images/golfcourses/' . $golfcourse->logo,"Golfcourse placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
        </div>
      </div>
  </div>
</div>
@endsection