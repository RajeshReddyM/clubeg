@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3>{{ trans('app.listing_players') }}</h3>

        <table class="table table-responsive">
          <thead>
            <tr>
              <th>{{ trans('app.first_name') }}</th>
              <th>{{ trans('app.last_name') }}</th>
              <th>{{ trans('app.email') }}</th>
              <th>{{ trans('app.handicap') }}</th>
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
                    <td>
                        <a href="#" class="btn btn-primary">
                            <i class="glyphicon glyphicon-edit" aria-hidden="true"> {{ trans('app.edit') }} </i>
                        </a>
                        <a href="#" class="btn btn-danger">
                            <i class="glyphicon glyphicon-trash" aria-hidden="true"> {{ trans('app.delete') }} </i>
                        </a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection