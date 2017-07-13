@extends('layouts.guest')

@section('active_tab')
            <li>
              <a href="/" >Bet</a>
            </li>
            <li>
              <a href="/closedbet">Closed Bet</a>
            </li>
            <li>
              <a href="/completed">Completed</a>
            </li>
@stop

@section('content')
        <table class="table">        
          <tbody>
            <tr>
              <td>Match: {{$match->home_team.' vs '.$match->away_team}}</td>
            </tr>
            <tr>
              <td>Time start: {{ $match->start_at }}</td>
            </tr>
            <tr>
                <td>Time end: {{ $match->end_at }}</td>
            </tr>
            <tr>
                <td>Close bet at: {{ $match->close_at }}</td>
            </tr>
            @if( $match->home_score && $match->away_score )
            <tr>
            <td>Score {{ $match->home_score.' : '.$match->away_score }}</td>
            </tr>
            @endif
          </tbody>

        </table>

        <table class="table table-bordered">
            <thead>
                <th colspan="3" class="text-center">Bet Rate and Number of bets</th>
            </thead>         
          <tbody>
            <tr>
              <td>{{ $match->home_team }} win - Rate:{{ $match->home_rate }}</td>
              <td>Draw - Rate: {{ $match->draw_rate}}</td>
              <td>{{ $match->away_team }} win - Rate: {{ $match->away_rate }}</td>
            </tr>
            <tr>
              <td>{{ $home_win}} bets</td>
              <td>{{ $draw }} bets</td>
              <td>{{ $away_win }} bets</td>
            </tr>
          </tbody>
        </table>
@stop