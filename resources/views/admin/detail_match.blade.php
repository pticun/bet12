@extends('layouts.admin')

@section('content')
    <fieldset>
        <legend>Match <strong>{{ $public_match->home_team.' VS '.$public_match->away_team}}</strong></legend>
        <h3></h3>
        <h3>Time: {{ $public_match->start_at.' to '.$public_match->end_at}}</h3>
        <h3>
        @if( $public_match->home_score && $public_match->away_score )
              Score {{ $public_match->home_score.' : '.$public_match->away_score}}
        @else
            Score: Waiting
        @endif
        </h3>
    </fieldset><br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>User</th>
          <th>{{ $public_match->home_team }} Win - Rate: {{ $public_match->home_rate }}</th>
          <th>Draw - Rate: {{ $public_match->draw_rate }}</th>
          <th>{{ $public_match->away_team }} Win - Rate:{{ $public_match->away_rate }}</th>
          <th>Bet at</th>
          <th>Status</th>
          <th>Profits</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $public_match->bets as $bet)
        <tr>
          <th>{{ $bet->user->name }}</th>
          <td>{{ ($bet->place_bet == 0) ? "$bet->betting_money":'0'}} APC</td>
          <td>{{ ($bet->place_bet == 1) ? "$bet->betting_money":'0'}} APC</td>
          <td>{{ ($bet->place_bet == 2) ? "$bet->betting_money":'0'}} APC</td>
          <td>{{ $bet->bet_at }}</td>
          <td>{{ ($bet->status != null) ? "$bet->status":'Waiting'}}</td>
          <td>{{ ($bet->profit != null) ? "$bet->profit":'Waiting'}} APC</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@stop