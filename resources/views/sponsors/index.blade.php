@extends('layouts.app')

@section('content')


<div class="main">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title">{{trans('sponsors.all_sponsors')}}</h3>
            </div>
            @if (Auth::user()->isAn('admin'))
            <div class="col-md-2">
                <a href="{{ action('SponsorsController@create') }}" class="btn btn-success addButton">
                  <i class="glyphicon glyphicon-plus" aria-hidden="true"> </i> {{trans('sponsors.add_sponsor')}}
                </a>
            </div>
            @endif
        </div>
        <hr/>
        @foreach($sponsors as $sponsor)
            @if($sponsor->logo)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="hovereffect">
                                <a href="{{ action('SponsorsController@show', $sponsor->id) }}">
                                    {{ Html::image('images/sponsors/'. $sponsor->logo,trans('sponsors.tournament_place_img'), array('class' => 'img img-responsive img-rounded rounded')) }}
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
    </div>

</div>
@endsection
