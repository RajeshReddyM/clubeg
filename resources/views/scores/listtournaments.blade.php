@extends('layouts.app')

@section('content')

<div class="col-md-8">

    <div class="col-md-6 col-md-offset-4">
      <h2>Select a Tournament</h2>
      <br/>

      <!-- if there are creation errors, they will show here -->
      {{ Html::ul($errors->all()) }}

      <div class="form-group">
          {{ Form::label('id', 'Tournament') }}
          {{ Form::select('id', $tournaments, null, ['placeholder'=> 'Select Tournament...','class'=>'form-control select2', 'id' => 'tournamentsList']) }}
      </div>


    </div>
</div>
@endsection
