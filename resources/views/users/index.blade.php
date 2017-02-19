@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
            @endif
          @endforeach
        </div>
        <h3>{{ trans('app.listing_players') }}</h3>

        <table class="table table-responsive">
          <thead>
            <tr>
              <th>{{ trans('app.first_name') }}</th>
              <th>{{ trans('app.last_name') }}</th>
              <th>{{ trans('app.email') }}</th>
              <th>{{ trans('app.handicap') }}</th>
              <th>{{ trans('app.roles') }}</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->handicap }}</td>
                    <td> <b> {{ implode(', ',$user->listRoles()) }} </b></td>
                    <td>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">
                            <i class="glyphicon glyphicon-edit" aria-hidden="true"> </i>
                        </a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['users.destroy', $user->id], 'class' => 'deleteUser'
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