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
            <h2 class="title">{{$pageData['tournament']->name}}</h2>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="startDate">{{trans('tournaments.start_date')}}: </label>
                        </div>
                        <div class="col-md-6">
                            <p id="startDate">{{$pageData['tournament']->start_date}}</p>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="clubName">{{trans('tournaments.club_name')}}: </label>
                        </div>
                        <div class="col-md-6">
                            <p id="clubName">{{$pageData['club']->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="courseName">{{trans('tournaments.course_name')}}: </label>
                        </div>
                        <div class="col-md-6">
                            <p id="courseName">{{$pageData['golfcourse']->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="type">{{trans('tournaments.type')}} </label>
                        </div>
                        <div class="col-md-6">
                            <p id="type">{{$pageData['tournament']->type}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="type"> {{trans('tournaments.division')}} </label>
                        </div>
                        <div class="col-md-6">
                            <p id="type">{{$pageData['tournament']->division}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="type"> {{trans('tournaments.visibility')}} </label>
                        </div>
                        <div class="col-md-6">
                            <p id="type">{{$pageData['tournament']->visibility}}</p>
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
                    @if($pageData['isRegistered'])
                        <a href="{{ action('TournamentsController@unregister', $pageData['tournament']->id) }}" class="btn btn-danger">
                          <i class="glyphicon glyphicon-minus-sign" aria-hidden="true"> </i> {{trans('tournaments.cancel_registration')}}
                        </a>
                    @else
                        <a href="{{ action('TournamentsController@register', $pageData['tournament']->id) }}" class="btn btn-success">
                          <i class="glyphicon glyphicon-plus-sign" aria-hidden="true"> </i> {{trans('tournaments.register')}}
                        </a>
                    @endif
                    @if (Auth::user()->isAn('admin'))
                        <a href="{{action('TournamentsController@edit', $pageData['tournament']->id)}}" class="btn btn-primary">
                            <i class="glyphicon glyphicon-edit" aria-hidden="true"> </i> {{trans('app.edit')}}
                        </a>
                    @endif
                </div>
            </div>


            <!-- sponsor area -->
            <div class="col-md-10">
                <h2>{{trans('sponsors.sponsor')}}</h2>
                <hr/>
                @if (count($pageData['sponsors']))
                    @foreach($pageData['sponsors'] as $sponsor)
                      @if($sponsor->logo)
                        <div class="col-md-4">
                            <div class="panel panel-default">
                              <div class="panel-body">
                                  <div class="hovereffect">
                                    <a href="/sponsors/{{$sponsor->id}}">
                                      {{ Html::image('images/sponsors/' . $sponsor->logo,trans('golf_courses.golf_course_place_img'), array('class' => 'img img-responsive img-rounded rounded')) }}
                                      <div class="overlay">
                                        <h2><?php echo  $sponsor->name ?></h2>
                                      </div>
                                    </a>
                                  </div>
                              </div>
                            </div>
                        </div>
                      @endif
                    @endforeach
                @else
                 <h3> {{trans('tournaments.no_sponsors')}} </h3>
                @endif
            </div>
        </div>
    </div>
@endsection
