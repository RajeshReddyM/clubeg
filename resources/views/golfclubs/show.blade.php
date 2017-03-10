@extends('layouts.app')

@section('content')
    <div class="main">
        <div class="col-md-10 col-md-offset-1">
            <h2>{{$club->name}}</h2>

            <div class="col-md-6">
                <div class="col-md-6">
                    <label for="street_no">Street No </label>
                </div>
                <div class="col-md-6">
                    <p id="street_no">{{$club->street_no}}</p>
                </div>
                <div class="col-md-6">
                    <label for="street_name">Street Name</label>
                </div>
                <div class="col-md-6">
                    <p id="street_name">{{$club->street_name}}</p>
                </div>
                <div class="col-md-6">
                    <label for="city">City </label>
                </div>
                <div class="col-md-6">
                    <p id="city">{{$club->city}}</p>
                </div>
                <div class="col-md-6">
                    <label for="province">Province</label>
                </div>
                <div class="col-md-6">
                    <p id="province">{{$club->province}}</p>
                </div>
                <div class="col-md-6">
                    <label for="postal_code"> Postal Code</label>
                </div>
                <div class="col-md-6">
                    <p id="postal_code">{{$club->postal_code}}</p>
                </div>

            </div>
            <div class="col-md-6">
                {{ Html::image('images/clubs/' . $club->logo,"Golfclub placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
            </div>
            <div class="col-md-6">
                  <a href="{{route('clubs.edit', $club->id)}}" class="btn btn-primary">
                      <i class="glyphicon glyphicon-edit" aria-hidden="true"> </i> Edit
                  </a>
                  {!! Form::open([
                      'method' => 'DELETE',
                      'route' => ['clubs.destroy', $club->id], 'class' => 'deleteResource'
                  ]) !!}
                      {{Form::button("<i class='glyphicon glyphicon-trash'></i> Delete ", array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                  {!! Form::close() !!}
            </div>

            <div class="col-md-10">
                <h2>Golfcourses</h2>
                <hr/>
                @if (count($golfcourses))
                    @foreach($golfcourses as $course)
                      @if($course->logo)
                        <div class="col-md-4">
                            <div class="panel panel-default">
                              <div class="panel-body">
                                  <div class="hovereffect">
                                    <a href="/golfcourses/{{$course->id}}">
                                      {{ Html::image('images/golfcourses/' . $course->logo,"Golfcourse placeholder image", array('class' => 'img img-responsive img-rounded rounded')) }}
                                      <div class="overlay">
                                        <h2><?php echo  $course->name ?></h2>
                                      </div>
                                    </a>
                                  </div>
                              </div>
                            </div>
                        </div>
                      @endif
                    @endforeach
                @else
                 <h3> No Golfcourses found </h3>
                @endif
            </div>
        </div>
    </div>
@endsection
