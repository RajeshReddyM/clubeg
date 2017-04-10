@extends('layouts.app')

@section('content')
    <div class="main">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="title">{{$golfcourse->name}}</h2>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="hole_no">{{trans('golf_courses.hole_no')}} </label>
                    </div>
                    <div class="col-md-6">
                        <p id="hole_no">{{$golfcourse->hole_no}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="holeLength">{{trans('golf_courses.hole_length')}}</label>
                    </div>
                    <div class="col-md-6">
                        <p id="hole_length">{{$golfcourse->hole_length}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                {{ Html::image('images/golfcourses/' . $golfcourse->logo,trans('golf_courses.golf_course_place_img'), array('class' => 'img img-responsive img-rounded rounded')) }}

            </div>

            <div class="col-md-8">
                <div class="row">
                    <a href="{{route('golfcourses.edit', $golfcourse->id)}}" class="btn btn-primary">
                          <i class="glyphicon glyphicon-edit" aria-hidden="true"> </i> {{trans('app.edit')}}
                    </a>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['golfcourses.destroy', $golfcourse->id], 'class' => 'deleteResource'
                    ]) !!}
                        {{Form::button("<i class='glyphicon glyphicon-trash'></i> ".trans('app.delete'), array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>      
    </div>

@endsection
