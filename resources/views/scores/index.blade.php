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
              <h3>Live Scoring</h3>
          </div>
          <div class="col-md-2">
              <a href="{{ action('LivescoresController@create') }}" class="btn btn-success addButton">
                <i class="glyphicon glyphicon-plus" aria-hidden="true"> </i> Add Score
              </a>
          </div>
      </div>
      <br>

      <table class="table table-responsive table-bordered">
          <thead>
            <tr>
              <td class="text-center">Hole</td>
              @for ($i=1; $i<10; $i++)
                <td class="text-center"> {{ $i }} </td>
              @endfor
              <td class="text-center">OUT</td>
              @for ($i=10; $i<19; $i++)
                <td class="text-center"> {{ $i }} </td>
              @endfor
              <td class="text-center">IN</td>
              <td class="text-center">Total</td>
              <td class="text-center">+/-</td>
            </tr>
            <tr>
              <td class="text-center">Par</td>
              <td class="text-center">5</td>
              <td class="text-center">3</td>
              <td class="text-center">5</td>
              <td class="text-center">3</td>
              <td class="text-center">4</td>
              <td class="text-center">3</td>
              <td class="text-center">5</td>
              <td class="text-center">4</td>
              <td class="text-center">4</td>
              <td class="text-center">36</td>
              <td class="text-center">5</td>
              <td class="text-center">4</td>
              <td class="text-center">4</td>
              <td class="text-center">3</td>
              <td class="text-center">5</td>
              <td class="text-center">4</td>
              <td class="text-center">3</td>
              <td class="text-center">4</td>
              <td class="text-center">4</td>
              <td class="text-center">36</td>
              <td class="text-center">72</td>
              <td class="text-center"></td>
            </tr>
          </thead>
          <tbody>
              @foreach ($scores as $score)
                <tr>
                  <?php echo "<td class='text-center'><b>". implode("<br/>",array_map('ucfirst', $score->teamusers())). "</b></td>" ?>
                  @for ($i=1; $i<=9; $i++)
                    @if ($score['H'.$i] === $score->golfcourse['P'.$i] - 1)
                      <td class="birdie text-center"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] - 2)
                      <td class="eagle text-center"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] + 1)
                      <td class="bogey text-center"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] + 2)
                      <td class="double text-center"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i])
                      <td class="text-center"> {{$score['H'.(string)$i]}} </td>
                    @else
                      <td class="other text-center"> {{$score['H'.(string)$i]}} </td>
                    @endif
                  @endfor
                  <td class="text-center"> 36 </td>
                  @for ($i=10; $i<=18; $i++)
                    @if ($score['H'.$i] === $score->golfcourse['P'.$i] - 1)
                      <td class="birdie text-center"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] - 2)
                      <td class="eagle text-center"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i]+ 1)
                      <td class="bogey text-center"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] + 2)
                      <td class="double text-center"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i])
                      <td class="text-center"> {{$score['H'.(string)$i]}} </td>
                    @else
                      <td class="other text-center"> {{$score['H'.(string)$i]}} </td>
                    @endif
                  @endfor
                  <td class="text-center"> 36 </td>
                  <td class="text-center"> </td>
                  <td class="text-center"> </td>
                </tr>
              @endforeach
          </tbody>
      </table>
    </div>
</div>
@endsection