@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3>Listing Players</h3>

        <table class="table">
          <thead class="thead-default">
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Handicap</th>
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
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"> Edit </span>
                        </a>
                        <a href="#" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"> Delete </span>
                        </a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection