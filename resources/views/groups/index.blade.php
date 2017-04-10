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
              <h3>Listing Groups</h3>
          </div>
          <div class="col-md-2">
              <a href="{{ action('GroupsController@create') }}" class="btn btn-success addButton">
                <i class="glyphicon glyphicon-plus" aria-hidden="true"> </i> Add Group
              </a>
          </div>
      </div>
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>Name</th>
            <th>Players</th>
            <th>Tournaments</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($groups as $group)
              <tr>
                  <td>{{ $group->name }}</td>
                  <td> <b> {{ implode(', ',array_map('ucfirst', $group->listUserNames())) }} </b></td>
                  <td> <b> {{ implode(', ',array_map('ucfirst', $group->listTournamentNames())) }} </b></td>
                  <td>
                      <a href="{{route('groups.edit', $group->id)}}" class="btn btn-primary">
                          <i class="glyphicon glyphicon-edit" aria-hidden="true"> </i>
                      </a>
                      {!! Form::open([
                          'method' => 'DELETE',
                          'route' => ['groups.destroy', $group->id], 'class' => 'deleteResource'
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