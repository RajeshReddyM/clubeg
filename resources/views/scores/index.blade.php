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
      <div class="row">
          <div class="col-md-3">
              <h3>{{trans('scores.live_scoring')}}</h3>
          </div>
          <div class="col-md-2">
              <a href="{{ action('LivescoresController@create') }}" class="btn btn-success addButton">
                <i class="glyphicon glyphicon-plus" aria-hidden="true"> </i> {{trans('scores.add_score')}}
              </a>
          </div>
      </div>
      <br>

      <table class="table table-responsive table-bordered" style="background-color: white !important;">
          <thead>
            <tr>
              <td class="text-center"><b> {{trans('scores.hole')}} </b></td>
              @for ($i=1; $i<10; $i++)
                <td class="text-center"> <b> {{ $i }} </b> </td>
              @endfor
              <td class="text-center"> <b> {{trans('scores.out')}} </b> </td>
              @for ($i=10; $i<19; $i++)
                <td class="text-center"> <b> {{ $i }} </b></td>
              @endfor
              <td class="text-center"> <b> {{trans('scores.in')}} </b></td>
              <td class="text-center"> <b> {{trans('scores.total')}} </b></td>
              <td class="text-center"> <b> +/- </b></td>
            </tr>
            <tr>
              <td class="text-center"> <b> {{trans('scores.par')}} </b> </td>
              <td class="text-center"><b> 5 </b></td>
              <td class="text-center"><b> 3 </b></td>
              <td class="text-center"><b> 5 </b></td>
              <td class="text-center"><b> 3 </b></td>
              <td class="text-center"><b> 4 </b></td>
              <td class="text-center"><b> 3 </b></td>
              <td class="text-center"><b> 5 </b></td>
              <td class="text-center"><b> 4 </b></td>
              <td class="text-center"><b> 4 </b></td>
              <td class="text-center"><b> 36</b></td>
              <td class="text-center"><b> 5 </b></td>
              <td class="text-center"><b> 4 </b></td>
              <td class="text-center"><b> 4 </b></td>
              <td class="text-center"><b> 3 </b></td>
              <td class="text-center"><b> 5 </b></td>
              <td class="text-center"><b> 4 </b></td>
              <td class="text-center"><b> 3 </b></td>
              <td class="text-center"><b> 4 </b></td>
              <td class="text-center"><b> 4 </b></td>
              <td class="text-center"><b> 36</b></td>
              <td class="text-center"><b> 72</b></td>
              <td class="text-center"></td>
            </tr>
          </thead>
          <tbody>
              @foreach ($scores as $score)
                <tr>
                  <?php echo "<td class='text-center'><b>". implode("<br/>",array_map('ucfirst', $score->teamusers())). "</b></td>" ?>
                  @for ($i=1; $i<=9; $i++)
                    @if ($score['H'.$i] === $score->golfcourse['P'.$i] - 1)
                      <td class="birdie text-center"> <b> {{$score['H'.(string)$i]}} </b> </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] - 2)
                      <td class="eagle text-center"> <b> {{$score['H'.(string)$i]}} </b> </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] + 1)
                      <td class="bogey text-center"> <b> {{$score['H'.(string)$i]}} </b> </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] + 2)
                      <td class="double text-center"> <b> {{$score['H'.(string)$i]}} </b> </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i])
                      <td class="text-center"> <b> {{$score['H'.(string)$i]}} </b> </td>
                    @else
                      <td class="other text-center"> <b> {{$score['H'.(string)$i]}} </b> </td>
                    @endif
                  @endfor
                  <td class="text-center"> <b> {{$score->out()}} </b> </td>
                  @for ($i=10; $i<=18; $i++)
                    @if ($score['H'.$i] === $score->golfcourse['P'.$i] - 1)
                      <td class="birdie text-center"> <b> {{$score['H'.(string)$i]}} </b> </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] - 2)
                      <td class="eagle text-center"> <b> {{$score['H'.(string)$i]}} </b> </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i]+ 1)
                      <td class="bogey text-center"> <b> {{$score['H'.(string)$i]}} </b> </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] + 2)
                      <td class="double text-center"> <b> {{$score['H'.(string)$i]}} </b> </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i])
                      <td class="text-center"> <b> {{$score['H'.(string)$i]}} </b> </td>
                    @else
                      <td class="other text-center"> <b> {{$score['H'.(string)$i]}} </b> </td>
                    @endif
                  @endfor
                  <td class="text-center"> <b> {{$score->in()}} </b> </td>
                  <td class="text-center"> <b> {{$score->total()}} </b> </td>
                  <td class="text-center"> <b> {{$score->diff()}} </b> </td>
                </tr>
              @endforeach
          </tbody>
      </table>
    </div>
</div>
@endsection