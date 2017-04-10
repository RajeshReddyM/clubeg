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
            <h2 class="title">{{$sponsor->name}}</h2>

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="sponsorName">{{trans('sponsors.name')}}: </label>
                        </div>
                        <div class="col-md-6">
                            <p id="sponsorName">{{$sponsor->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="sponsorEmail">{{trans('sponsors.email')}}: </label>
                        </div>
                        <div class="col-md-6">
                            <p id="sponsorEmail">{{$sponsor->email}}</p>
                        </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <!-- Sponsors promo photo -->
                    {{ Html::image('images/sponsors/'. $sponsor->logo,trans('sponsors.sponsor_place_img'), array('class' => 'img img-responsive img-rounded rounded')) }}
                </div>
            <!-- Admin button-->
            <div class="col-md-8">
                <div class="row">
                    @if (Auth::user()->isAn('admin'))
                        <a href="{{action('SponsorsController@edit', $sponsor->id)}}" class="btn btn-primary">
                            <i class="glyphicon glyphicon-edit" aria-hidden="true"> </i> {{trans('app.edit')}}
                        </a>
                        {!! Form::open([
                          'method' => 'DELETE',
                          'action' => ['SponsorsController@destroy', $sponsor->id], 'class' => 'deleteResource'
                        ]) !!}
                        {{Form::button("<i class='glyphicon glyphicon-trash'></i> ". trans('app.delete'), array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>


            <!-- sponsor area -->

        </div>
    </div>
@endsection
