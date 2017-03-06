@extends('layouts.app')

@section('content')

<div class="main">
  <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
            <div class="hovereffect">
                {{ Html::image('images/golfcourses/' . $golfcourse->logo,"Golfcourse placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                <div class="overlay">
                   <h2><?php echo  $golfcourse->name ?></h2>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
@endsection