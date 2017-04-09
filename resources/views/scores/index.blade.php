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
              <td>Hole</td>
              @for ($i=1; $i<10; $i++)
                <td> {{ $i }} </td>
              @endfor
              <td>OUT</td>
              @for ($i=10; $i<19; $i++)
                <td> {{ $i }} </td>
              @endfor
              <td>IN</td>
              <td>Total</td>
              <td>+/-</td>
            </tr>
            <tr>
              <td>Par</td>
              <td>5</td>
              <td>3</td>
              <td>5</td>
              <td>3</td>
              <td>4</td>
              <td>3</td>
              <td>5</td>
              <td>4</td>
              <td>4</td>
              <td>36</td>
              <td>5</td>
              <td>4</td>
              <td>4</td>
              <td>3</td>
              <td>5</td>
              <td>4</td>
              <td>3</td>
              <td>4</td>
              <td>4</td>
              <td>36</td>
              <td>72</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
              @foreach ($scores as $score)
                <tr>
                  <?php echo "<td><b>". implode("<br/>",array_map('ucfirst', $score->teamusers())). "</b></td>" ?>
                  @for ($i=1; $i<=9; $i++)
                    @if ($score['H'.$i] === $score->golfcourse['P'.$i] - 1)
                      <td class="birdie"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] - 2)
                      <td class="eagle"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] + 1)
                      <td class="bogey"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] + 2)
                      <td class="double"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i])
                      <td> {{$score['H'.(string)$i]}} </td>
                    @else
                      <td class="other"> {{$score['H'.(string)$i]}} </td>
                    @endif
                  @endfor
                  <td> 36 </td>
                  @for ($i=10; $i<=18; $i++)
                    @if ($score['H'.$i] === $score->golfcourse['P'.$i] - 1)
                      <td class="birdie"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] - 2)
                      <td class="eagle"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i]+ 1)
                      <td class="bogey"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i] + 2)
                      <td class="double"> {{$score['H'.(string)$i]}} </td>
                    @elseif ($score['H'.$i] === $score->golfcourse['P'.$i])
                      <td> {{$score['H'.(string)$i]}} </td>
                    @else
                      <td class="other"> {{$score['H'.(string)$i]}} </td>
                    @endif
                  @endfor
                  <td> 36 </td>
                  <td> </td>
                  <td> </td>
                </tr>
              @endforeach
          </tbody>
      </table>
    </div>
</div>
@endsection