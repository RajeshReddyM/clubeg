@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <div class="col-md-8 col-md-offset-2">
      <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
          @endif
        @endforeach
      </div>
      
    </div>
    <div class="col-md-6 col-md-offset-2">
      <h2>{{trans('scores.select_a_tournament')}}</h2>
      <br/>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      <div class="form-group">
          {{ Form::label('id', trans('groups.tournaments')) }}
          {{ Form::select('id', $tournaments, null, ['placeholder'=> trans('scores.select_tournament'),'class'=>'form-control select2', 'id' => 'tournamentsList']) }}
      </div>


    </div>
</div>
@endsection
