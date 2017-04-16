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
              <h3>{{trans('rounds.listing_rounds')}}</h3>
          </div>
          <div class="col-md-2">
              <a href="{{ action('RoundsController@create') }}" class="btn btn-success addButton">
                <i class="glyphicon glyphicon-plus" aria-hidden="true"> </i> {{trans('rounds.add_round')}}
              </a>
          </div>
      </div>
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>{{trans('sponsors.name')}}</th>
            <th>{{trans('scores.tournament')}}</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($rounds as $round )
              <tr>
                  <td>{{ $round->name }}</td>
                  <td> {{$round->tournament->name}}<b>  </b></td>
                  <td>
                      <a href="{{route('rounds.edit', $round->id)}}" class="btn btn-primary">
                          <i class="glyphicon glyphicon-edit" aria-hidden="true"> </i>
                      </a>
                      {!! Form::open([
                          'method' => 'DELETE',
                          'route' => ['rounds.destroy', $round->id], 'class' => 'deleteResource'
                      ]) !!}
                          {{Form::button("<i class='glyphicon glyphicon-trash'></i>", array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                      {!! Form::close() !!}

                  </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection