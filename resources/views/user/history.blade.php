@extends('layouts.guest')

@section('active_tab')
        <li>
              <a href="/user" >Bet</a>
        </li>
        <li >
          <a href="/user/closedbet">Closed Bet</a>
        </li>
        <li >
          <a href="/user/completed">Completed</a>
        </li>
        <li class="active">
            <a href="/user/history">History</a>
        </li>
@stop

@section('content')
    <br>
    <strong>Current Money: {{ $current_money }}</strong><strong>APC</strong>
    <br>
    <table class="table table-bordered"> 
          <thead>
            <tr>
              <th>Match</th>
              <th>Time</th>
              <th>Score</th>
              <th>Bet</th>
              <th>Bet at</th>
              <th>Status</th>
              <th>Profit</th>
            </tr>
          </thead>       
          <tbody>
          @foreach( $matches as $match )
            <tr>
              <td>{{ $match->home_team.' vs '.$match->away_team }}</td>
              <td>{{ $match->start_at.' to '.$match->end_at }}</td>
                <td>
                    @if( $match->home_score && $match->away_score )
                        <strong>{{ $match->home_score.':'.$match->away_score }}</strong>
                    @else
                        <strong>Waiting</strong>
                    @endif
                </td>
                <td>{{ $match->betting_money }} APC for
                   @php
                        switch ( $match->place_bet) {
                        case 0:
                            echo "$match->home_team".' Win';
                            break;
                        case 1:
                            echo 'Draw';
                            break;
                        case 2:
                            echo "$match->away_team".' Win';
                            break;
                        }
                    @endphp
                </td>
                <td>{{ $match->bet_at }}</td>
                <td>
                    {{ ($match->status != null) ? $match->status : 'Watting'}}
                </td>
                <td>
                    {{ ($match->profit != null) ? $match->profit.' APC' : 'Watting'}}
                </td>
            </tr>
          @endforeach
          </tbody>

        </table>
@stop