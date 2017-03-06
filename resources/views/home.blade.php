@extends('layouts.app')

@section('content')
<div class="col-md-10">
    <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif
      @endforeach
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">{{ trans('app.dashboard') }}</div>
            <div class="panel-body">

            </div>
        </div>
    </div>
</div>
@endsection
