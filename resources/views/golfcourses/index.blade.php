@extends('layouts.app')

@section('content')

  <div class="main">
    <div class="col-md-10 col-md-offset-1">
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
            @endif
          @endforeach
        </div>
        <div class="row">
            <div class="col-md-3">
                <h3 class="title">Golfcourses</h3>
            </div>
            <div class="col-md-2">
                <a href="{{ action('GolfcoursesController@create') }}" class="btn btn-success addButton">
                  <i class="glyphicon glyphicon-plus" aria-hidden="true"> </i> Add Golfcourse
                </a>
            </div>
        </div>
        <hr/>
        @foreach($golfcourses as $golfcourse)
          @if($golfcourse->logo)
            <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-body">
                      <div class="hovereffect">
                        <a href="golfcourses/{{$golfcourse->id}}">
                          {{ Html::image('images/golfcourses/' . $golfcourse->logo,"golfcourse placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                          <div class="overlay">
                             <h2><?php echo  $golfcourse->name ?></h2>
                          </div>
                        </a>
                      </div>
                  </div>
                </div>
            </div>
          @endif
        @endforeach
    </div>
  </div>


@endsection