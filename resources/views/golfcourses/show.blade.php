@extends('layouts.app')

@section('content')
    <div class="main">
        <div class="col-md-10 col-md-offset-1">
            <h2>{{$golfcourse->name}}</h2>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="hole_no">Hole No </label>
                    </div>
                    <div class="col-md-6">
                        <p id="hole_no">{{$golfcourse->hole_no}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="holeLength">Hole Length</label>
                    </div>
                    <div class="col-md-6">
                        <p id="hole_length">{{$golfcourse->hole_length}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="par">Par </label>
                    </div>
                    <div class="col-md-6">
                        <p id="par">{{$golfcourse->par}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                {{ Html::image('images/golfcourses/' . $golfcourse->logo,"Golfcourse placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}

            </div>

            <div class="col-md-8">
                <div class="row">
                    <a href="{{route('golfcourses.edit', $golfcourse->id)}}" class="btn btn-primary">
                          <i class="glyphicon glyphicon-edit" aria-hidden="true"> </i> Edit
                    </a>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['golfcourses.destroy', $golfcourse->id], 'class' => 'deleteResource'
                    ]) !!}
                        {{Form::button("<i class='glyphicon glyphicon-trash'></i> Delete ", array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>      
    </div>

@endsection
