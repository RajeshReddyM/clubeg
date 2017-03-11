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
            <h2>{{$pageData['tournament']->name}}</h2>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="startDate">Start Date: </label>
                        </div>
                        <div class="col-md-6">
                            <p id="startDate">{{$pageData['tournament']->start_date}}</p>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="clubName">Club Name: </label>
                        </div>
                        <div class="col-md-6">
                            <p id="clubName">{{$pageData['club']->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="courseName">Course Name: </label>
                        </div>
                        <div class="col-md-6">
                            <p id="courseName">{{$pageData['golfcourse']->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="type">Type: </label>
                        </div>
                        <div class="col-md-6">
                            <p id="type">Public</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <!-- Tournament promo photo -->
                    {{ Html::image('images/tournaments/'. $pageData['tournament']->logo,"Tournament placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                </div>
            <!-- Register button-->
            <div class="col-md-6">
                <div class="row">
                    @if($pageData['isRegistered'])
                        <a href="{{ action('TournamentsController@unregister', $pageData['tournament']->id) }}" class="btn btn-danger">
                          <i class="glyphicon glyphicon-remove" aria-hidden="true"> </i> Cancel registration
                        </a>
                    @else
                        <a href="{{ action('TournamentsController@register', $pageData['tournament']->id) }}" class="btn btn-success">
                          <i class="glyphicon glyphicon-ok" aria-hidden="true"> </i> Register
                        </a>
                    @endif
                </div>
            </div>


            <!-- sponsor area -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Sponsors</h2>
                    <hr/>
                    <div class="col-md-4 well well-md">
                        <p>{Sponsor 1}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-md-4 well well-md">
                        <p>{Sponsor 2}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-md-4 well well-md">
                        <p>{Sponsor 3}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-md-4 well well-md">
                        <p>{Sponsor 4}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-md-4 well well-md">
                        <p>{Sponsor 5}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-md-4 well well-md">
                        <p>{Sponsor 6}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
