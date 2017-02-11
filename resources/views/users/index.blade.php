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
                        <a href="#" class="btn btn-primary">Show</a>
                        <a href="#" class="btn btn-info">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection