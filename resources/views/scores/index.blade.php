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
              <h3>Live Scoring</h3>
          </div>
          <div class="col-md-2">
              <a href="{{ action('LivescoresController@create') }}" class="btn btn-success addButton">
                <i class="glyphicon glyphicon-plus" aria-hidden="true"> </i> Add Score
              </a>
          </div>
      </div>
      <table class="table table-responsive">

      </table>
    </div>
</div>
@endsection