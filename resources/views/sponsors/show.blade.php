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
                            <label for="sponsorName">{{trans('sponsor.name')}}: </label>
                        </div>
                        <div class="col-md-6">
                            <p id="sponsorName">{{$pageData['club']->name}}</p>
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
                    <!-- Tournament promo photo -->
                    {{ Html::image('images/tournaments/'. $pageData['tournament']->logo,trans('tournaments.tournament_place_img'), array('class' => 'img img-responsive img-rounded rounded')) }}
                </div>
            <!-- Register button-->
            <div class="col-md-8">
                <div class="row">
                    @if (Auth::user()->isAn('admin'))
                        <a href="{{action('SponsorsController@edit', $pageData['tournament']->id)}}" class="btn btn-primary">
                            <i class="glyphicon glyphicon-edit" aria-hidden="true"> </i> {{trans('app.edit')}}
                        </a>
                    @endif
                </div>
            </div>


            <!-- sponsor area -->

        </div>
    </div>
@endsection
