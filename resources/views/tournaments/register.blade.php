@extends('layouts.app')

@section('content')


        <div class="container">
            <h2>{{$pageData['tournamentInfo']->name}}</h2>

                <div class="col-sm-6">
                    <div class="col-sm-6">
                        <label for="startDate">Start Date: </label>
                    </div>
                    <div class="col-sm-6">
                        <p id="startDate">{{$pageData['tournamentInfo']->start_time}}</p>
                    </div>
                    <div class="col-sm-6">
                        <label for="clubName">Club Name: </label>
                    </div>
                    <div class="col-sm-6">
                        <p id="clubName">{{$pageData['clubInfo']->name}}</p>
                    </div>
                    <div class="col-sm-6">
                        <label for="courseName">Course Name: </label>
                    </div>
                    <div class="col-sm-6">
                        <p id="courseName">{{$pageData['courseInfo']->name}}</p>
                    </div>
                    <div class="col-sm-6">
                        <label for="type">Type: </label>
                    </div>
                    <div class="col-sm-6">
                        <p id="type">Public</p>
                    </div>

                </div>
                <div class="col-sm-6">
                    <!-- Tournament promo photo -->
                        {{ Html::image('images/tournament_placeholder_image.jpg',"Tournament placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}

                </div>
            <!-- Register button-->
            <div class="col-sm-6">
                @if($pageData['isRegistered'])
                    <button class="btn btn-danger">Cancel Registration</button>
                @else
                    <button class="btn btn-success">Register</button>
                @endif
            </div>


            <!-- sponsor area -->
            <div class="row">
                <div class="col-sm-12">
                    <h2>Sponsors</h2>
                    <hr/>
                    <div class="col-sm-4 well well-sm">
                        <p>{Sponsor 1}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-sm-4 well well-sm">
                        <p>{Sponsor 2}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-sm-4 well well-sm">
                        <p>{Sponsor 3}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-sm-4 well well-sm">
                        <p>{Sponsor 4}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-sm-4 well well-sm">
                        <p>{Sponsor 5}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                    <div class="col-sm-4 well well-sm">
                        <p>{Sponsor 6}</p>
                        {{ Html::image('http://placehold.it/350x150',"Sponsor placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                    </div>
                </div>
            </div>
        </div>
@endsection
