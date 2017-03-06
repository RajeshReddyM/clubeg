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
        <h2>Golf Clubs</h2>
        <hr/>
        @foreach($clubs as $club)
            <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-body">
                      <div class="hovereffect">
                        <a href="clubs/{{$club->id}}">
                          {{ Html::image('images/clubs/' . $club->logo,"Club placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                          <div class="overlay">
                             <h2><?php echo  $club->name ?></h2>
                          </div>
                        </a>
                      </div>
                  </div>
                </div>
            </div>
        @endforeach
    </div>
  </div>


@endsection